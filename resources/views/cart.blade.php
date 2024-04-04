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
                <a class="font-medium  text-white" href="/cart">Cart</a>
                {{-- <a class="font-medium  dark:text-gray-400 dark:hover:text-gray-500" href="#">Work</a>
                <a class="font-medium  dark:text-gray-400 dark:hover:text-gray-500" href="#">Blog</a> --}}


                <a class="flex items-center gap-x-2 font-medium text-white hover:text-blue-600 sm:border-s sm:border-gray-300 sm:my-6 sm:ps-6 " href="/login">
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


    {{-- cart - start  --}}

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">


    <div class=" bg-white mt-12">
        <div class="lg:max-w-7xl max-w-xl mx-auto">
          {{-- <h2 class="text-3xl font-extrabold text-[#333]">Shopping Cart</h2> --}}
          {{-- <h1 class="text-4xl font-bold tracking-tight text-gray-900">Shopping Cart</h1> --}}

            <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>


          <div class="grid lg:grid-cols-3 gap-8 items-start mt-8">
            <div class="divide-y lg:col-span-2">
              <div class="flex items-start justify-between gap-4 py-8">
                <div class="flex gap-6">
                  <div class="h-64 bg-gray-100 p-6 rounded">
                    <img src='https://readymadeui.com/product_img_2.webp' class="w-full h-full object-contain shrink-0" />
                  </div>
                  <div>
                    <p class="text-md font-bold text-[#333]">Black T-Shirt</p>
                    <p class="text-gray-400 text-xs mt-1">1 Item</p>
                    <h4 class="text-xl font-bold text-[#333] mt-4">$18.5</h4>
                    <div class="mt-6">
                      <button type="button" class="flex flex-wrap gap-2 text-xl text-[#333]">
                        <span class="bg-gray-100 px-2 py-1 rounded">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current" viewBox="0 0 124 124">
                            <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" data-original="#000000"></path>
                          </svg>
                        </span>
                        <span class="mx-4">1</span>
                        <span class="bg-gray-100 px-2 py-1 rounded">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current" viewBox="0 0 42 42">
                            <path d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z" data-original="#000000"></path>
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 inline cursor-pointer" viewBox="0 0 24 24">
                  <path
                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                    data-original="#000000"></path>
                  <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                    data-original="#000000"></path>
                </svg>
              </div>
              <div class="flex items-start justify-between gap-4 py-8">
                <div class="flex gap-6">
                  <div class="h-64 bg-gray-100 p-6 rounded">
                    <img src='https://readymadeui.com/product_img_1.webp' class="w-full h-full object-contain shrink-0" />
                  </div>
                  <div>
                    <p class="text-md font-bold text-[#333]">Light Gray T-Shirt</p>
                    <p class="text-gray-400 text-xs mt-1">1 Item</p>
                    <h4 class="text-xl font-bold text-[#333] mt-4">$25.5</h4>
                    <div class="mt-6">
                      <button type="button" class="flex flex-wrap gap-2 text-xl text-[#333]">
                        <span class="bg-gray-100 px-2 py-1 rounded">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current" viewBox="0 0 124 124">
                            <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" data-original="#000000"></path>
                          </svg>
                        </span>
                        <span class="mx-4">1</span>
                        <span class="bg-gray-100 px-2 py-1 rounded">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 fill-current" viewBox="0 0 42 42">
                            <path d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z" data-original="#000000"></path>
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 inline cursor-pointer" viewBox="0 0 24 24">
                  <path
                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                    data-original="#000000"></path>
                  <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                    data-original="#000000"></path>
                </svg>
              </div>
            </div>
            <div class="bg-gray-100 p-8">
              <h3 class="text-2xl font-bold text-[#333]">Order summary</h3>
              <ul class="text-[#333] mt-6 divide-y">
                <li class="flex flex-wrap gap-4 text-md py-3">Subtotal <span class="ml-auto font-bold">$44.00</span></li>
                <li class="flex flex-wrap gap-4 text-md py-3">Shipping <span class="ml-auto font-bold">$4.00</span></li>
                <li class="flex flex-wrap gap-4 text-md py-3">Tax <span class="ml-auto font-bold">$4.00</span></li>
                <li class="flex flex-wrap gap-4 text-md py-3 font-bold">Total <span class="ml-auto">$52.00</span></li>
              </ul>
              <button type="button" class="mt-6 text-md px-6 py-2.5 w-full bg-blue-600 hover:bg-blue-700 text-white rounded">Check
                out</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- cart - end  --}}

</body>
</html>
