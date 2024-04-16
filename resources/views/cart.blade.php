@extends('templates.light-nav')

@section('content')

<h1 class="text-4xl font-bold tracking-tight text-gray-900">Keranjang</h1>


<div class="grid lg:grid-cols-3 gap-8 items-start mt-8">
    <div class="divide-y lg:col-span-2">
        @if (count($carts) > 0)
            @foreach ($carts as $item)
                <div class="flex items-start justify-between gap-4 py-8">
                    <div class="flex gap-6">
                        <div class="h-64 max-w-52 bg-gray-100 p-6 rounded">
                            <img src='https://drive.google.com/thumbnail?id=1hkHYvobBdZb5R9k_48zL3FWc2SEEnyIF'
                                class="w-full h-full object-contain shrink-0" />
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-[#333]">{{ $item->barang->nama }}</p>
                            <p class="text-gray-400 text-xs mt-1">Rp {{ number_format($item->subtotal / $item->qty) }} per-item</p>
                            <h4 class="text-xl font-bold text-[#333] mt-4">Rp {{ number_format($item->subtotal) }}</h4>
                            <form method="POST" action="{{ url("/cart/modify/$item->id") }}" class="mt-6 flex items-center gap-x-5">
                                @csrf
                                <button name="modify" value="-1" class="py-2 px-4 rounded-full {{ $item->qty == 1 ? 'bg-red-400 hover:bg-red-500 text-white' : 'bg-gray-100 hover:bg-gray-200' }}">{{ $item->qty == 1 ? 'Hapus' : 'Kurangi' }}</button>
                                <p class="text-lg font-medium">{{ $item->qty }}</p>
                                <button name="modify" value="1" class="py-2 px-4 rounded-full bg-gray-100 hover:bg-gray-200">Tambah</button>
                            </form>
                        </div>
                    </div>
                    <form method="POST" action="{{ url("/cart/remove/$item->id") }}">
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
        @else
            <a href="/product">
                <div class="p-4 bg-gray-100 hover:bg-gray-200 rounded-lg text-center">Keranjang kamu kosong, yuk lihat-lihat produk dulu!</div>
            </a>
        @endif
    </div>
    <div class="bg-gray-100 p-8 rounded-lg">
        <h3 class="text-2xl font-bold text-[#333]">Order summary</h3>
        <ul class="text-[#333] mt-6 divide-y">
            <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">Rp {{ number_format($total) }}</span></li>
            <li class="flex flex-wrap gap-4 text-md py-3">PPN {{ $ppn }}% <span class="ml-auto font-bold">Rp {{ number_format($total_ppn) }}</span>
            </li>
            <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">Rp {{ number_format($grand_total) }}</span></li>
        </ul>
        <form action="{{ url('/checkout') }}" method="POST">
            @csrf
            <button type="button" class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Checkout</button>
        </form>
    </div>
</div>
{{-- cart - end  --}}
@endsection
