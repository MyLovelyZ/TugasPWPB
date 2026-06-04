@extends('layouts.app')
@section('title', 'Edit Kategori')

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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h5 class="font-extrabold text-white text-lg">Edit Kategori Acara</h5>
            </div>

            <div class="p-7">
                <form action="/kategori/{{ $category->id }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Nama Kategori</label>
                        <input type="text" name="name" value="{{ $category->name }}" required
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">URL Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" required
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition font-mono">
                    </div>

                    <div class="flex justify-between gap-3 pt-2">
                        <a href="/dashboard"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold py-3.5 px-6 rounded-2xl transition-colors text-sm">
                            Batal
                        </a>
                        <button type="submit"
                                class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-3.5 rounded-2xl transition-colors shadow-sm text-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
