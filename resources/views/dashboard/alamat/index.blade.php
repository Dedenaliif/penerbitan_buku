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
        <!-- Title -->
        <h1 class="text-xl font-semibold text-gray-800 mb-2">Addresses</h1>
        <p class="text-sm text-gray-600 mb-6">Alamat di bawah ini merupakan alamat untuk pengiriman buku kepada penulis.</p>

        <!-- Alamat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
       <!-- Alamat Penagihan -->
        <div class="border rounded-lg p-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="font-medium text-gray-800">Alamat penagihan</h2>
                @if($alamatPenagihan)
                    <a href="{{ url('alamat-penagihan/edit') }}" class="text-sm bg-blue-200 px-3 py-1 rounded hover:bg-blue-300">Edit</a>
                @else
                    <a href="{{ url('alamat-penagihan') }}" class="text-sm bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">Add</a>
                @endif
            </div>

            @if($alamatPenagihan)
                <div class="text-sm text-gray-700 space-y-1">
                    <p><strong>{{ $alamatPenagihan->nama_depan }} {{ $alamatPenagihan->nama_belakang }}</strong></p>
                    @if($alamatPenagihan->perusahaan)
                        <p>{{ $alamatPenagihan->perusahaan }}</p>
                    @endif
                    <p>{{ $alamatPenagihan->alamat1 }}</p>
                    @if($alamatPenagihan->alamat2)
                        <p>{{ $alamatPenagihan->alamat2 }}</p>
                    @endif
                    <p>{{ $alamatPenagihan->kota }}, {{ $alamatPenagihan->provinsi }} {{ $alamatPenagihan->kode_pos }}</p>
                    <p>{{ $alamatPenagihan->no_hp }}</p>
                    <p>{{ $alamatPenagihan->email }}</p>
                </div>
            @else
                <p class="text-sm text-gray-600">You have not set up this type of address yet.</p>
            @endif
        </div>

        <!-- Alamat Pengiriman -->
        <div class="border rounded-lg p-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="font-medium text-gray-800">Alamat Pengiriman</h2>
                @if($alamatPengiriman)
                    <a href="{{ url('alamat-pengiriman/edit') }}" class="text-sm bg-blue-200 px-3 py-1 rounded hover:bg-blue-300">Edit</a>
                @else
                    <a href="{{ url('alamat-pengiriman') }}" class="text-sm bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">Add</a>
                @endif
            </div>

            @if($alamatPengiriman)
                <div class="text-sm text-gray-700 space-y-1">
                    <p><strong>{{ $alamatPengiriman->nama_depan }} {{ $alamatPengiriman->nama_belakang }}</strong></p>
                    @if($alamatPengiriman->perusahaan)
                        <p>{{ $alamatPengiriman->perusahaan }}</p>
                    @endif
                    <p>{{ $alamatPengiriman->alamat1 }}</p>
                    @if($alamatPengiriman->alamat2)
                        <p>{{ $alamatPengiriman->alamat2 }}</p>
                    @endif
                    <p>{{ $alamatPengiriman->kota }}, {{ $alamatPengiriman->provinsi }} {{ $alamatPengiriman->kode_pos }}</p>
                </div>
            @else
                <p class="text-sm text-gray-600">You have not set up this type of address yet.</p>
            @endif
        </div>

        </div>
        </main>
    </div>
</section>

<div class="mx-auto mt-6">
    <hr>
</div>

<div>
    <h1 class="container mx-auto text-black h-15 pt-5 pl-10">© 2025 RCP. All Rights Reserved</h1>
</div>
@endsection