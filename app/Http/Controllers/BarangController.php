<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

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
