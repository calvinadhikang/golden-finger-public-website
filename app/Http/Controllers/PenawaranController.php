<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use App\Models\HeaderPenawaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PenawaranController extends Controller
{
    public function createPenawaran(){
        $user = Session::get('user');
        $carts = Cart::where('customer_id', $user->id)->get();

        if (count($carts) <= 0) {
            return redirect('/product')->withErrors([
                'msg' => 'Penawaran tidak dapat dibuat, silahkan tambahkan barang ke keranjang terlebih dahulu!'
            ]);
        }

        Session::put('penawaran', $carts);

        // Kalau belum ada session penawaran, ketika masuk halaman ini
        return redirect('/penawaran');
    }

    public function viewPenawaran(){
        $user = Session::get('user');
        $penawaran_session = Session::get('penawaran');

        // Kalau belum ada session penawaran, ketika masuk halaman ini
        if (count($penawaran_session) <= 0) {
            return redirect('/cart/penawaran');
        }

        $total = 0;
        foreach ($penawaran_session as $key => $value) {
            $total += $value->subtotal;
        }

        $ppn = DB::table('settings')->where('id', 1)->first()->ppn;
        $total_ppn = $total / 100 * $ppn;
        $grand_total = $total_ppn + $total;

        Session::put('penawaran', $penawaran_session);
        return view('penawaran', [
            'carts' => $penawaran_session,
            'total' => $total,
            'total_ppn' => $total_ppn,
            'grand_total' => $grand_total,
            'ppn' => $ppn,
        ]);
    }

    public function removePenawaranItem($id){
        $penawaran = Session::get('penawaran');
        $newPenawaran = [];
        foreach ($penawaran as $key => $value) {
            if ($value->part != $id) {
                $newPenawaran[] = $value;
            }
        }

        Session::put('penawaran', $newPenawaran);
        return back()->with(([
            'title' => 'Berhasil Hapus Item dari Penawaran!',
            'msg' => 'Barang berhasil dihapus dari penawaran!'
        ]));

    }

    public function modifyPenawaran(Request $request){
        $data = Session::get('penawaran');
        $type = $request->input('type');
        $part = $request->input('part');

        $target = null;
        foreach ($data as $key => $value) {
            if ($value->part == $part) {
                $target = $value;
                break;
            }
        }

        if($target != null){
            $target->qty = $request->input('qty');
            $target->subtotal = $request->input('harga') * $request->input('qty');
        }


        Session::put('penawaran', $data);
        return back()->with(([
            'title' => 'Berhasil Ubah Penawaran!',
            'msg' => 'Data Penawaran berhasil diubah!'
        ]));
    }

    public function makePenawaran(Request $request){
        // Buat Penawaran
        $user = Session::get('user');
        $penawaran = Session::get('penawaran');
        $total = $request->input('total');
        $grand_total = $request->input('grand_total');
        $ppn = $request->input('ppn');
        $total_ppn = $request->input('total_ppn');

        DB::beginTransaction();
        try {
            // Insert Header Penawaran
            $lastId = DB::table('hpenawaran')->insertGetId([
                'customer_id' => $user->id,
                'total' => $total,
                'ppn' => $ppn,
                'ppn_value' => $total_ppn,
                'grand_total' => $grand_total,
                'created_at' => Carbon::now(),
            ]);

            foreach ($penawaran as $key => $value) {
                $barang = Barang::where('part', $value->part)->first();

                DB::table('dpenawaran')->insert([
                    'hpenawaran_id' => $lastId,
                    'part' => $value->part,
                    'qty' => $value->qty,
                    'harga_penawaran' => $value->subtotal / $value->qty,
                    'subtotal' => $value->subtotal,
                    'created_at' => Carbon::now(),
                ]);
            }

            Session::forget('penawaran');
            DB::commit();
            return redirect('/penawaran/view')->with([
                'title' => 'Berhasil membuat penawaran!',
                'msg' => 'Penawaran berhasil dibuat!'
            ]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('/penawaran')->withErrors([
                'msg' => 'Gagal membuat penawaran, silahkan coba lagi!'
            ]);
        }
    }

    public function viewPenawaranList(){
        $user = Session::get('user');
        $penawaran = HeaderPenawaran::latest()->where('customer_id', $user->id)->get();

        foreach ($penawaran as $key => $value) {
            if ($value->status == 0) {
                $value->status_text = 'Menunggu Konfirmasi';
                $value->status_bg = 'text-yellow-600';
            }
            else if ($value->status == 1) {
                $value->status_text = 'Diterima';
                $value->status_bg = 'text-green-500';
            }
            else if ($value->status == -1) {
                $value->status_text = 'Ditolak';
                $value->status_bg = 'text-red-500';
            }
        }
        return view('penawaranlist.view', [
            'data' => $penawaran
        ]);
    }

    public function viewPenawaranDetail($id){
        $penawaran = HeaderPenawaran::where('id', $id)->first();
        $detail = DB::table('dpenawaran')->where('hpenawaran_id', $id)->get();
        foreach ($detail as $key => $value) {
            $barang = Barang::where('part', $value->part)->first();
            $value->barang = $barang;
        }

        if ($penawaran->status == 0) {
            $penawaran->status_text = 'Menunggu Konfirmasi';
            $penawaran->status_bg = 'text-yellow-600';
        }
        else if ($penawaran->status == 1) {
            $penawaran->status_text = 'Diterima';
            $penawaran->status_bg = 'text-green-500';
        }
        else if ($penawaran->status == -1) {
            $penawaran->status_text = 'Ditolak';
            $penawaran->status_bg = 'text-red-500';
        }

        return view('penawaranlist.detail', [
            'header' => $penawaran,
            'detail' => $detail,
        ]);
    }
}
