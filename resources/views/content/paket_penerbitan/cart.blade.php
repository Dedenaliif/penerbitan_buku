
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - RCP Press</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
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

    <section class="bg-[#4285F4] h-48 pb-10">
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
        <div class="container mx-auto mt-10 px-4  lg:px-0">
          <div class="text-white text-center lg:text-left mb-8">
            <h2 class="text-4xl font-bold pl-20">Cart</h2>
          </div>
        </div>
      </section>

      <section class="container mx-auto px-4 lg:px-0 mt-10 grid grid-cols-1 lg:grid-cols-[1fr_360px] gap-16 ">
        <!-- Cart Table -->
        <div class="bg-white p-6 rounded-xl shadow-md  ">
          <h3 class="text-2xl font-bold mb-4">Cart Summary</h3>
          <table class="w-full text-left border-separate border-spacing-y-4">
            <thead>
              <tr class="bg-gray-100">
                <th class="p-3">PRODUCT</th>
                <th class="p-3">PRICE</th>
                <th class="p-3">QUANTITY</th>
                <th class="p-3"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                <tr class="border-b">
                    <td class="p-3 flex items-center gap-4">
                        <img src="{{ asset('assets/image/ikon/bukumotekar.svg') }}" class="w-14 h-14">
                        <div>
                            <p class="font-medium">{{ $item['nama_paket'] }}</p>
                            <p class="text-sm text-gray-600">Instansi: {{ $item['instansi'] }}</p>
                            <p class="text-sm text-gray-600">Halaman: {{ $item['jumlah_halaman'] }}</p>
                        </div>
                    </td>
                    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td class="p-3">1</td>
                    <td class="p-3 cursor-pointer">
                        <form method="post" action="{{ route('cart.remove', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-btn"><img src="{{ asset('assets/image/ikon/sampahikon.svg') }}" class="w-5 h-5"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <div>
            <hr>
          </div>
        </div>

        <!-- Cart Totals -->
        <div class="bg-white p-6 rounded-xl shadow-md h-fit">
            <h3 class="text-xl font-bold mb-4">Cart totals</h3>

            {{-- Shipping --}}
            <div class="border-b pb-4 mb-4">
                <p class="text-gray-700 font-bold">Shipping</p>
                <p class="text-sm text-gray-600 mt-1">Gratis ambil di CRP Press</p>
                <p class="text-sm text-gray-600">Shipping to {{ $alamat->provinsi }}</p>
                <a href="#" class="text-sm text-[#4285F4] underline" id="toggle-address">Change address</a>

                {{-- Form alamat pengiriman --}}
                <div id="address-form" class="mt-4 hidden">
                    <form method="POST" action="{{ route('alamat-penagihan.update') }}" class="space-y-4">
                        @csrf

                        <input type="hidden" name="nama_depan" value="{{ $alamat->nama_depan }}">
                        <input type="hidden" name="nama_belakang" value="{{ $alamat->nama_belakang }}">
                        <input type="hidden" name="perusahaan" value="{{ $alamat->perusahaan }}">
                        <input type="hidden" name="alamat1" value="{{ $alamat->alamat1 }}">
                        <input type="hidden" name="alamat2" value="{{ $alamat->alamat2 }}">
                        <input type="hidden" name="no_hp" value="{{ $alamat->no_hp }}">
                        <input type="hidden" name="email" value="{{ $alamat->email }}">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Wilayah</label>
                            <input type="text" value="Indonesia" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-gray-100" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Provinsi</label>
                            <select name="provinsi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
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
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kota</label>
                            <input type="text" name="kota" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" value="{{ old('kota', $alamat->kota ?? '') }}" required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kode Pos</label>
                            <input type="number" name="kode_pos" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" value="{{ old('kode_pos', $alamat->kode_pos ?? '') }}" required />
                        </div>

                        <button type="submit"
                            class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700">Update</button>
                    </form>
                </div>
            </div>

            {{-- Total --}}
            <div class="flex justify-between items-center font-bold text-lg mb-4">
                <span>Total</span>
                <span id="total-display">Rp. {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>

            {{-- Checkout --}}
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button class="w-full bg-[#4285F4] text-white py-3 rounded-md hover:bg-blue-500">Proses checkout</button>
            </form>
        </div>

        {{-- Toggle Script --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let subtotal = 0;
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });

                document.querySelectorAll(".cart-subtotal").forEach(function (cell) {
                    const value = parseInt(cell.dataset.value);
                    subtotal += isNaN(value) ? 0 : value;
                });

                // Tampilkan hasil subtotal dan total
                document.getElementById("subtotal-display").textContent = formatter.format(subtotal);
                document.getElementById("total-display").textContent = formatter.format(subtotal);
            });

            document.getElementById('toggle-address').addEventListener('click', function (e) {
                e.preventDefault();
                const form = document.getElementById('address-form');
                form.classList.toggle('hidden');
            });

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Paket Buku Akan Dihapus",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#aaa',
                        confirmButtonText: 'Ya, hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest('form').submit(); // Submit ke route destroy
                        }
                    });
                });
            });
        </script>

      </section>

      <div class="mt-60">
        <div class="mx-auto mt-6">
          <hr>
      </div>

      <div>
          <h1 class="container mx-auto text-black h-15 pt-5 pl-10">© 2025 RCP. All Rights Reserved</h1>
      </div>
  </div>

</body>
</html>