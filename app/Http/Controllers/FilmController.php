<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Menampilkan semua film
     */
    public function index()
    {
        $films = Film::with('genre')->latest()->paginate(5);
        $i = (request()->input('page', 1) - 1) * 5;

        return view('film.index', compact('films', 'i'));
    }

    /**
     * Menampilkan form tambah film
     */
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    /**
     * Simpan data film ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_film' => 'required',
            'tahun_rilis' => 'required|numeric',
            'genre_id' => 'required',
            'deskripsi' => 'nullable'
        ]);

        Film::create($request->all());

        return redirect()->route('film.index')
                         ->with('success', 'Film berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit film
     */
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();
        return view('film.edit', compact('film', 'genres'));
    }

    /**
     * Update data film di database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_film' => 'required',
            'tahun_rilis' => 'required|numeric',
            'genre_id' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $film = Film::findOrFail($id);
        $film->update($request->all());

        return redirect()->route('film.index')
                         ->with('success', 'Film berhasil diupdate!');
    }

    /**
     * Hapus data film
     */
    public function destroy($id)
    {
        Film::findOrFail($id)->delete();

        return redirect()->route('film.index')
                         ->with('success', 'Film berhasil dihapus!');
    }
}
