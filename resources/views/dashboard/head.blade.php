<div class="container mx-auto mt-10 ">
    <div class="rounded-xl overflow-hidden shadow-lg">
    <!-- Header -->
    <img class="w-full object-cover" src="{{ asset('assets/image/bgbiruprofil.svg') }}" alt="">

    <!-- Profile Section -->
    <div class="bg-white p-6 flex items-center space-x-4">
        <!-- Avatar -->
        <div class="w-14 h-14 rounded-full bg-gray-300 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8.966 8.966 0 0112 15c2.21 0 4.21.805 5.879 2.137M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        </div>

        <!-- Info -->
        <div>
        <h2 class="text-lg font-semibold text-gray-900">{{ $auth->nama_depan }}</h2>
        <p class="text-sm text-gray-600">{{ $auth->email }}</p>
        </div>
    </div>
    </div>
    </div>
