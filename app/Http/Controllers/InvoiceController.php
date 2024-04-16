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
            $createdAt = Carbon::parse($value->created_at);
            if ($createdAt->lte($now)) {
                $value->payment_status_text = 'Lewat Jatuh Tempo';
            }else{
                $value->payment_status_text = null;
            }
        }

        return view('invoice.invoice', [
            'data' => $data
        ]);
    }

    public function viewDetail($id){
        $invoice = HeaderInvoice::find($id);
        $now = Carbon::now();
        $createdAt = Carbon::parse($invoice->created_at);
        if ($createdAt->lte($now)) {
            $invoice->payment_status_text = 'Lewat Jatuh Tempo';
        }else{
            $invoice->payment_status_text = null;
        }

        return view('invoice.detail', [
            'invoice' => $invoice
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
