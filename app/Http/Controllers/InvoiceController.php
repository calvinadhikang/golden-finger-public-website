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

        $status = Util::getInvoiceStatusText($invoice->status);

        return view('invoice.detail', [
            'invoice' => $invoice,
            'status' => $status,
        ]);
    }

    public function paymentSuccess(Request $request){
        $id = $request->input('invoice_id');
        if (!$id) {
            return redirect('/invoice')->withErrors([
                'msg' => 'Invoice tidak ditemukan!'
            ]);
        }

        $invoice = HeaderInvoice::find($id);
        $invoice->paid_at = Carbon::now();
        $invoice->status = 2;
        $invoice->save();

        return true;
    }
}
