@extends('layouts.app')
@section('title', 'Tambah Acara')

@section('content')
    <div class="max-w-2xl mx-auto">

        {{-- Back Link --}}
        <a href="/events" class="inline-flex items-center gap-1.5 text-gray-400 hover:text-yellow-500 text-sm font-medium mb-5 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Manajemen Acara
        </a>

        <div class="bg-white rounded-3xl border border-yellow-200 shadow-sm overflow-hidden">
            {{-- Header --}}
            <div class="bg-yellow-400 px-7 py-5 flex items-center gap-3">
                <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h5 class="font-extrabold text-white text-lg">Formulir Tambah Acara Baru</h5>
            </div>

            <div class="p-7">
                {{-- Error --}}
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 rounded-2xl px-5 py-4 mb-6 text-sm">
                        <p class="font-bold mb-1">Terdapat kesalahan:</p>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/event/store" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Kategori Acara</label>
                        <select name="category_id" required
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition bg-white">
                            <option value="">-- Silakan Pilih --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Judul --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Judul Acara</label>
                        <input type="text" name="title" placeholder="Contoh: Pensi Akhir Tahun" required
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                    </div>

                    {{-- Tanggal & Lokasi --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Tanggal Acara</label>
                            <input type="date" name="event_date" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Lokasi Acara</label>
                            <input type="text" name="location" placeholder="Contoh: Lapangan Utama" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>
                    </div>

                    {{-- Kuota --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Kuota Peserta</label>
                        <input type="number" name="quota" placeholder="Contoh: 100" required
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Deskripsi Acara</label>
                        <textarea name="description" rows="4" placeholder="Tuliskan detail acara di sini..." required
                                  class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition resize-none"></textarea>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-yellow-100"></div>

                    {{-- Poster Upload dengan Alpine Preview --}}
                    <div x-data="{ preview: null }">
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Poster Acara (Maks. 2MB)</label>
                        <div x-show="preview" class="mb-3">
                            <img :src="preview" class="w-full max-h-56 object-cover rounded-2xl border border-yellow-200 shadow-sm">
                        </div>
                        <label class="flex flex-col items-center justify-center w-full border-2 border-dashed border-yellow-200 rounded-2xl py-6 px-4 cursor-pointer hover:border-yellow-400 hover:bg-yellow-50 transition-all"
                               x-show="!preview">
                            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <p class="text-yellow-500 font-bold text-sm">Klik untuk upload poster</p>
                            <p class="text-gray-400 text-xs mt-1">PNG, JPG, JPEG (maks. 2MB)</p>
                            <input type="file" id="poster" name="poster" accept="image/*" class="hidden"
                                   @change="preview = URL.createObjectURL($event.target.files[0])">
                        </label>
                        <div x-show="preview" class="mt-2">
                            <button type="button" @click="preview = null; document.getElementById('poster').value = ''"
                                    class="text-xs text-red-400 hover:text-red-600 font-semibold">
                                &times; Hapus gambar
                            </button>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-3.5 rounded-2xl transition-colors shadow-sm text-sm">
                            Simpan Data Acara
                        </button>
                        <a href="/events"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold py-3.5 px-6 rounded-2xl transition-colors text-sm">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
