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
                <h1 class="text-2xl font-semibold text-gray-800">Review Naskah</h1>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-700 uppercase tracking-wider text-xs">
                            <th class="px-6 py-3">NO</th>
                            <th class="px-6 py-3">Judul</th>
                            <th class="px-6 py-3">Penulis</th>
                            <th class="px-6 py-3">Reviewer</th>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Preview</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse ($naskahs as $naskah)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-medium">
                                    {{ $naskah->judul }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($naskah->penulis as $penulis)
                                        <div>{{ $penulis->nama }}</div>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    @forelse ($naskah->reviewers as $reviewer)
                                        <div>{{ $reviewer->nama }}</div>
                                    @empty
                                        <div class="text-gray-400 italic">-</div>
                                    @endforelse
                                </td>
                                <td class="px-6 py-4">{{ $naskah->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                <button
                                    onclick="openModal(`{{ addslashes($naskah->judul) }}`, `{!! addslashes(strip_tags($naskah->sinopsis)) !!}`)"
                                    class="text-green-600 hover:underline text-sm">
                                    Preview
                                </button>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($naskah->status === 'disetujui')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @elseif ($naskah->status === 'ditolak')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                            dalam peninjauan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex space-x-3">
                                @if (!in_array($naskah->status, ['disetujui', 'ditolak']))
                                    <a href="{{ url('review-naskah-setujui/'.$naskah->id) }}" title="Setujui" class="text-green-600 hover:text-green-800">
                                        <!-- Icon centang -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </a>
                                    <a href="{{ url('review-naskah-tolak/'.$naskah->id) }}" title="Tolak" class="text-red-600 hover:text-red-800">
                                        <!-- Icon silang -->
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

<!-- Modal Preview -->
<div id="previewModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 transition-opacity duration-300 ease-in-out">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-6 transform scale-95 transition-transform duration-300 ease-out">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold" id="modalTitle">Preview Naskah</h2>
            <button onclick="closeModal()" class="text-gray-500 hover:text-red-600 text-xl">&times;</button>
        </div>
        <div class="border-t pt-4 text-sm text-gray-700 whitespace-pre-wrap" id="modalContent">
            <!-- sinopsis akan dimasukkan via JS -->
        </div>
    </div>
</div>

<!-- Modal JS -->
<script>
    function openModal(title, sinopsis) {
        const modal = document.getElementById('previewModal');
        document.getElementById('modalTitle').innerText = 'Judul: ' + title;
        document.getElementById('modalContent').innerText = 'Sinopsis: ' + sinopsis;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.firstElementChild.classList.add('scale-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('previewModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        modal.firstElementChild.classList.remove('scale-100');
    }
</script>

<!-- Fade-in Animation -->
<style>
    #previewModal > div {
        transform: scale(0.95);
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    #previewModal.flex > div {
        transform: scale(1);
    }
</style>

<footer class="text-center py-4 text-gray-600 text-sm">
    © 2025 RCP. All Rights Reserved
</footer>
@endsection
