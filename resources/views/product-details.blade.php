@extends('templates.light-nav')

@section('content')
<div class="pb-6">
    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Produk Kami</h1>
    <ol class="flex items-center whitespace-nowrap mt-2">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
                href="/product">
                Produk
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
            aria-current="page">
            Detail Produk
        </li>
    </ol>
</div>
<div class="grid items-start grid-cols-1 lg:grid-cols-2 mx-auto gap-y-5">
    <div class="">
        <img src="{{ $product->image }}" alt="Product" class="w-full h-full object-cover object-top shadow-md border" />
    </div>
    <div class="lg:px-10">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-800">{{ $product->nama }}</h2>
            <p class="text-sm text-gray-400 mt-2">{{ $product->part }}</p>
        </div>
        <div class="mt-8">
            <p class="text-gray-800 text-3xl font-bold">Rp {{ number_format($product->harga) }}</p>
            <p class="text-gray-400 mt-1 text-sm ml-1">Belum termasuk pajak 11%</p>
        </div>
        <div class="mt-8 space-y-4">
            <form action="{{ url("/cart/add/$product->part") }}" method="POST">
                @csrf
                <p class="text-gray-800">Stok tersisa {{ $product->stok }} SET</p>
                <button name="type" value="barang" class="w-full flex items-center justify-center gap-x-2 mt-2 py-3 px-4 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                    Beli
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m5 11 4-7"></path>
                        <path d="m19 11-4-7"></path>
                        <path d="M2 11h20"></path>
                        <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"></path>
                        <path d="m9 11 1 9"></path>
                        <path d="M4.5 15.5h15"></path>
                        <path d="m15 11-1 9"></path>
                    </svg>
                </button>
            </form>
        </div>
        <div class="mt-8">
            <h3 class="text-lg font-bold text-gray-800">Deskripsi Produk</h3>
            @if ($product->description != "" || $product->description != null)
                <textarea class="w-full border border-gray-100 rounded-lg" rows="10" readonly>{{ $product->description }}</textarea>
            @else
                <p class="text-gray-400">Deskripsi produk tidak tersedia.</p>
            @endif
        </div>
    </div>
</div>
@endsection
