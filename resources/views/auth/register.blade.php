@extends('layouts.app')
@section('title', 'Daftar Akun')

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center py-8">
        <div class="w-full max-w-lg">

            {{-- Card --}}
            <div class="bg-white rounded-3xl border border-yellow-200 shadow-sm overflow-hidden">

                {{-- Header --}}
                <div class="bg-yellow-400 px-8 py-7 text-center">
                    <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <span class="text-white font-black text-xl">SE</span>
                    </div>
                    <h5 class="text-white font-extrabold text-xl">Buat Akun Baru</h5>
                    <p class="text-yellow-100 text-xs mt-1">SMK Plus Pelita Nusantara</p>
                </div>

                <div class="p-8">
                    {{-- Error Alert --}}
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-600 rounded-2xl px-4 py-3.5 mb-6 text-sm">
                            <p class="font-bold mb-1.5 flex items-center gap-1.5">
                                <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                Terdapat kesalahan:
                            </p>
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/register" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   placeholder="Masukkan nama lengkap Anda" required autofocus
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   placeholder="contoh@email.com" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Password</label>
                            <input type="password" name="password"
                                   placeholder="Minimal 8 karakter" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                   placeholder="Ulangi password Anda" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>

                        <button type="submit"
                                class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-extrabold py-3.5 rounded-2xl transition-colors shadow-sm mt-2">
                            Daftar Sekarang
                        </button>
                    </form>

                    <div class="border-t border-gray-100 mt-7 pt-6 text-center">
                        <p class="text-gray-500 text-sm">
                            Sudah punya akun?
                            <a href="/login" class="font-bold text-yellow-500 hover:text-yellow-600 transition-colors">Login di sini</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
