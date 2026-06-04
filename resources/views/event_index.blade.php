@extends('layouts.app')
@section('title', 'Manajemen Acara')

@section('content')

    {{-- Header --}}
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-2xl font-black text-gray-800">Manajemen Data Acara</h3>
            <p class="text-gray-400 text-sm mt-0.5">Kelola semua data acara sekolah</p>
        </div>
        <div class="flex gap-2">
            <a href="/dashboard"
               class="inline-flex items-center gap-2 border border-gray-200 hover:border-yellow-300 text-gray-500 hover:text-yellow-600 font-semibold text-xs px-4 py-2.5 rounded-xl transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Dashboard
            </a>
            <a href="/event/create"
               class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition-colors shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Acara Baru
            </a>
        </div>
    </div>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-2xl px-5 py-4 mb-5 flex items-center gap-3"
             x-data="{ show: true }" x-show="show">
            <div class="w-8 h-8 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <span class="text-sm flex-1"><strong>Sukses!</strong> {{ session('success') }}</span>
            <button @click="show = false" class="text-green-300 hover:text-green-500 ml-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    {{-- Tabel --}}
    <div class="bg-white rounded-3xl border border-yellow-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-yellow-400 text-white">
                        <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide w-12">No</th>
                        <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide w-16">Poster</th>
                        <th class="text-left py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Judul Acara</th>
                        <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Kategori</th>
                        <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Tanggal & Lokasi</th>
                        <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Kuota</th>
                        <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-yellow-50">
                    @forelse($events as $event)
                        <tr class="hover:bg-yellow-50/60 transition-colors">
                            <td class="text-center py-4 px-4 text-gray-400 text-xs font-semibold">{{ $loop->iteration }}</td>
                            <td class="text-center py-4 px-4">
                                @if($event->poster)
                                    <img src="{{ asset('storage/' . $event->poster) }}"
                                         class="w-12 h-12 object-cover rounded-xl border border-yellow-100 mx-auto shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center mx-auto border border-yellow-100">
                                        <span class="text-yellow-300 text-xs font-black">SE</span>
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-bold text-gray-800 leading-snug">{{ $event->title }}</span>
                            </td>
                            <td class="text-center py-4 px-4">
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-full border border-yellow-200">
                                    {{ $event->category->name }}
                                </span>
                            </td>
                            <td class="text-center py-4 px-4">
                                <p class="font-semibold text-gray-700 text-xs">{{ date('d M Y', strtotime($event->event_date)) }}</p>
                                <p class="text-gray-400 text-xs mt-0.5">{{ $event->location }}</p>
                            </td>
                            <td class="text-center py-4 px-4">
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-full border border-yellow-200">
                                    {{ $event->quota }} Orang
                                </span>
                            </td>
                            <td class="text-center py-4 px-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="/event/{{ $event->id }}/edit"
                                       class="inline-flex items-center gap-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-lg transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="/event/{{ $event->id }}" method="POST" class="inline"
                                          onsubmit="return confirm('Peringatan: File gambar posternya juga akan dihancurkan. Lanjutkan?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 bg-red-100 hover:bg-red-200 text-red-600 text-xs font-bold px-3 py-1.5 rounded-lg transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-16">
                                <div class="w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center mx-auto mb-3 border border-yellow-100">
                                    <span class="text-yellow-300 font-black">SE</span>
                                </div>
                                <p class="text-gray-400 font-semibold text-sm">Belum ada data acara yang terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
