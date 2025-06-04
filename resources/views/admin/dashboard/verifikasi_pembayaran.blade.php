@extends('layout.index')

@section('content')
@include('dashboard.head')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        showConfirmButton: true,
    });
</script>
@endif

<section class="bg-gray-100 min-h-screen py-10 font-sans">
    <div class="max-w-7xl mx-auto flex gap-6">

        <!-- Sidebar -->
        @include('admin.dashboard.sidebar')

        <!-- Main Content -->
        <main class="flex-1 bg-white rounded-xl p-8 shadow-md border">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Verifikasi Pembayaran</h1>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-700 uppercase tracking-wider text-xs">
                            <th class="px-6 py-3">NO</th>
                            <th class="px-6 py-3">Nama Penulis</th>
                            <th class="px-6 py-3">Nama Paket</th>
                            <th class="px-6 py-3">Instansi</th>
                            <th class="px-6 py-3">Jumlah halaman</th>
                            <th class="px-6 py-3">Total Harga</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse ($cart as $ct)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-medium">
                                    {{ $ct->user->nama_depan }}
                                </td>
                                <td class="px-6 py-4">
                                    <div>{{ $ct->nama_paket }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>{{ $ct->instansi }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>{{ $ct->jumlah_halaman }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>Rp. {{ number_format($ct->total_harga, 0) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($ct->status === 'disetujui')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @elseif ($ct->status === 'ditolak')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                            Dalam Peninjauan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex space-x-3">
                                    @if (!in_array($ct->status, ['disetujui', 'ditolak']))
                                        <a href="{{ url('verifikasi-pembayaran-setujui/'.$ct->id) }}" title="Setujui" class="text-green-600 hover:text-green-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </a>
                                        <a href="{{ url('verifikasi-pembayaran-tolak/'.$ct->id) }}" title="Tolak" class="text-red-600 hover:text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-6 text-gray-400 italic">Tidak ada naskah yang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="mt-10 border-t pt-6 text-sm text-gray-600">
                <p class="italic text-gray-400">Data transaksi penerbitan buku tidak tersedia.</p>
            </div>
        </main>
    </div>
</section>

<footer class="text-center py-4 text-gray-600 text-sm">
    © 2025 RCP. All Rights Reserved
</footer>
@endsection
