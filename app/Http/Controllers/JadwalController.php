<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwals.index', compact('jadwals'));
    }

    public function show(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwals.show', compact('jadwal'));
    }


    public function create()
    {
        return view('jadwals.create');
    }

    public function store(Request $req)
    {
        $validate = Validator::make($req->all(), [
            'pelajaran' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'hari' => 'required|string|max:20',
            'jam_awal' => 'required|date_format:H:i',
            'jam_akhir' => 'required|date_format:H:i|after:jam_awal',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        Jadwal::create($validate->validated());

        return redirect()->route('jadwals.index')->with('success', 'Jadwal Mapel telah berhasil dibuat.');
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // if (!$jadwal) {
        //     return redirect()->route('jadwals.index')->with('error', 'Jadwal Mapel tidak ditemukan.');
        // }

        return view('jadwals.edit', compact('jadwal'));
    }

    public function update(Request $req, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $validate = Validator::make($req->all(), [
            'pelajaran' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'hari' => 'required|string|max:20',
            'jam_awal' => 'required|date_format:H:i',
            'jam_akhir' => 'required|date_format:H:i|after:jam_awal',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $jadwal->update($validate->validated());

        return redirect()->route('jadwals.index')->with('success', 'Jadwal Mapel telah berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // if (!$jadwal) {
        //     return redirect()->route('jadwals.index')->with('error', 'Jadwal Mapel tidak ditemukan.');
        // }

        $jadwal->delete();
        return redirect()->route('jadwals.index')->with('success', 'Jadwal Mapel berhasil dihapus.');
    }
}
