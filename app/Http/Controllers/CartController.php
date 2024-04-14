<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function view(){
        $user = Session::get('user');
        $carts = Cart::where('customer_id', $user->id)->get();

        $total = 0;
        foreach ($carts as $key => $value) {
            $total += $value->subtotal;
        }

        $ppn = DB::table('settings')->where('id', 1)->first()->ppn;
        $total_ppn = $total / 100 * $ppn;
        $grand_total = $total_ppn + $total;

        return view('cart', [
            'carts' => $carts,
            'total' => $total,
            'total_ppn' => $total_ppn,
            'grand_total' => $grand_total,
            'ppn' => $ppn,
        ]);
    }

    public function addToCart($id, Request $request){
        $user = Session::get('user');
        $type = $request->input('type', 'barang');
        $barang = Barang::where('part', $id)->first();

        $cart = Cart::where('customer_id', '=', $user->id)->where('part', $id)->first();
        if (!$cart) {
            //Tambah Cart baru
            $newCart = Cart::create([
                'customer_id' => $user->id,
                'part' => $id,
                'type' => $type,
                'qty' => 1,
                'subtotal' => $barang->harga,
            ]);
        }else{
            //Tambah QTY saja
            $cart->qty = $cart->qty + 1;
            $cart->subtotal = $barang->harga * $cart->qty;
            $cart->save();
        }

        return redirect('/cart')->with([
            'title' => 'Sukses tambah barang',
            'msg' => "Barang telah ditambahkan ke keranjang!"
        ]);
    }

    public function modifyCart($id, Request $request){
        $modify = $request->input('modify');
        $cart = Cart::find($id);

        if($cart->type == 'barang'){
            $harga = Barang::where('part', $cart->part)->first()->harga;
        }

        $cart->qty = $cart->qty + $modify;
        $cart->subtotal = $harga * $cart->qty;
        if ($cart->qty <= 0) {
            $cart->forceDelete();
            return back()->with(([
                'title' => 'Berhasil Hapus Item dari Keranjang!',
                'msg' => 'Barang berhasil dihapus dari keranjang!'
            ]));
        }else{
            $cart->save();
            return back()->with(([
                'title' => 'Berhasil Ubah Jumlah Barang',
                'msg' => 'Barang berhasil diubah jumlahnya pada keranjang!'
            ]));
        }
    }

    public function removeCart($id){
        $cart = Cart::find($id)->forceDelete();
        return back()->with(([
            'title' => 'Berhasil Hapus Keranjang!',
            'msg' => 'Barang / Paket berhasil dihapus dari keranjang!'
        ]));
    }
}
