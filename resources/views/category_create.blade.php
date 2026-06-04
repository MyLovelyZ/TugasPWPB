@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-lg mx-auto">

        <a href="/dashboard" class="inline-flex items-center gap-1.5 text-gray-400 hover:text-yellow-500 text-sm font-medium mb-5 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Dashboard
        </a>

        <div class="bg-white rounded-3xl border border-yellow-200 shadow-sm overflow-hidden">
            <div class="bg-yellow-400 px-7 py-5 flex items-center gap-3">
                <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h5 class="font-extrabold text-white text-lg">Tambah Kategori Baru</h5>
            </div>

            <div class="p-7">
                <form action="/dashboard/category/store" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Nama Kategori</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full border {{ $errors->has('name') ? 'border-red-300 bg-red-50' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">URL Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}"
                               class="w-full border {{ $errors->has('slug') ? 'border-red-300 bg-red-50' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition font-mono">
                        @error('slug')
                            <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-3.5 rounded-2xl transition-colors shadow-sm text-sm">
                            Simpan Kategori
                        </button>
                        <a href="/dashboard"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold py-3.5 px-6 rounded-2xl transition-colors text-sm">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
