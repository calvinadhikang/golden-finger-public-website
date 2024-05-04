<?php

namespace App\Http\Controllers;

use App\Models\HeaderInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function view(){
        $user = Session::get('user');
        $now = Carbon::now();
        $data = HeaderInvoice::latest()->where('customer_id', $user->id)->get();

        foreach ($data as $key => $value) {
            $value->status_text = Util::getInvoiceStatusText($value->status);
        }

        return view('invoice.invoice', [
            'data' => $data
        ]);
    }

    public function viewDetail($id){
        $invoice = HeaderInvoice::find($id);

        if (!$invoice) {
            return redirect('/invoice')->withErrors([
                'msg' => 'Invoice tidak ditemukan!'
            ]);
        }

        $now = Carbon::now();
        $jatuhTempo = Carbon::parse($invoice->jatuh_tempo);
        if ($jatuhTempo->lte($now)) {
            $invoice->payment_status_text = 'Lewat Jatuh Tempo';
        }else{
            $invoice->payment_status_text = null;
        }

        $statusTransaksi = "";
        $statusBackground = "";
        if ($invoice->status == 0) {
            $statusTransaksi = "Menunggu Konfirmasi";
            $statusBackground = "bg-gray-200";
        }elseif($invoice->status == 1){
            $statusTransaksi = "Menunggu Pembayaran";
            $statusBackground = "bg-green-200";
        }elseif($invoice->status == 2){
            $statusTransaksi = "Dikirim";
        }elseif($invoice->status == -1){
            $statusTransaksi = "Dibatalkan";
            $statusBackground = "bg-red-200 text-red-500";
        }

        return view('invoice.detail', [
            'invoice' => $invoice,
            'statusTransaksi' => $statusTransaksi,
            'statusBackground' => $statusBackground
        ]);
    }

    public function viewDetailPayment($id){
        $invoice = HeaderInvoice::find($id);
        $invoice->paid_at = Carbon::now();
        $invoice->save();

        return back()->with([
            'title' => 'Pembayaran berhasil!',
            'msg' => "Berhasil menyelesaikan pembayaran Invoice $invoice->kode"
        ]);
    }
}
