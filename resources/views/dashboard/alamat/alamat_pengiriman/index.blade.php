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
<div class="container mx-auto py-6">
    <div class="flex">
        @include('dashboard.sidebar')

        <main class="w-3/4 bg-white p-6 border rounded shadow-md">
            <h2 class="text-2xl font-bold mb-6">Alamat Pengiriman</h2>

            <div class="w-full">
                <form action="{{ isset($alamat) ? route('alamat-pengiriman.update') : route('alamat-pengiriman.store') }}" method="POST" class="w-full max-w-full mx-auto px-4 py-8 bg-white shadow-lg rounded-2xl border border-gray-100">
                    @csrf

                    {{-- Nama Depan & Belakang --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Depan</label>
                            <input type="text" name="nama_depan" value="{{ old('nama_depan', $alamat->nama_depan ?? '') }}" class="w-full px-4 py-3 rounded-xl border @error('nama_depan') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                            @error('nama_depan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Belakang</label>
                            <input type="text" name="nama_belakang" value="{{ old('nama_belakang', $alamat->nama_belakang ?? '') }}" class="w-full px-4 py-3 rounded-xl border @error('nama_belakang') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                            @error('nama_belakang') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Perusahaan --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan <span class="text-gray-400 text-sm">(opsional)</span></label>
                        <input type="text" name="perusahaan" value="{{ old('perusahaan', $alamat->perusahaan ?? '') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                    </div>

                    {{-- Negara --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Negara/Wilayah</label>
                        <input type="text" value="Indonesia" readonly class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-100 text-gray-600 shadow-inner cursor-not-allowed">
                    </div>

                    {{-- Alamat Jalan --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Jalan</label>
                        <input type="text" name="alamat1" placeholder="Contoh: Jl. Merdeka No. 10" value="{{ old('alamat1', $alamat->alamat1 ?? '') }}" class="w-full mb-2 px-4 py-3 rounded-xl border @error('alamat1') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                        @error('alamat1') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

                        <input type="text" name="alamat2" placeholder="Detail Tambahan (Optional)" value="{{ old('alamat2', $alamat->alamat2 ?? '') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                    </div>

                    {{-- Kota, Provinsi, Kode Pos --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                            <input type="text" name="kota" value="{{ old('kota', $alamat->kota ?? '') }}" class="w-full px-4 py-3 rounded-xl border @error('kota') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                            @error('kota') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
                            <select name="provinsi" class="w-full px-4 py-3 rounded-xl border @error('provinsi') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                                <option value="">Pilih Provinsi</option>
                                @foreach([
                                    'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 'Jambi', 'Bengkulu', 'Sumatera Selatan', 'Bangka Belitung',
                                    'Lampung', 'Banten', 'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah', 'DI Yogyakarta', 'Jawa Timur',
                                    'Bali', 'NTB', 'NTT', 'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur', 'Kalimantan Utara',
                                    'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Gorontalo', 'Sulawesi Barat',
                                    'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat', 'Papua Pegunungan', 'Papua Tengah', 'Papua Selatan', 'Papua Barat Daya'
                                ] as $prov)
                                    <option value="{{ $prov }}" {{ old('provinsi', $alamat->provinsi ?? '') == $prov ? 'selected' : '' }}>{{ $prov }}</option>
                                @endforeach
                            </select>
                            @error('provinsi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kode Pos</label>
                            <input type="text" name="kode_pos" value="{{ old('kode_pos', $alamat->kode_pos ?? '') }}" class="w-full px-4 py-3 rounded-xl border @error('kode_pos') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-purple-500 focus:outline-none shadow-sm">
                            @error('kode_pos') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-all shadow-md">
                            {{ isset($alamat) ? 'Perbarui' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
