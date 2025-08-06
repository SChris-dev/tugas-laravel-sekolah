@extends('layouts.app')

@section('title', 'Daftar Jadwal')
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

    <a href="{{ route('jadwals.create') }}"
        class="mb-4 inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-4 py-2 rounded transition-all duration-200 ease-in-out hover:opacity-90 hover:-translate-y-1">
        <i class="fas fa-plus"></i> Tambah Jadwal
    </a>

    @if ($jadwals->isEmpty())
        <p class="text-gray-600">Belum ada jadwal tersedia.</p>
    @else
        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-4 rounded-tl-lg">Pelajaran</th>
                        <th class="p-4">Nama Guru</th>
                        <th class="p-4">Kelas</th>
                        <th class="p-4">Hari</th>
                        <th class="p-4">Jam Awal</th>
                        <th class="p-4">Jam Akhir</th>
                        <th class="p-4 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($jadwals as $jadwal)
                        <tr class="hover:bg-blue-50 transition-all duration-150">
                            <td class="p-4 font-medium">{{ $jadwal->pelajaran }}</td>
                            <td class="p-4">{{ $jadwal->nama_guru }}</td>
                            <td class="p-4">{{ $jadwal->kelas }}</td>
                            <td class="p-4">{{ $jadwal->hari }}</td>
                            <td class="p-4">{{ \Carbon\Carbon::parse($jadwal->jam_awal)->format('H:i') }}</td>
                            <td class="p-4">{{ \Carbon\Carbon::parse($jadwal->jam_akhir)->format('H:i') }}</td>
                            <td class="p-4 flex flex-wrap gap-2">
                                <a href="{{ route('jadwals.show', $jadwal->id) }}"
                                    class="inline-flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded shadow transition-all">
                                    <i class="fas fa-eye"></i> Detail
                                </a>

                                <a href="{{ route('jadwals.edit', $jadwal->id) }}"
                                    class="inline-flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded shadow transition-all">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('jadwals.destroy', $jadwal->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded shadow transition-all">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
