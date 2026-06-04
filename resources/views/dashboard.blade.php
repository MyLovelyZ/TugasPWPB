@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 rounded-2xl px-5 py-4 mb-6 flex items-center gap-3"
             x-data="{ show: true }" x-show="show">
            <div class="w-8 h-8 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <span class="text-sm flex-1"><strong>Berhasil!</strong> {{ session('success') }}</span>
            <button @click="show = false" class="text-green-300 hover:text-green-500 transition-colors ml-auto">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-yellow-200 shadow-sm overflow-hidden">

        <div class="bg-yellow-400 px-7 py-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                </div>
                <h5 class="font-extrabold text-white text-lg">Panel Admin</h5>
            </div>
        </div>

        <div class="p-6">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
                <div>
                    <h5 class="font-extrabold text-gray-800">Daftar Kategori Acara</h5>
                    <p class="text-gray-400 text-xs mt-0.5">Kelola semua kategori yang tersedia</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="/events"
                       class="inline-flex items-center gap-1.5 border border-yellow-300 text-yellow-600 hover:bg-yellow-50 text-xs font-bold px-4 py-2.5 rounded-xl transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Manajemen Acara
                    </a>
                    <a href="/dashboard/category/create"
                       class="inline-flex items-center gap-1.5 bg-green-500 hover:bg-green-600 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-colors shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Kategori
                    </a>
                    <a href="/event/create"
                       class="inline-flex items-center gap-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-colors shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Acara
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto rounded-2xl border border-yellow-100">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-yellow-400 text-white">
                            <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide w-14">No</th>
                            <th class="text-left py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Nama Kategori</th>
                            <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide">URL Slug</th>
                            <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Tanggal Dibuat</th>
                            <th class="text-center py-3.5 px-4 font-bold text-xs uppercase tracking-wide">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-yellow-50">
                        @forelse($categories as $category)
                            <tr class="hover:bg-yellow-50/60 transition-colors">
                                <td class="text-center py-3.5 px-4 text-gray-400 text-xs font-semibold">{{ $loop->iteration }}</td>
                                <td class="py-3.5 px-4">
                                    <span class="font-bold text-gray-800">{{ $category->name }}</span>
                                </td>
                                <td class="text-center py-3.5 px-4">
                                    <span class="bg-gray-100 text-gray-500 text-xs px-3 py-1.5 rounded-lg font-mono">
                                        {{ $category->slug }}
                                    </span>
                                </td>
                                <td class="text-center py-3.5 px-4 text-gray-500 text-xs">
                                    {{ date('d M Y', strtotime($category->created_at)) }}
                                </td>
                                <td class="text-center py-3.5 px-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/kategori/{{ $category->id }}/edit"
                                           class="inline-flex items-center gap-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-lg transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="/kategori/{{ $category->id }}" method="POST" class="inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
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
                                <td colspan="5" class="text-center py-16">
                                    <div class="w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center mx-auto mb-3 border border-yellow-100">
                                        <span class="text-yellow-300 font-black">SE</span>
                                    </div>
                                    <p class="text-gray-400 font-semibold text-sm">Belum ada kategori terdaftar.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
