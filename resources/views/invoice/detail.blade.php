@extends('templates.light-nav')

@section('content')
    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Detail Invoice</h1>
    <ol class="flex items-center whitespace-nowrap mt-2">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
                href="/invoice">
                Invoice
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
            aria-current="page">
            Detail Invoice
        </li>
    </ol>
    <p class="mt-10">Kode Transaksi</p>
    <p class="font-medium text-3xl">{{ $invoice->kode }}</p>
    <div class="grid lg:grid-cols-3 gap-8 items-start">
        <div class="divide-y lg:col-span-2">
            @foreach ($invoice->details as $item)
                <div class="flex items-start justify-between gap-4 py-8">
                    <div class="flex gap-6">
                        <div class="h-64 max-w-52 bg-gray-100 p-6 rounded">
                            <img src='https://drive.google.com/thumbnail?id=1hkHYvobBdZb5R9k_48zL3FWc2SEEnyIF'
                                class="w-full h-full object-contain shrink-0" />
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-[#333]">{{ $item->part }} - {{ $item->nama }}</p>
                            <p class="text-gray-400 text-xs mt-1">Rp {{ number_format($item->harga) }} per-item</p>
                            <p class="text-lg font-medium">{{ $item->qty }} Item</p>
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
                <div class="{{ $status['background'] }}">{{ $status['text'] }}</div>
            </div>
            @if ($invoice->status == -1)
                <div class="">
                    <h1 class="font-medium">Alasan Pembatalan :</h1>
                    <div class="px-2 py-2 my-3 block w-full border-red-200 bg-red-100 border rounded-lg text-sm">
                        {{ $invoice->cancel_reason }}
                    </div>
                </div>
            @elseif ($invoice->status == 2)
                <div class="">
                    <div class="px-2 py-2 my-3 block w-full border-green-200 bg-green-100 border rounded-lg text-sm" >
                        Transaksi sudah lunas, hubungi admin di untuk informasi pesanan.
                        <br><br>
                        Nomor Admin: 082157118887/08125309669
                    </div>
                </div>
            @endif
            <div class="border-b-2"></div>
            <p class="py-2 text-lg font-medium">Detail Biaya</p>
            <div class="border-b-2"></div>
            <ul class="text-[#333]divide-y">
                <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">Rp
                        {{ number_format($invoice->total) }}</span></li>
                <li class="flex flex-wrap gap-4 text-md py-3">PPN {{ $invoice->ppn }}% <span class="ml-auto font-bold">Rp
                        {{ number_format($invoice->ppn_value) }}</span>
                </li>
                <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">Rp
                        {{ number_format($invoice->grand_total) }}</span></li>
            </ul>

            @if ($invoice->status == 1)
                <button id="pay-button" class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Bayar</button>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        $('#pay-button').click(function (e) {
            e.preventDefault();

            snap.pay('{{ $invoice->snap_token }}', {
                onSuccess: function (result) {
                    $.post("{{ route('invoice.payment') }}", {
                        _token: "{{ csrf_token() }}",
                        invoice_id: "{{ $invoice->id }}",
                    }, function (data) {
                        location.reload();
                    });
                },
                onPending: function (result) {
                    location.reload();
                },
                onError: function (result) {
                    location.reload();
                }
            });
        });
    </script>
@endsection
