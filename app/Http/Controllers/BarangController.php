<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    //
    public function view(Request $request){
        $search = $request->query('search', '');
        $products = Barang::latest()
            ->where('public', 1)
            ->where(function($query) use ($search) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhere('part', 'like', "%$search%");
            })->get();
        return view('product', [
            'products' => $products,
            'search' => $search
        ]);
    }

    public function viewDetail($part){
        if ($part == null) {
            return back();
        }

        $product = Barang::where("part", $part)->where("public", 1)->first();
        if ($product == null) {
            return back();
        }

        return view('product-details', [
            'product' => $product
        ]);
    }
}
