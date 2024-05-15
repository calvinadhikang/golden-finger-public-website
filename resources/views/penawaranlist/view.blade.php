@extends('templates.light-nav')

@section('content')
<h1 class="text-4xl font-bold tracking-tight text-gray-900">Penawaran</h1>
<div class="flex flex-col mt-10">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Kode</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total Biaya</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status Pesanan</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tangal</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if (count($data) == 0)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800" colspan="5">Tidak ada data</td>
                        </tr>
                        @endif

                        @foreach ($data as $item)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $item->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Rp {{ number_format($item->grand_total) }}</td>
                            <td class="px-6 py-4">
                                <div class="">{{ $item->status_text }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ date_format(new DateTime($item->created_at), 'd M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <a href="{{ url("/penawaran/detail/$item->id") }}">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-500 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Detail</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
