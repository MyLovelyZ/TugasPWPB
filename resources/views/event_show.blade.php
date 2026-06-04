@extends('layouts.app')
@section('title', $event->title)

@section('content')

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-gray-400 mb-6">
        <a href="/" class="hover:text-yellow-500 transition-colors font-medium">Home</a>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-600 font-semibold truncate max-w-xs">{{ $event->title }}</span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-8 mb-10">

        {{-- Kolom Poster --}}
        <div class="md:col-span-2">
            @if ($event->poster)
                <img src="{{ asset('storage/' . $event->poster) }}"
                     class="w-full rounded-3xl shadow-md object-cover max-h-96 border border-yellow-100"
                     alt="{{ $event->title }}">
            @else
                <div class="w-full h-72 bg-linear-to-br from-yellow-50 to-yellow-100 rounded-3xl border border-yellow-200 flex flex-col items-center justify-center">
                    <div class="w-16 h-16 bg-yellow-200 rounded-2xl flex items-center justify-center mb-3">
                        <span class="text-yellow-500 font-black text-xl">SE</span>
                    </div>
                    <p class="text-yellow-400 text-sm font-semibold">Tanpa Poster</p>
                </div>
            @endif
        </div>

        {{-- Kolom Detail --}}
        <div class="md:col-span-3">
            <span class="inline-block bg-yellow-100 text-yellow-700 text-sm font-bold px-4 py-1.5 rounded-full border border-yellow-200 mb-4">
                {{ $event->category->name }}
            </span>
            <h2 class="text-3xl font-black text-gray-800 mb-6 leading-tight">{{ $event->title }}</h2>

            {{-- Info Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                <div class="bg-yellow-50 rounded-2xl p-4 border border-yellow-100">
                    <div class="flex items-center gap-2 mb-1">
                        <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-yellow-600 text-xs font-bold uppercase tracking-wide">Tanggal Pelaksanaan</p>
                    </div>
                    <p class="font-extrabold text-gray-800 text-sm">{{ date('d M Y', strtotime($event->event_date)) }}</p>
                </div>
                <div class="bg-yellow-50 rounded-2xl p-4 border border-yellow-100">
                    <div class="flex items-center gap-2 mb-1">
                        <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p class="text-yellow-600 text-xs font-bold uppercase tracking-wide">Lokasi</p>
                    </div>
                    <p class="font-extrabold text-gray-800 text-sm">{{ $event->location }}</p>
                </div>
                <div class="bg-yellow-50 rounded-2xl p-4 border border-yellow-100 sm:col-span-2">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p class="text-yellow-600 text-xs font-bold uppercase tracking-wide">Kuota Peserta</p>
                    </div>
                    <span class="bg-yellow-400 text-white font-extrabold text-sm px-5 py-2 rounded-xl inline-block">
                        {{ $event->quota }} Orang
                    </span>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="border-t border-yellow-100 pt-5">
                <h5 class="font-extrabold text-gray-800 mb-3 flex items-center gap-2">
                    <div class="w-1 h-5 bg-yellow-400 rounded-full"></div>
                    Deskripsi Acara
                </h5>
                <p class="text-gray-500 leading-relaxed text-sm">{{ $event->description }}</p>
            </div>

            <a href="/"
               class="inline-flex items-center gap-2 mt-6 border border-yellow-300 text-yellow-600 hover:bg-yellow-50 font-semibold px-5 py-2.5 rounded-2xl transition-colors text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Katalog
            </a>
        </div>

    </div>

@endsection
