<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    //
    public function viewProducts(){
        $products = Barang::latest()->where('public', '=', 1)->get();
        return view('product', [
            'products' => $products
        ]);
    }
}
