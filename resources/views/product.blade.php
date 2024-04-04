<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body>


    {{-- header - start  --}}
        <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full  bg-black">
            <nav class="relative max-w-7xl w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold text-white" href="/" aria-label="Brand">Goldfinger Wheels</a>
                <div class="sm:hidden">
                <button type="button" class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <svg class="hs-collapse-open:block flex-shrink-0 hidden size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                <div class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                <a class="font-medium  dark:text-gray-400 dark:hover:text-gray-500" href="/cart">Cart</a>
                {{-- <a class="font-medium  dark:text-gray-400 dark:hover:text-gray-500" href="#">Work</a>
                <a class="font-medium  dark:text-gray-400 dark:hover:text-gray-500" href="#">Blog</a> --}}


                <a class="flex items-center gap-x-2 font-medium text-gray-500 hover:text-blue-600 sm:border-s sm:border-gray-300 sm:my-6 sm:ps-6 dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500" href="/login">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    Log in
                </a>
                </div>
            </div>
            </nav>
        </header>
    {{-- header - end --}}

    {{-- side bar - start  --}}
    <div class="bg-white">
        <div>
        <!--
            Mobile filter dialog

            Off-canvas filters for mobile, show/hide based on off-canvas filters state.
        -->
        {{-- <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <!--
            Off-canvas menu backdrop, show/hide based on off-canvas menu state.

            Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
            Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-black bg-opacity-25"></div>

            <div class="fixed inset-0 z-40 flex">
            <!--
                Off-canvas menu, show/hide based on off-canvas menu state.

                Entering: "transition ease-in-out duration-300 transform"
                From: "translate-x-full"
                To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "translate-x-full"
            -->
            <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                <div class="flex items-center justify-between px-4">
                <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                <button type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>

                <!-- Filters -->
                <form class="mt-4 border-t border-gray-200">
                <h3 class="sr-only">Categories</h3>
                <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                    <li>
                    <a href="#" class="block px-2 py-3">Totes</a>
                    </li>
                    <li>
                    <a href="#" class="block px-2 py-3">Backpacks</a>
                    </li>
                    <li>
                    <a href="#" class="block px-2 py-3">Travel Bags</a>
                    </li>
                    <li>
                    <a href="#" class="block px-2 py-3">Hip Bags</a>
                    </li>
                    <li>
                    <a href="#" class="block px-2 py-3">Laptop Sleeves</a>
                    </li>
                </ul>

                <div class="border-t border-gray-200 px-4 py-6">
                    <h3 class="-mx-2 -my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-0" aria-expanded="false">
                        <span class="font-medium text-gray-900">Color</span>
                        <span class="ml-6 flex items-center">
                        <!-- Expand icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        <!-- Collapse icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                        </svg>
                        </span>
                    </button>
                    </h3>
                    <!-- Filter section, show/hide based on section state. -->
                    <div class="pt-6" id="filter-section-mobile-0">
                    <div class="space-y-6">
                        <div class="flex items-center">
                        <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">White</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500">Beige</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Blue</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Brown</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-color-4" class="ml-3 min-w-0 flex-1 text-gray-500">Green</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-color-5" class="ml-3 min-w-0 flex-1 text-gray-500">Purple</label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 px-4 py-6">
                    <h3 class="-mx-2 -my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-1" aria-expanded="false">
                        <span class="font-medium text-gray-900">Category</span>
                        <span class="ml-6 flex items-center">
                        <!-- Expand icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        <!-- Collapse icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                        </svg>
                        </span>
                    </button>
                    </h3>
                    <!-- Filter section, show/hide based on section state. -->
                    <div class="pt-6" id="filter-section-mobile-1">
                    <div class="space-y-6">
                        <div class="flex items-center">
                        <input id="filter-mobile-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">New Arrivals</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Sale</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-category-2" name="category[]" value="travel" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Travel</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Organization</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Accessories</label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 px-4 py-6">
                    <h3 class="-mx-2 -my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-2" aria-expanded="false">
                        <span class="font-medium text-gray-900">Size</span>
                        <span class="ml-6 flex items-center">
                        <!-- Expand icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        <!-- Collapse icon, show/hide based on section open state. -->
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                        </svg>
                        </span>
                    </button>
                    </h3>
                    <!-- Filter section, show/hide based on section state. -->
                    <div class="pt-6" id="filter-section-mobile-2">
                    <div class="space-y-6">
                        <div class="flex items-center">
                        <input id="filter-mobile-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">2L</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">6L</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-size-2" name="size[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">12L</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-size-3" name="size[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">18L</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-size-4" name="size[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">20L</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-mobile-size-5" name="size[]" value="40l" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500">40L</label>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div> --}}

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>


            <div class="flex items-center">
                <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                <span class="sr-only">Filters</span>
                <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
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
                <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                    <li>
                    <a href="#">Totes</a>
                    </li>
                    <li>
                    <a href="#">Backpacks</a>
                    </li>
                    <li>
                    <a href="#">Travel Bags</a>
                    </li>
                    <li>
                    <a href="#">Hip Bags</a>
                    </li>
                    <li>
                    <a href="#">Laptop Sleeves</a>
                    </li>
                </ul>

                <div class="border-b border-gray-200 py-6">
                    <h3 class="-my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                        <span class="font-medium text-gray-900">Color</span>
                    </button>
                    </h3>
                    <!-- Filter section, show/hide based on section state. -->
                    <div class="pt-6" id="filter-section-0">
                    <div class="space-y-4">
                        <div class="flex items-center">
                        <input id="filter-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-color-0" class="ml-3 text-sm text-gray-600">White</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-color-1" class="ml-3 text-sm text-gray-600">Beige</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-color-2" class="ml-3 text-sm text-gray-600">Blue</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-color-3" class="ml-3 text-sm text-gray-600">Brown</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-color-4" class="ml-3 text-sm text-gray-600">Green</label>
                        </div>
                        <div class="flex items-center">
                        <input id="filter-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-color-5" class="ml-3 text-sm text-gray-600">Purple</label>
                        </div>
                    </div>
                    </div>
                </div>
                </form>

                <!-- Product grid -->
                <div class="lg:col-span-3">
                <!-- Your content -->
                <div>
                    <label for="hs-trailing-button-add-on-with-icon" class="sr-only">Label</label>
                    <div class="flex rounded-lg shadow-sm">
                      <input type="text" placeholder="Search Here..." id="hs-trailing-button-add-on-with-icon" name="hs-trailing-button-add-on-with-icon" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                      <button type="button" class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none ">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                      </button>
                    </div>
                </div>

                <!-- Card Blog -->
                    <div class="max-w-[55rem] mt-10 px-4 sm:px-6 lg:px-8 mx-auto">
                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Card -->
                        <div class="h-80 group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl ">
                            <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                            </div>
                            <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                                MERK
                            </span>
                            <h3 class="text-xl font-semibold text-gray-800 ">
                                Atlassian
                            </h3>
                            <h3 class="text-l font-semibold text-gray-800 ">
                                Rp. 3.000.000
                            </h3>
                            </div>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="h-80 group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl ">
                            <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                            </div>
                            <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                                MERK
                            </span>
                            <h3 class="text-xl font-semibold text-gray-800 ">
                                Atlassian
                            </h3>
                            <h3 class="text-l font-semibold text-gray-800 ">
                                Rp. 3.000.000
                            </h3>
                            </div>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="h-80 group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl ">
                            <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                            </div>
                            <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                                MERK
                            </span>
                            <h3 class="text-xl font-semibold text-gray-800 ">
                                Atlassian
                            </h3>
                            <h3 class="text-l font-semibold text-gray-800 ">
                                Rp. 3.000.000
                            </h3>
                            </div>
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="h-80 group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl ">
                            <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                            </div>
                            <div class="p-4 md:p-6">
                            <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                                MERK
                            </span>
                            <h3 class="text-xl font-semibold text-gray-800 ">
                                Atlassian
                            </h3>
                            <h3 class="text-l font-semibold text-gray-800 ">
                                Rp. 3.000.000
                            </h3>
                            </div>
                        </div>
                        <!-- End Card -->

                        </div>
                        <!-- End Grid -->
                    </div>
                    <!-- End Card Blog -->

                </div>
            </div>
            </section>
        </main>
        </div>
    </div>
    {{-- sidebar - end  --}}



</body>
</html>
