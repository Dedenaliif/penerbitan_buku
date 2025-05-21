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

        {{-- Sidebar --}}
            @include('dashboard.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 bg-white rounded-xl p-8 shadow-md border">
            <h1 class="text-xl font-semibold text-gray-800 mb-4">My Account</h1>
            <hr class="mb-6">

            {{-- Intro --}}
            <div class="text-sm text-gray-700 leading-relaxed space-y-4">
                <p><strong>Halo Umum</strong></p>
                <p>Ini merupakan halaman Dashboard Anda. Berikut di bawah ini Anda bisa melihat syarat umum penulisan serta tahapan untuk melakukan submission naskah:</p>
            </div>

            <hr class="my-6">

            {{-- Syarat Umum --}}
            <section class="mb-10">
                <h2 class="text-md font-semibold text-gray-800 mb-3">Syarat Umum Pengiriman Naskah</h2>
                <ul class="list-disc list-inside text-sm text-gray-700 space-y-2">
                    <li>Naskah merupakan karya pengusul/tim; bukan revisi buku yang sudah terbit, bukan terjemahan, saduran, atau laporan penelitian yang diterbitkan ulang.</li>
                    <li>Naskah wajib mengikuti template dari laman CRP Press.</li>
                    <li>Jumlah halaman minimal 50.</li>
                    <li>Similarity maksimal 25%.</li>
                    <li>Naskah akan dievaluasi oleh tim CRP Press berdasarkan persyaratan dan kriteria kelayakan.</li>
                </ul>
            </section>

            {{-- Tahapan --}}
            <section class="space-y-6">
                <h2 class="text-lg font-bold text-gray-800">Tahapan Pengajuan Naskah</h2>

                @php
                    $tahapan = [
                        'Pendaftaran Akun' => [
                           'Penulis membuat akun di laman <a href="register" class="text-blue-500 underline">press.CRP.ac.id/register</a>',
                            'Aktivasi akun melalui email',
                            'Login ke laman press.unpad.ac.id',
                        ],
                        'Unggah Naskah' => [
                            'Buka menu Naskah Buku, klik tombol Ajukan Naskah',
                            'Isi data judul, deskripsi, topik, penulis, dan file sesuai template',
                            'Penulis menerima notifikasi bahwa naskah diterima',
                        ],
                        'Reviu Naskah' => [
                            'Tim Unpad Press assign ke tim reviu',
                            'Tim reviu menilai: under review, accepted, atau rejected',
                            'Penulis menerima hasil reviu via surel',
                        ],
                        'Paket Penerbitan dan Meeting' => [
                            'Jika accepted, penulis memilih paket penerbitan',
                            'Pembayaran dilakukan setelah memilih paket',
                            'Informasi meeting akan dikirimkan (luring/daring)',
                        ],
                        'Proses Penerbitan' => [
                            'Proses produksi dan cetak dimulai setelah meeting',
                        ],
                        'Proses Akhir' => [
                            'Penutup dari keseluruhan proses penerbitan',
                        ]
                    ];
                @endphp

                @foreach($tahapan as $judul => $list)
                <div>
                    <p class="font-medium text-blue-600">{{ $judul }}</p>
                    <ul class="list-disc list-inside mt-1 text-sm space-y-1">
                        @foreach($list as $item)
                            <li>{!! $item !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach

            </section>

            {{-- Footer Note --}}
            <p class="text-sm mt-10 text-gray-600">
                Jika Anda memiliki pertanyaan, hubungi kami via email:
                <a href="mailto:press.CRP@gmail.com" class="text-blue-500 underline">press.CRP@gmail.com</a>
            </p>
        </main>
    </div>
</section>

{{-- Footer --}}
<footer class="mt-10 border-t py-4 bg-white">
    <div class="container mx-auto text-center text-sm text-gray-600">
        © 2025 CRP. All Rights Reserved
    </div>
</footer>

@endsection
