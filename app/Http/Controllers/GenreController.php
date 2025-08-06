<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest()->paginate(5);
        $i = (request()->input('page', 1) - 1) * 5;

        return view('genre.index', compact('genres', 'i'));
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_genre' => 'required'
        ]);

        Genre::create($request->all());

        return redirect()->route('genre.index')
                         ->with('success', 'Genre berhasil ditambahkan!');
    }

    public function edit(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'nama_genre' => 'required'
        ]);

        $genre->update($request->all());

        return redirect()->route('genre.index')
                         ->with('success', 'Genre berhasil diperbarui!');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genre.index')
                         ->with('success', 'Genre berhasil dihapus!');
    }
}
