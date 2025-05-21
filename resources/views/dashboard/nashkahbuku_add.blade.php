@extends('layout.index')

@section('content')
@include('dashboard.head')
<div class="container mx-auto py-6">
    <div class="flex">
        {{-- Sidebar --}}
        @include('dashboard.sidebar')


        {{-- Form --}}
        <main class="w-3/4 bg-white p-6 border rounded shadow-md">
            <h2 class="text-2xl font-bold mb-6">Naskah Baru</h2>

            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <strong>Periksa kembali input Anda:</strong>
                <ul class="list-disc pl-6 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('naskah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- <input type="hidden" name="user_id" value="{{ Auth }}"> --}}
            <!-- Judul dan Topik -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="judul" class="block text-sm font-semibold text-gray-700 mb-1">Judul Buku</label>
                    <input type="text" id="judul" name="judul"
                        class="w-full border rounded px-4 py-2 @error('judul') border-red-500 @enderror"
                        value="{{ old('judul') }}" placeholder="Contoh: Strategi Inovasi di Era Digital">
                    @error('judul')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="topik_id" class="block text-sm font-semibold text-gray-700 mb-1">Topik Buku</label>
                    <select id="topik_id" name="topik_id"
                        class="w-full border rounded px-4 py-2 @error('topik_id') border-red-500 @enderror">
                        <option value="">Pilih topik</option>
                        @foreach([
                            'Sosial Humaniora', 'Hukum', 'Kesehatan', 'Teknik', 'Ekonomi', 'Pendidikan',
                            'Pertanian', 'Kedokteran', 'Farmasi', 'Psikologi', 'Komputer', 'Statistika',
                            'Manajemen', 'Komunikasi', 'Politik', 'Ilmu Alam', 'Kebudayaan', 'Bahasa',
                            'Geografi', 'Agama'
                        ] as $topik)
                            <option value="{{ $topik }}" {{ old('topik_id') == $topik ? 'selected' : '' }}>{{ $topik }}</option>
                        @endforeach
                    </select>
                    @error('topik_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Sinopsis -->
            <div class="mt-6">
                <label for="sinopsis" class="font-medium mb-1 block">Sinopsis dan Biografi Penulis Pertama/Utama</label>
                <textarea id="sinopsis" name="sinopsis"
                    class="w-full border rounded p-2 h-40 @error('sinopsis') border-red-500 @enderror">{{ old('sinopsis') }}</textarea>
                @error('sinopsis')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Upload File -->
            <div class="mt-6 mb-4">
                <h3 class="font-semibold mb-2">Lampiran File Naskah</h3>
                <p class="text-sm text-gray-500 mb-1">
                    Format file: <strong>doc, docx</strong>. Ukuran maksimal <strong>48MB</strong>.
                </p>

                <label for="file_naskah"
                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 @error('file_naskah') border-red-500 @enderror">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16V4m0 0l-4 4m4-4l4 4M17 8v8m0 0l4-4m-4 4l-4-4"></path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 text-center">
                            <span class="font-semibold">Klik untuk upload</span> atau seret file Anda
                        </p>
                        <p class="text-xs text-gray-500">Format: .doc, .docx (maks 48MB)</p>
                    </div>
                    <input id="file_naskah" type="file" name="file_naskah" accept=".doc,.docx" class="hidden" onchange="updateFileName()" />
                </label>

                {{-- Tempat tampilkan nama file --}}
                <div id="uploaded-file-name" class="mt-2 text-sm text-gray-700 font-medium hidden"></div>

                @error('file_naskah')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Link Cover -->
            <div class="mt-6 mb-6 bg-gray-50 border rounded-lg p-4">
                <h3 class="font-semibold text-lg mb-2">Lampiran Usulan Cover Buku</h3>
                <p class="text-sm text-gray-500 mb-3">Silakan lampirkan link Google Drive atau Dropbox berisi usulan desain cover buku.</p>
                <input type="url" name="link_cover"
                    class="w-full border p-2 rounded @error('link_cover') border-red-500 @enderror"
                    value="{{ old('link_cover') }}" placeholder="https://drive.google.com/...">
                @error('link_cover')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Penulis -->
            <div class="bg-gray-50 border rounded-lg p-4 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg">Informasi Penulis</h3>
                    <div class="space-x-2">
                        <button type="button" onclick="tambahPenulis()" class="text-green-600 hover:text-green-800" title="Tambah Penulis">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                            </svg>
                        </button>
                        <button type="button" onclick="kurangiPenulis()" class="text-red-600 hover:text-red-800" title="Kurangi Penulis">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div id="penulis-container">
                    @php $oldPenulis = old('penulis', [['nama' => '', 'email' => '', 'afiliasi' => '']]); @endphp
                    @foreach ($oldPenulis as $i => $penulis)
                        <div class="space-y-2 border p-3 rounded bg-white mb-3">
                            <input type="text" name="penulis[{{ $i }}][nama]"
                                value="{{ $penulis['nama'] ?? '' }}"
                                class="w-full border p-2 rounded @error("penulis.$i.nama") border-red-500 @enderror"
                                placeholder="Nama Penulis">
                            @error("penulis.$i.nama")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <input type="email" name="penulis[{{ $i }}][email]"
                                value="{{ $penulis['email'] ?? '' }}"
                                class="w-full border p-2 rounded @error("penulis.$i.email") border-red-500 @enderror"
                                placeholder="Email">
                            @error("penulis.$i.email")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <input type="text" name="penulis[{{ $i }}][afiliasi]"
                                value="{{ $penulis['afiliasi'] ?? '' }}"
                                class="w-full border p-2 rounded @error("penulis.$i.afiliasi") border-red-500 @enderror"
                                placeholder="Afiliasi">
                            @error("penulis.$i.afiliasi")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Reviewer -->
            <div class="bg-gray-50 border rounded-lg p-4 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg">Ajukan Reviewer <span class="text-sm text-gray-500">(optional)</span></h3>
                    <div class="space-x-2">
                        <button type="button" onclick="tambahReviewer()" class="text-green-600 hover:text-green-800" title="Tambah Reviewer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                            </svg>
                        </button>
                        <button type="button" onclick="kurangiReviewer()" class="text-red-600 hover:text-red-800" title="Kurangi Reviewer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="reviewer-container">
                    @php $oldReviewer = old('reviewer', [['nama' => '', 'email' => '', 'afiliasi' => '']]); @endphp
                    @foreach ($oldReviewer as $i => $reviewer)
                        <div class="space-y-2 border p-3 rounded bg-white mb-3">
                            <input type="text" name="reviewer[{{ $i }}][nama]"
                                value="{{ $reviewer['nama'] ?? '' }}"
                                class="w-full border p-2 rounded @error("reviewer.$i.nama") border-red-500 @enderror"
                                placeholder="Nama Reviewer">
                            @error("reviewer.$i.nama")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <input type="text" name="reviewer[{{ $i }}][email]"
                                value="{{ $reviewer['email'] ?? '' }}"
                                class="w-full border p-2 rounded @error("reviewer.$i.email") border-red-500 @enderror"
                                placeholder="Email / HP">
                            @error("reviewer.$i.email")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <input type="text" name="reviewer[{{ $i }}][afiliasi]"
                                value="{{ $reviewer['afiliasi'] ?? '' }}"
                                class="w-full border p-2 rounded @error("reviewer.$i.afiliasi") border-red-500 @enderror"
                                placeholder="Afiliasi">
                            @error("reviewer.$i.afiliasi")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded">Submit</button>
        </form>

        </main>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#sinopsis',
        height: 400,
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks code fullscreen insertdatetime table',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image | fullscreen code preview',
        menubar: false,
        branding: false,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    let penulisIndex = 1;
    function tambahPenulis() {
        const container = document.getElementById('penulis-container');
        const card = document.createElement('div');
        card.className = "space-y-2 border p-3 rounded bg-white mb-3";
        card.innerHTML = `
            <input type="text" name="penulis[${penulisIndex}][nama]" placeholder="Nama Penulis" class="w-full border p-2 rounded">
            <input type="email" name="penulis[${penulisIndex}][email]" placeholder="Email" class="w-full border p-2 rounded">
            <input type="text" name="penulis[${penulisIndex}][afiliasi]" placeholder="Afiliasi" class="w-full border p-2 rounded">
        `;
        container.appendChild(card);
        penulisIndex++;
    }

    function kurangiPenulis() {
        const container = document.getElementById('penulis-container');
        if (container.children.length > 1) container.lastElementChild.remove();
    }

    let reviewerIndex = 1;
    function tambahReviewer() {
        const container = document.getElementById('reviewer-container');
        const card = document.createElement('div');
        card.className = "space-y-2 border p-3 rounded bg-white mb-3";
        card.innerHTML = `
            <input type="text" name="reviewer[${reviewerIndex}][nama]" placeholder="Nama Reviewer" class="w-full border p-2 rounded">
            <input type="text" name="reviewer[${reviewerIndex}][email]" placeholder="Email / HP" class="w-full border p-2 rounded">
            <input type="text" name="reviewer[${reviewerIndex}][afiliasi]" placeholder="Afiliasi" class="w-full border p-2 rounded">
        `;
        container.appendChild(card);
        reviewerIndex++;
    }

    function kurangiReviewer() {
        const container = document.getElementById('reviewer-container');
        if (container.children.length > 1) container.lastElementChild.remove();
    }
</script>

<script>
    function updateFileName() {
        const input = document.getElementById('file_naskah');
        const fileNameDiv = document.getElementById('uploaded-file-name');

        if (input.files.length > 0) {
            const file = input.files[0];
            fileNameDiv.textContent = "📄 " + file.name;
            fileNameDiv.classList.remove('hidden');
        } else {
            fileNameDiv.textContent = "";
            fileNameDiv.classList.add('hidden');
        }
    }
</script>
@endpush
