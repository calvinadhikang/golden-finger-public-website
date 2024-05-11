@extends('templates.light-nav')

@section('content')
{{-- side bar - start  --}}
<div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-10">
    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Produk Kami</h1>
    <div class="flex items-center">
        <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
            <span class="sr-only">Filters</span>
            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</div>

<section aria-labelledby="products-heading" class="pb-24 pt-6">
    <h2 id="products-heading" class="sr-only">Products</h2>
    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
        <!-- Filters -->
        <form method="GET">
            <h3 class="mb-2 border-b pb-2 ps-2 font-bold text-lg">Categories</h3>
            <ul role="list" class="space-y-1 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                <li class="p-2 hover:bg-gray-100 rounded">
                    <button name="category[]" value="1">Ban Luar</button>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <button name="category[]" value="2">Ban Dalam</button>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <button name="category[]" value="3">Bridgestone</button>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <button name="category[]" value="4">Longmarch</button>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <button name="category[]" value="5">Everwin</button>
                </li>
            </ul>
        </form>

        <!-- Product grid -->
        <div class="lg:col-span-3">
            <!-- Your content -->
            <div>
                <label for="hs-trailing-button-add-on-with-icon" class="sr-only">Label</label>
                <form class="flex rounded-lg shadow-sm" method="get">
                    <input type="text" placeholder="Search Here..."
                        id="hs-trailing-button-add-on-with-icon"
                        name="search"
                        value="{{ $search }}"
                        class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <button class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none ">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Card Blog -->
            <div class="mt-5">
                <!-- Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $item)
                    <!-- Card -->
                    <div class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl ">
                        <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                            <img src="https://drive.google.com/thumbnail?id=1hkHYvobBdZb5R9k_48zL3FWc2SEEnyIF" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col grow">
                            <div class="block mb-1 text-xs font-semibold uppercase text-blue-600 whitespace-normal">{{ $item->part }}</div>
                            <div class="text-xl font-semibold text-gray-800 grow">{{ $item->nama }}</div>
                            <div class="text-l font-semibold text-gray-800 py-2">Rp. {{ number_format($item->harga) }}</div>

                            <form action="{{ url("/cart/add/$item->part") }}" method="POST">
                                @csrf
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
                            <a href="{{ url("/product/detail/$item->part") }}">
                                <button class="w-full flex items-center justify-center gap-x-2 mt-2 py-3 px-4 border rounded-lg text-sm font-medium hover:bg-blue-100">Lihat Detail</button>
                            </a>
                        </div>
                    </div>
                    <!-- End Card -->
                    @endforeach
                </div>
                <!-- End Grid -->
            </div>
            <!-- End Card Blog -->
        </div>
    </div>
</section>
{{-- sidebar - end  --}}
@endsection()

