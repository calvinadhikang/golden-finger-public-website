@extends('templates.light-nav')

@section('content')
<div class="border-b pb-2 flex items-center justify-between">
    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Profil</h1>
    <a href="/logout" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
        Logout
    </a>
</div>
<form method="POST" class="space-y-6 pt-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="">
            <div class="flex items-center justify-between">
                <label for="input-label" class="block text-sm font-medium mb-2">Email</label>
                <label for="input-label" class="block text-sm text-gray-400 mb-2">*Tidak dapat diubah</label>
            </div>
            <input type="email" readonly required disabled name="email" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" value="{{ $user->email }}">
        </div>
        <div class="">
            <label for="input-label" class="block text-sm font-medium mb-2">Nama</label>
            <input type="text" required name="nama" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" value="{{ $user->nama }}">
        </div>
        <div class="">
            <label for="input-label" class="block text-sm font-medium mb-2">Alamat</label>
            <input type="text" required name="alamat" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" value="{{ $user->alamat }}">
        </div>
        <div class="">
            <label for="input-label" class="block text-sm font-medium mb-2">Nomor Telepon</label>
            <input type="text" required name="telp" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" value="{{ $user->telp }}">
        </div>
    </div>
    <button class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Perbarui Profil</button>
</form>
<div class="mt-10">
    <h1 class="text-2xl font-bold tracking-tight text-gray-900 border-b pb-2">Opsional - NPWP</h1>
</div>
<form method="POST" action="{{ url('profile/npwp') }}" class="space-y-6 pt-6">
    @csrf
    <div class="">
        <div class="flex items-center justify-between">
            <label for="input-label" class="block text-sm font-medium mb-2">Nomor NPWP</label>
            <label for="input-label" class="block text-sm text-gray-500 mb-2">Khusus untuk customer yang butuh faktur pajak, Isi dengan - bila tidak ada</label>
        </div>
        <input type="text" name="npwp" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" value="{{ $user->NPWP }}">
    </div>
    <button class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Perbarui NPWP</button>
</form>

<div class="mt-10">
    <h1 class="text-2xl font-bold tracking-tight text-gray-900 border-b pb-2">Opsional - Ganti Password</h1>
</div>
<form method="POST" action="{{ url('profile/password') }}" class="space-y-6 pt-6">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="">
            <label for="input-label" class="block text-sm font-medium mb-2">Password Lama</label>
            <input type="password" name="old" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        </div>
        <div class="">
            <label for="input-label" class="block text-sm font-medium mb-2">Password Baru</label>
            <input type="password" name="new" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        </div>
    </div>
    <button class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">Perbarui Passowrd</button>
</form>
@endsection
