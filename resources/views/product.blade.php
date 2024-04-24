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
        <form class="hidden lg:block">
            <h3 class="sr-only">Categories</h3>
            <ul role="list"
                class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                <li>
                    <a href="#">Ban Luar</a>
                </li>
                <li>
                    <a href="#">Ban Dalam</a>
                </li>
                <li>
                    <a href="#">Bridgestone</a>
                </li>
                <li>
                    <a href="#">Longmarch</a>
                </li>
                <li>
                    <a href="#">Everwin</a>
                </li>
            </ul>

            {{-- <div class="border-b border-gray-200 py-6">
                <h3 class="-my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button type="button"
                        class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                        aria-controls="filter-section-0" aria-expanded="false">
                        <span class="font-medium text-gray-900">Color</span>
                    </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div class="pt-6" id="filter-section-0">
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input id="filter-color-0" name="color[]" value="white" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-color-0" class="ml-3 text-sm text-gray-600">White</label>
                        </div>
                        <div class="flex items-center">
                            <input id="filter-color-1" name="color[]" value="beige" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-color-1" class="ml-3 text-sm text-gray-600">Beige</label>
                        </div>
                        <div class="flex items-center">
                            <input id="filter-color-2" name="color[]" value="blue" type="checkbox"
                                checked
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-color-2" class="ml-3 text-sm text-gray-600">Blue</label>
                        </div>
                        <div class="flex items-center">
                            <input id="filter-color-3" name="color[]" value="brown" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-color-3" class="ml-3 text-sm text-gray-600">Brown</label>
                        </div>
                        <div class="flex items-center">
                            <input id="filter-color-4" name="color[]" value="green" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-color-4" class="ml-3 text-sm text-gray-600">Green</label>
                        </div>
                        <div class="flex items-center">
                            <input id="filter-color-5" name="color[]" value="purple" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-color-5"
                                class="ml-3 text-sm text-gray-600">Purple</label>
                        </div>
                    </div>
                </div>
            </div>  --}}
        </form>

        <!-- Product grid -->
        <div class="lg:col-span-3">
            <!-- Your content -->
            <div>
                <label for="hs-trailing-button-add-on-with-icon" class="sr-only">Label</label>
                <div class="flex rounded-lg shadow-sm">
                    <input type="text" placeholder="Search Here..."
                        id="hs-trailing-button-add-on-with-icon"
                        name="hs-trailing-button-add-on-with-icon"
                        class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <button type="button"
                        class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none ">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" /></svg>
                    </button>
                </div>
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
                        <div class="p-4 md:p-6 flex flex-col grow">
                            <div class="block mb-1 text-xs font-semibold uppercase text-blue-600 whitespace-normal">{{ $item->part }}</div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $item->nama }}</h3>
                            <div class="text-l font-semibold text-gray-800 grow">Rp. {{ number_format($item->harga) }}</div>
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

