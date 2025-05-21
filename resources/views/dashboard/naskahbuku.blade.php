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
        // timer: 2500
    });
</script>
@endif

<section class="bg-gray-100 min-h-screen py-10 font-sans">
    <div class="max-w-7xl mx-auto flex gap-6">

        <!-- Sidebar -->
        @include('dashboard.sidebar')

        <!-- Main Content -->
        <main class="flex-1 bg-white rounded-xl p-8 shadow-md border">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Data Ajuan Naskah</h1>
                <a href="{{ url('naskah-buku-add') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-medium shadow">
                    + Ajukan Naskah
                </a>
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
                            <th class="px-6 py-3">Lampiran</th>
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
                                    @if ($naskah->file_naskah)
                                        <a href="{{ asset('storage/' . $naskah->file_naskah) }}"
                                           class="text-blue-600 hover:underline"
                                           target="_blank">
                                           Unduh
                                        </a>
                                    @else
                                        <span class="text-gray-400">Tidak ada</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex space-x-3">
                                    <button
                                        onclick="openModal(`{{ addslashes($naskah->judul) }}`, `{!! addslashes(strip_tags($naskah->sinopsis)) !!}`)"
                                        class="text-green-600 hover:underline text-sm">
                                        Preview
                                    </button>

                                    <form action="{{ route('naskah.destroy', $naskah->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-600 hover:underline text-sm delete-btn">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-6 text-center text-gray-500 italic">
                                    Anda belum mengajukan naskah.
                                </td>
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

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Naskah Akan Dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });
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
