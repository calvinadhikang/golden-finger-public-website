@extends('templates.light-nav')

@section('content')
    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Detail Penawaran</h1>
    <ol class="flex items-center whitespace-nowrap mt-2">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
                href="/penawaran/view">
                Penawaran
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
            aria-current="page">
            Detail Penawaran
        </li>
    </ol>
    <p class="mt-10">Kode Penawaran</p>
    <p class="font-medium text-3xl">{{ $header->id }}</p>
    <div class="grid lg:grid-cols-3 gap-8 items-start">
        <div class="divide-y lg:col-span-2">
            @foreach ($detail as $item)
                <div class="flex items-start justify-between gap-4 py-8">
                    <div class="flex gap-6">
                        <div class="h-64 max-w-52 bg-gray-100 p-6 rounded">
                            <img src='https://drive.google.com/thumbnail?id=1hkHYvobBdZb5R9k_48zL3FWc2SEEnyIF'
                                class="w-full h-full object-contain shrink-0" />
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-[#333]">{{ $item->part }} - {{ $item->barang->nama }}</p>
                            <p class="mt-5 font-medium text-xl">Rp {{ number_format($item->harga_penawaran) }} per-item</p>
                            <p class="text-gray-400 text-xs mt-1">Harga asli : Rp {{ number_format($item->barang->harga) }} per-item</p>
                            <p class="text-lg font-medium mt-3">{{ $item->qty }} Item</p>
                            <h4 class="text-xl font-bold text-[#333] mt-4">Rp {{ number_format($item->subtotal) }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bg-gray-100 p-8 rounded-lg">
            <h3 class="text-2xl font-bold text-[#333]">Ringkasan Transaksi</h3>
            <div class="flex items-center justify-between">
                <p class="py-2 text-lg font-medium">Status Transaksi</p>
                <div class="">{{ $header->status_text }}</div>
            </div>
            <div class="border-b-2"></div>
            <div class="my-2 flex items-center justify-between">
                <p class="text-lg font-medium">Tanggal Pembelian</p>
                <p>{{ date_format($header->created_at, 'd M Y') }}</p>
            </div>
            <div class="border-b-2"></div>
            <p class="py-2 text-lg font-medium">Detail Biaya</p>
            <div class="border-b-2"></div>
            <ul class="text-[#333]divide-y">
                <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">Rp
                        {{ number_format($header->total) }}</span></li>
                <li class="flex flex-wrap gap-4 text-md py-3">PPN {{ $header->ppn }}% <span class="ml-auto font-bold">Rp
                        {{ number_format($header->ppn_value) }}</span>
                </li>
                <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">Rp
                        {{ number_format($header->grand_total) }}</span></li>
            </ul>

            @if ($header->status == -1)
                <div class="">
                    <h1 class="font-medium">Alasan Pembatalan :</h1>
                    <div class="px-2 py-2 block w-full border-red-200 bg-red-100 border rounded-lg text-sm">
                        {{ $header->cancel_reason }}
                    </div>
                </div>
            @elseif ($header->status == 1)
                <div class="">
                    <a href="{{ url('/invoice/detail/'.$header->confirmed_invoice) }}" class="text-center px-2 py-2 block w-full border-green-200 bg-green-100 hover:bg-green-500 border rounded-lg text-sm">Lihat Invoice</a>
                </div>
            @endif
        </div>
    </div>
@endsection
