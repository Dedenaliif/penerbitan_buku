<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Motekar Dasar - RCP Press</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 ">
  <section class="bg-[#4285F4] h-96 pb-10">
    <!-- Navbar Start -->
    <nav class="flex container mx-auto py-4 text-white items-center">
        <!-- Kiri - Menu -->
        <ul class="flex items-center space-x-6 text-base font-medium text-white">
          <li><a href="{{ url('/') }}" class="hover:underline">Beranda</a></li>
          <li><a href="{{ url('profil') }}" class="hover:underline">Tentang Kami</a></li>
          <li class="relative group">
            <button class="flex items-center gap-1 hover:underline transition duration-200">
              Layanan
              <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <ul class="absolute left-0 mt-2 w-56 bg-white text-black rounded-xl shadow-2xl transform scale-95 group-hover:scale-100 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-out z-10">
              <li><a href="{{ url('penerbitan_buku') }}" class="block px-5 py-3 hover:bg-gray-100 rounded-t-xl">Penerbitan Buku</a></li>
              <li><a href="{{ url('harga-paket') }}" class="block px-5 py-3 hover:bg-gray-100 rounded-b-xl">Harga Paket Penerbitan</a></li>
            </ul>
          </li>
          <li><a href="{{ url('contact') }}" class="hover:underline">Kontak</a></li>
        </ul>

        <!-- Tengah - Search -->
        <div class="flex-1 flex justify-start px-6">
          <input type="text" placeholder="Cari ..." class="w-full max-w-md px-4 py-2 rounded-md text-black bg-white border border-white focus:outline-none" />
        </div>

        <div class="relative">
            <!-- Button -->
            <button onclick="toggleDropdown()" class="flex items-center gap-2 bg-white text-black px-2 py-2 rounded-full hover:bg-gray-100" id="profile-button">
              <img src="{{ asset('assets/image/ikon/profilikon.svg') }}" alt="Avatar" class="w-8 h-8 rounded-full">
            </button>

            <!-- Dropdown -->
            <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white text-gray-800 rounded-xl shadow-xl z-20 transition-all duration-300 ease-out">
              <!-- Header -->
              <div class="flex items-center gap-3 px-5 py-4 border-b">
                <img src="{{ asset('assets/image/ikon/profilikon.svg') }}" alt="User" class="w-12 h-12 rounded-full">
                <div>
                  <p class="text-sm font-semibold">{{ $auth->nama_depan }}</p>
                  <p class="text-xs text-gray-500">{{ $auth->email }}</p>
                </div>
              </div>

              <!-- Menu Items -->
              <ul class="py-2 text-sm">
                <li>
                  <a href="{{ url('dashboard') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/dashboardikon.svg') }}" alt="dashboard">
                    Dashboard
                  </a>
                </li>
                <li>
                  <a href="{{ url('naskah-buku') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/ikonnaskah.svg') }}" alt="naskah">
                    Naskah Buku
                  </a>
                </li>
                <li>
                  <a href="{{ url('daftar-alamat') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/lokasidashboard.svg') }}" alt="alamat">
                    Daftar Alamat
                  </a>
                </li>
                <li>
                  <a href="{{ url('ubah-password') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100">
                    <img src="{{ asset('assets/image/ikon/ubahsandi.svg') }}" alt="sandi">
                    Ubah Password
                  </a>
                </li>
              </ul>

              <!-- Logout -->
              <div class="border-t">
                <a href="{{ url('logout') }}" class="flex items-center gap-2 px-5 py-3 text-red-600 hover:bg-gray-100">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                  </svg>
                  Keluar
                </a>
              </div>
            </div>
          </div>
        <script>
          function toggleDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('hidden');
          }

          // Close dropdown jika klik di luar
          window.addEventListener('click', function(e) {
            const button = document.getElementById('profile-button');
            const dropdown = document.getElementById('profile-dropdown');
            if (!button.contains(e.target) && !dropdown.contains(e.target)) {
              dropdown.classList.add('hidden');
            }
          });
        </script>
      </nav>

    <!-- Konten Paket -->
    <div class="container mx-auto w-[1116px] mt-8 px-4 lg:px-0">
      <div class="text-white text-center lg:text-left mb-8">
        <h2 class="text-4xl font-bold">Paket {{ $paket->nama_paket }}</h2>
        <p class="mt-2 text-lg">
          Buku diterbitkan dalam format digital (termasuk serah simpan <br> e-deposit Perpusnas) dengan ukuran B5
        </p>
      </div>
    </div>
  </section>

  <div class="container mx-auto px-4 w-[1116px] lg:px-0">
      <div class="flex justify-between items-center -mt-32 gap-6">
          <!-- Deskripsi Paket -->
          <div class="bg-white p-6 rounded-lg shadow-md w-full">
            <h3 class="text-lg font-semibold mb-4">Paket Sudah Termasuk</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1 mb-4">
              <li>Review Naskah</li>
              <li>Desain Cover</li>
              <li>Layout Naskah</li>
              <li>Editing</li>
              <li>Proofread</li>
              <li>Dummy Buku</li>
              <li>E-ISBN</li>
              <li>Pemasaran Buku</li>
              <li>Royalti</li>
            </ul>
            <p class="text-sm text-gray-600">Silahkan pilih sivitas/nonsivitas dan maksimal halaman sesuai dengan kebutuhan Anda.</p>
          </div>

          @auth
              <form action="{{ route('harga-paket.pilih') }}" method="post">
                @csrf

                <input type="hidden" name="nama_paket" value="{{ $paket->nama_paket }}">

                <!-- Form Pilihan -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center w-[365px]">
                    <img src="{{ asset('assets/image/ikon/bukumotekar.svg') }}" alt="Buku Icon" class="w-3xs h-3xs mb-4">
                    <div class="w-full space-y-4">
                      <div>
                        <label for="sivitas" class="block text-sm font-medium text-gray-700 mb-1">Sivitas / Nonsivitas</label>
                        <select id="sivitas" name="instansi" class="w-full border border-gray-300 rounded px-3 py-2">
                          <option value="">Pilih Opsi</option>
                          <option value="Sivitas">Sivitas</option>
                          <option value="Nonsivitas">Nonsivitas</option>
                        </select>
                      </div>
                      <div class="pb-6">
                        <label for="halaman" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Halaman</label>
                        <select id="halaman" name="jumlah_halaman" class="w-full border border-gray-300 rounded px-3 py-2">
                          <option value="">Pilih Opsi</option>
                          <option value="100">100 Halaman</option>
                          <option value="200">200 Halaman</option>
                          <option value="300">300 Halaman</option>
                        </select>
                      </div>
                      <div id="harga-container" class="hidden">
                        <p class="text-lg font-semibold">Total Harga: Rp <span id="total-harga"></span></p>
                      </div>
                      <button id="btn-pilih" class="w-full bg-[#728DF4] text-white py-2 rounded hover:bg-[#5a75e8]">Pilih Paket</button>
                    </div>
                  </div>
              </form>
          @endauth


        </div>
  </div>


  <div class="mt-36">
      <div class="mx-auto mt-6">
        <hr>
    </div>

    <div>
        <h1 class="container mx-auto text-black h-15 pt-5 pl-10">© 2025 RCP. All Rights Reserved</h1>
    </div>
</div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sivitasSelect = document.getElementById('sivitas');
        const halamanSelect = document.getElementById('halaman');
        const hargaContainer = document.getElementById('harga-container');
        const totalHarga = document.getElementById('total-harga');

        function fetchHarga() {
        const instansi = sivitasSelect.value;
        const halaman = halamanSelect.value;
        const namaPaket = "{{ $paket->nama_paket }}"; // Dari variabel Blade

        if (instansi && halaman) {
            fetch(`/get-harga?instansi=${instansi}&nama_paket=${encodeURIComponent(namaPaket)}&jumlah_halaman=${halaman}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            totalHarga.textContent = data.total_harga.toLocaleString('id-ID');
                            hargaContainer.classList.remove('hidden');
                        } else {
                            totalHarga.textContent = '';
                            hargaContainer.classList.add('hidden');
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                totalHarga.textContent = '';
                hargaContainer.classList.add('hidden');
            }
        }


        sivitasSelect.addEventListener('change', fetchHarga);
        halamanSelect.addEventListener('change', fetchHarga);
    });
    </script>

</html>