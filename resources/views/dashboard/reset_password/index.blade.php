@extends('layout.index')

@section('content')
    @include('dashboard.head')

    <div class="container mx-auto py-6 px-0">
        <div class="flex flex-wrap gap-6">

            {{-- Sidebar --}}
            @include('dashboard.sidebar')

            {{-- Form Reset Password --}}
            <main class="flex-1 bg-white p-6 border rounded shadow-md w-full md:w-3/4">
                <div class="w-full mx-auto bg-white border border-gray-200 rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Reset Password</h2>

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf

                        {{-- Password Lama --}}
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Lama</label>
                            <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                autocomplete="current-password"
                            >
                        </div>

                        {{-- Password Baru --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                autocomplete="new-password"
                            >
                        </div>

                        {{-- Konfirmasi Password Baru --}}
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Ulangi Password Baru</label>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                autocomplete="new-password"
                            >
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full bg-purple-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-purple-700 transition duration-200"
                            >
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
