@extends('layouts.app')
@section('title', 'Katalog Acara')

@section('content')

    <div class="relative bg-linear-to-br from-yellow-50 via-white to-yellow-50 rounded-3xl border border-yellow-200 px-8 py-16 mb-10 text-center overflow-hidden shadow-sm">
        <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-100 rounded-full -translate-y-1/2 translate-x-1/3 opacity-50"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-yellow-100 rounded-full translate-y-1/2 -translate-x-1/3 opacity-50"></div>

        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 text-xs font-bold px-4 py-2 rounded-full mb-5 border border-yellow-200 uppercase tracking-wide">
                <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></div>
                SMK Plus Pelita Nusantara
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-gray-800 mb-4 leading-tight">
                Selamat Datang di<br>
                <span class="text-yellow-500">SchoolEvent</span>
            </h1>
            <p class="text-gray-500 text-lg max-w-xl mx-auto">
                Papan Informasi Acara dan Kegiatan Resmi Sekolah
            </p>
        </div>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-1 h-7 bg-yellow-400 rounded-full"></div>
            <h3 class="text-xl font-extrabold text-gray-800">Katalog Acara Terbaru</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($events as $event)
                <div class="bg-white rounded-2xl border border-yellow-100 shadow-sm hover:shadow-lg hover:border-yellow-300 transition-all duration-300 flex flex-col overflow-hidden group">

                    @if($event->poster)
                        <div class="overflow-hidden h-52">
                            <img src="{{ asset('storage/' . $event->poster) }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 alt="{{ $event->title }}">
                        </div>
                    @else
                        <div class="h-52 bg-linear-to-br from-yellow-50 to-yellow-100 flex flex-col items-center justify-center border-b border-yellow-100">
                            <div class="w-16 h-16 bg-yellow-200 rounded-2xl flex items-center justify-center mb-2">
                                <span class="text-yellow-500 font-black text-xl">SE</span>
                            </div>
                            <span class="text-yellow-400 text-xs font-semibold">Tanpa Poster</span>
                        </div>
                    @endif

                    <div class="p-5 flex flex-col flex-1">
                        <span class="inline-block bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-full mb-3 self-start border border-yellow-200">
                            {{ $event->category->name }}
                        </span>
                        <h5 class="font-extrabold text-gray-800 text-base mb-3 leading-snug line-clamp-2">
                            {{ $event->title }}
                        </h5>
                        <div class="space-y-1.5 mb-3">
                            <div class="flex items-center gap-2 text-gray-500 text-xs">
                                <svg class="w-3.5 h-3.5 text-yellow-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="font-medium">{{ date('d M Y', strtotime($event->event_date)) }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-500 text-xs">
                                <svg class="w-3.5 h-3.5 text-yellow-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="font-medium">{{ $event->location }}</span>
                            </div>
                        </div>
                        <p class="text-gray-400 text-xs leading-relaxed line-clamp-2 flex-1">
                            {{ $event->description }}
                        </p>
                        <div class="mt-4">
                            <a href="/event/{{ $event->id }}"
                               class="block w-full text-center bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2.5 rounded-xl text-sm transition-colors shadow-sm">
                                Lihat Detail Acara
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-20">
                    <div class="w-20 h-20 bg-yellow-50 rounded-3xl flex items-center justify-center mx-auto mb-4 border border-yellow-100">
                        <span class="text-yellow-300 font-black text-2xl">SE</span>
                    </div>
                    <p class="text-gray-400 font-semibold text-lg">Belum ada acara yang dipublikasikan.</p>
                    <p class="text-gray-300 text-sm mt-1">Pantau terus untuk info acara terbaru!</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection
