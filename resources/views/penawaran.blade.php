@extends('templates.light-nav')

@section('content')

<h1 class="text-4xl font-bold tracking-tight text-gray-900">Buat Penawaran</h1>
<a href="{{ url('/cart') }}">
    <div class="bg-yellow-300 hover:bg-yellow-600 text-center p-4 rounded-lg w-full mt-3 text-lg font-bold">Kamu dalam mode buat penawaran. Untuk kembali / keluar klik disini.</div>
</a>

@if (count($carts) > 0)
<div class="grid lg:grid-cols-3 gap-8 items-start mt-8">
    <div class="divide-y lg:col-span-2">
        @foreach ($carts as $item)
            <div class="flex items-start justify-between gap-4 py-8">
                <div class="flex gap-6">
                    <div class="h-64 max-w-52 bg-gray-100 p-6 rounded">
                        <img src="{{ $item->barang->image }}"
                            class="w-full h-full object-contain shrink-0" />
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-[#333]">{{ $item->barang->nama }}</p>
                        <h4 class="text-xl font-bold text-[#333] mt-4">Subtotal : Rp {{ number_format($item->subtotal) }}</h4>
                        <form method="POST" action="{{ url("/penawaran/modify") }}" class="mt-5">
                            @csrf
                            <input type="hidden" name="part" value="{{ $item->part }}">
                            <div class="flex items-center justify-between gap-x-5 mb-2 flex-wrap">
                                <div class="flex-grow">
                                    <p class="mb-2">Harga Per Barang</p>
                                    <input type="number" class="rounded-lg" name="harga" value="{{ $item->subtotal / $item->qty }}">
                                </div>
                                <div class="">
                                    <p class="mb-2">Jumlah Barang</p>
                                    <input type="number" class="rounded-lg" name="qty" value="{{ $item->qty }}">
                                </div>
                            </div>
                            <button name="type" value="harga" class="py-2 px-4 rounded-lg bg-yellow-200 hover:bg-yellow-300">Simpan</button>
                        </form>
                    </div>
                </div>
                <form method="POST" action="{{ url("/penawaran/remove/$item->part") }}">
                    @csrf
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 inline cursor-pointer" viewBox="0 0 24 24">
                            <path
                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                data-original="#000000"></path>
                            <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                data-original="#000000"></path>
                        </svg>
                    </button>
                </form>
            </div>
        @endforeach
    </div>
    <div class="">
        <div class="bg-gray-100 p-8 rounded-lg">
            <h3 class="text-2xl font-bold text-[#333]">Order summary</h3>
            <ul class="text-[#333] mt-6 divide-y">
                <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">Rp {{ number_format($total) }}</span></li>
                <li class="flex flex-wrap gap-4 text-md py-3">PPN {{ $ppn }}% <span class="ml-auto font-bold">Rp {{ number_format($total_ppn) }}</span>
                </li>
                <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">Rp {{ number_format($grand_total) }}</span></li>
            </ul>
            <form action="{{ url('/penawaran/make') }}" method="POST">
                @csrf
                <button type="submit" class="mt-6 text-md px-6 py-2.5 w-full bg-yellow-300 hover:bg-yellow-500 rounded">Buat Penawaran</button>
            </form>
        </div>
    </div>
</div>
@else
    <a href="/product">
        <div class="p-4 mt-5 bg-gray-100 font-medium hover:bg-gray-200 rounded-lg text-center">Keranjang kamu kosong, yuk lihat-lihat produk dulu!</div>
    </a>
@endif
{{-- cart - end  --}}
@endsection
