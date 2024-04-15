@extends('templates.light-nav')

@section('content')
<h1 class="text-4xl font-bold tracking-tight text-gray-900">Detail Service Vulkanisir</h1>
<ol class="flex items-center whitespace-nowrap mt-2">
    <li class="inline-flex items-center">
        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="/vservice">
            Data Service Vulkanisir
        </a>
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
    </li>
    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
        Detail Service Vulkanisir
    </li>
</ol>
<div class="mt-10">
    <div class="flex w-full">
        <div class="flex-grow">
            <p class="text-lg">Nama Teknisi : <span class="font-medium">{{ $service->teknisi->nama }}</span></p>
            <p class="text-lg">Nama Barang : <span class="font-medium">{{ $service->nama }}</span></p>
            <p class="text-lg">Perkiraan Waktu Selesai : <span class="font-medium">{{ $service->will_finish_at }}</span></p>
        </div>
        <div class="w-1/3 rounded-lg bg-gray-100 p-4 ">
            <div class="grid grid-cols-2 gap-y-3">
                <p class="">Status Service :</p>
                <div class="text-right">
                    @if ($service_status == 'On Progress')
                        <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">{{ $service_status }}</span>
                    @elseif ($service_status == 'Pickup')
                        <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-600 text-white dark:bg-blue-500">{{ $service_status }}</span>
                    @elseif ($service_status == 'Canceled')
                        <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ $service_status }}</span>
                    @elseif ($service_status == 'Finished')
                        <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-500 text-white">{{ $service_status }}</span>
                    @endif
                </div>
                <p class="">Biaya Service :</p>
                <p class="text-right font-medium">Rp {{ number_format($service->harga) }}</p>
            </div>

        </div>
    </div>


</div>
@endsection
