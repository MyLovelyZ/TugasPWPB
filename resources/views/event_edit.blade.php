@extends('layouts.app')
@section('title', 'Edit Acara')

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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h5 class="font-extrabold text-white text-lg">Edit Data Acara</h5>
            </div>

            <div class="p-7">
                <form action="/event/{{ $event->id }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Kategori Acara</label>
                        <select name="category_id" required
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition bg-white">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Judul --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Judul Acara</label>
                        <input type="text" name="title" value="{{ $event->title }}" required
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                    </div>

                    {{-- Tanggal, Lokasi, Kuota --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Tanggal</label>
                            <input type="date" name="event_date" value="{{ $event->event_date }}" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Lokasi</label>
                            <input type="text" name="location" value="{{ $event->location }}" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Kuota</label>
                            <input type="number" name="quota" value="{{ $event->quota }}" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Deskripsi</label>
                        <textarea name="description" rows="3" required
                                  class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition resize-none">{{ $event->description }}</textarea>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-yellow-100"></div>

                    {{-- Poster Upload dengan Alpine --}}
                    <div x-data="{ hasNewPreview: false, newPreviewUrl: '' }">
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Poster Acara <span class="text-gray-400 font-normal normal-case">(abaikan jika tidak diganti)</span>
                        </label>

                        {{-- Poster saat ini --}}
                        @if ($event->poster)
                            <div :class="hasNewPreview ? 'hidden' : ''" class="mb-3">
                                <p class="text-xs text-gray-400 mb-1.5 font-medium">Poster saat ini:</p>
                                <img src="{{ asset('storage/' . $event->poster) }}"
                                     class="w-full max-h-56 object-cover rounded-2xl border border-yellow-200 shadow-sm">
                            </div>
                        @endif

                        {{-- Preview poster baru --}}
                        <div x-show="hasNewPreview" class="mb-3">
                            <p class="text-xs text-gray-400 mb-1.5 font-medium">Poster baru:</p>
                            <img :src="newPreviewUrl" class="w-full max-h-56 object-cover rounded-2xl border border-yellow-300 shadow-sm">
                        </div>

                        {{-- Drop Zone --}}
                        <label class="flex flex-col items-center justify-center w-full border-2 border-dashed border-yellow-200 rounded-2xl py-5 px-4 cursor-pointer hover:border-yellow-400 hover:bg-yellow-50 transition-all">
                            <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <p class="text-yellow-500 font-bold text-xs">Klik untuk ganti poster</p>
                            <input type="file" id="poster" name="poster" accept="image/*" class="hidden"
                                   @change="hasNewPreview = true; newPreviewUrl = URL.createObjectURL($event.target.files[0])">
                        </label>
                        <div x-show="hasNewPreview" class="mt-2">
                            <button type="button"
                                    @click="hasNewPreview = false; newPreviewUrl = ''; document.getElementById('poster').value = ''"
                                    class="text-xs text-red-400 hover:text-red-600 font-semibold">
                                &times; Batalkan penggantian poster
                            </button>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-3.5 rounded-2xl transition-colors shadow-sm text-sm">
                            Simpan Perubahan Acara
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
