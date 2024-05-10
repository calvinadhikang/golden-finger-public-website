<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>

<body>
    <div class="w-screen h-screen flex flex-col">
        {{-- header - start  --}}
        <header
            class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 sm:py-0">
            <nav class="relative max-w-7xl w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
                aria-label="Global">
                <div class="flex items-center justify-between">
                    <a class="flex-none text-xl font-semibold" href="/" aria-label="Brand">Goldfinger Wheels
                        Indonesia</a>
                    <div class="sm:hidden">
                        <button type="button"
                            class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-collapse="#navbar-collapse-with-animation"
                            aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                            <svg class="hs-collapse-open:hidden size-4" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            <svg class="hs-collapse-open:block flex-shrink-0 hidden size-4" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="navbar-collapse-with-animation"
                    class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                    <div
                        class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                        <a class="font-medium hover:text-slate-600 text-slate-500  sm:py-6" href="/"
                            aria-current="page">Home</a>

                        <a class="flex items-center gap-x-2 font-medium text-gray-500 hover:text-blue-600 sm:border-s sm:border-gray-300 sm:my-6 sm:ps-6"
                            href="#">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                            Log in
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        {{-- header - end --}}

        <!-- Hero -->
        <div class="relative overflow-hidden flex-1 flex items-center">
            <div class="mx-auto max-w-screen-md py-12 px-4 sm:px-6 md:max-w-screen-xl md:py-20 lg:py-32 md:px-8 flex-1">
                <div class="md:pe-8 md:w-1/2 xl:pe-0 xl:w-5/12">

                    <!-- Title -->
                    <h1
                        class="text-3xl text-gray-800 font-bold md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight dark:text-gray-200">
                        <span class="text-blue-600 dark:text-blue-500">Buat</span> akun anda
                    </h1>
                    <p class="mt-6 mb-6 text-base text-gray-500">
                        Bantu kami mengenal anda lebih dengan membuat akun. Isi formulir dibawah dan kembali berselancar
                        di website kami.
                    </p>
                    <!-- End Title -->

                    {{-- Alert --}}
                    @if ($errors->any())
                        <div class="bg-red-50 border-s-4 border-red-500 p-4 dark:bg-red-800/30 mb-5" role="alert">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Icon -->
                                    <span
                                        class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-400">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18"></path>
                                            <path d="m6 6 12 12"></path>
                                        </svg>
                                    </span>
                                    <!-- End Icon -->
                                </div>
                                <div class="ms-3">
                                    <h3 class="text-gray-800 font-semibold dark:text-white">
                                        Error!
                                    </h3>
                                    <p class="text-sm text-gray-700 dark:text-gray-400">
                                        {{ $errors->first() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- End of Alert --}}

                    <!-- Form -->
                    <form method="POST">
                        @csrf
                        <div class="mb-6">
                            <!-- Floating Input -->
                            <div class="relative">
                                <input type="text" name="name" required id="hs-floating-input-email" class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                                focus:pt-6
                                focus:pb-2
                                [&:not(:placeholder-shown)]:pt-6
                                [&:not(:placeholder-shown)]:pb-2
                                autofill:pt-6
                                autofill:pb-2" placeholder="you@email.com">
                                <label for="hs-floating-input-email" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                                peer-focus:text-xs
                                peer-focus:-translate-y-1.5
                                peer-focus:text-gray-500
                                peer-[:not(:placeholder-shown)]:text-xs
                                peer-[:not(:placeholder-shown)]:-translate-y-1.5
                                peer-[:not(:placeholder-shown)]:text-gray-500">Nama Lengkap</label>
                            </div>
                            <!-- End Floating Input -->
                        </div>
                        <div class="mb-6">
                            <!-- Floating Input -->
                            <div class="relative">
                                <input type="email" name="email" required id="hs-floating-input-email" class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                                focus:pt-6
                                focus:pb-2
                                [&:not(:placeholder-shown)]:pt-6
                                [&:not(:placeholder-shown)]:pb-2
                                autofill:pt-6
                                autofill:pb-2" placeholder="you@email.com">
                                <label for="hs-floating-input-email" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                                peer-focus:text-xs
                                peer-focus:-translate-y-1.5
                                peer-focus:text-gray-500
                                peer-[:not(:placeholder-shown)]:text-xs
                                peer-[:not(:placeholder-shown)]:-translate-y-1.5
                                peer-[:not(:placeholder-shown)]:text-gray-500">Alamat Email</label>
                            </div>
                            <!-- End Floating Input -->
                        </div>
                        <div class="mb-6">
                            <!-- Floating Input -->
                            <div class="relative">
                                <input type="password" name="password" required id="hs-floating-input-email" class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                                focus:pt-6
                                focus:pb-2
                                [&:not(:placeholder-shown)]:pt-6
                                [&:not(:placeholder-shown)]:pb-2
                                autofill:pt-6
                                autofill:pb-2" placeholder="you@email.com">
                                <label for="hs-floating-input-email" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                                peer-focus:text-xs
                                peer-focus:-translate-y-1.5
                                peer-focus:text-gray-500
                                peer-[:not(:placeholder-shown)]:text-xs
                                peer-[:not(:placeholder-shown)]:-translate-y-1.5
                                peer-[:not(:placeholder-shown)]:text-gray-500">Password</label>
                            </div>
                            <!-- End Floating Input -->
                        </div>
                        <div class="mb-6">
                            <!-- Floating Input -->
                            <div class="relative">
                                <input type="password" name="confirm" required id="hs-floating-input-email" class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600
                                focus:pt-6
                                focus:pb-2
                                [&:not(:placeholder-shown)]:pt-6
                                [&:not(:placeholder-shown)]:pb-2
                                autofill:pt-6
                                autofill:pb-2" placeholder="you@email.com">
                                <label for="hs-floating-input-email" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
                                peer-focus:text-xs
                                peer-focus:-translate-y-1.5
                                peer-focus:text-gray-500
                                peer-[:not(:placeholder-shown)]:text-xs
                                peer-[:not(:placeholder-shown)]:-translate-y-1.5
                                peer-[:not(:placeholder-shown)]:text-gray-500">Konfirmasi Password</label>
                            </div>
                            <!-- End Floating Input -->
                        </div>

                        <div class="grid">
                            <button type="submit"
                                class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Buat
                                Akun</button>
                        </div>
                    </form>
                    <!-- End Form -->

                    <div class="grid">
                        <p class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent  text-black">
                            Sudah Punya Akun?
                            <a class="text-blue-600 hover:text-gray-300" href="/login">Login sekarang!</a>
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="hidden md:block md:absolute md:top-0 md:start-1/2 md:end-0 h-full bg-[url('https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1981&q=80')] bg-no-repeat bg-center bg-cover">
            </div>
            <!-- End Col -->
        </div>
        <!-- End Hero -->
    </div>




    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>
