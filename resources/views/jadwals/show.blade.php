@extends('layouts.app')

@section('title', 'Detail Jadwal')
@section('icon')
    <i class="fas fa-calendar-alt text-blue-600"></i>
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 flex items-center gap-2">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="mb-6 flex gap-2">
        <a href="{{ route('jadwals.index') }}"
            class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded shadow transition-all">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <a href="{{ route('jadwals.edit', $jadwal->id) }}"
            class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded shadow transition-all">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-xl mx-auto border border-gray-200">
        <h2 class="text-xl font-semibold text-blue-700 mb-4">Informasi Jadwal</h2>

        <div class="space-y-4">
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600">Pelajaran</span>
                <span class="font-medium">{{ $jadwal->pelajaran }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600">Nama Guru</span>
                <span class="font-medium">{{ $jadwal->nama_guru }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600">Kelas</span>
                <span class="font-medium">{{ $jadwal->kelas }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600">Hari</span>
                <span class="font-medium">{{ $jadwal->hari }}</span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="text-gray-600">Jam Awal</span>
                <span class="font-medium">{{ \Carbon\Carbon::parse($jadwal->jam_awal)->format('H:i') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Jam Akhir</span>
                <span class="font-medium">{{ \Carbon\Carbon::parse($jadwal->jam_akhir)->format('H:i') }}</span>
            </div>
        </div>
    </div>
@endsection
