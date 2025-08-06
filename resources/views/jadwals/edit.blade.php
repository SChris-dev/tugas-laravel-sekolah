@extends('layouts.app')

@section('title', 'Edit Jadwal')
@section('icon')
    <i class="fas fa-calendar-alt text-blue-600"></i>
@endsection
@section('content')
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 flex items-start gap-2">
            <i class="fas fa-exclamation-circle mt-1"></i>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST" class="bg-white shadow-lg rounded-xl p-6 space-y-5">
        @csrf
        @method('PUT')

        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 outline-none transition"
               type="text" name="pelajaran" value="{{ $jadwal->pelajaran }}" required>
        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 outline-none transition"
               type="text" name="nama_guru" value="{{ $jadwal->nama_guru }}" required>
        <input class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 outline-none transition"
               type="text" name="kelas" value="{{ $jadwal->kelas }}" required>

        <select name="hari" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 outline-none transition" required>
            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                <option value="{{ $hari }}" @if ($jadwal->hari === $hari) selected @endif>{{ $hari }}</option>
            @endforeach
        </select>

        <div class="grid grid-cols-2 gap-4">
            <input class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 outline-none transition"
                   type="time" name="jam_awal"
                   value="{{ old('jam_awal', \Carbon\Carbon::parse($jadwal->jam_awal)->format('H:i')) }}" required>
            <input class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400 outline-none transition"
                   type="time" name="jam_akhir"
                   value="{{ old('jam_akhir', \Carbon\Carbon::parse($jadwal->jam_akhir)->format('H:i')) }}" required>
        </div>

        <div class="flex justify-between items-center pt-2">
            <a href="{{ route('jadwals.index') }}"
               class="text-sm text-gray-500 hover:underline flex items-center gap-1">
               <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white px-5 py-2 rounded hover:opacity-90 hover:-translate-y-0.5 transition">
                <i class="fas fa-sync-alt"></i> Update
            </button>
        </div>
    </form>
@endsection
