@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
    <div class="relative bg-linear-to-br from-yellow-50 via-white to-yellow-50 rounded-3xl border border-yellow-200 p-12 text-center overflow-hidden shadow-sm">
        <div class="absolute top-0 right-0 w-56 h-56 bg-yellow-100 rounded-full -translate-y-1/2 translate-x-1/3 opacity-40"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-yellow-100 rounded-full translate-y-1/2 -translate-x-1/3 opacity-40"></div>
        <div class="relative z-10">
            <div class="w-16 h-16 bg-yellow-400 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-sm">
                <span class="text-white font-black text-xl">SE</span>
            </div>
            <h1 class="text-4xl font-black text-gray-800 mb-3">Selamat Datang!</h1>
            <p class="text-gray-500 text-lg mb-8 max-w-md mx-auto">
                Sistem Pendaftaran Event Resmi SMK Plus Pelita Nusantara.
            </p>
            <div class="w-16 h-1 bg-yellow-300 mx-auto mb-8 rounded-full"></div>
            <a href="/dashboard"
               class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white font-bold px-8 py-3.5 rounded-2xl transition-colors shadow-sm text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                Masuk Dashboard
            </a>
        </div>
    </div>
@endsection
