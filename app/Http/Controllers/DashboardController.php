<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan data Film dan Genre dalam 1 halaman
     */
    public function index()
    {
        $films = Film::with('genre')->latest()->paginate(5);
        $genres = Genre::latest()->paginate(5);

        $i = (request()->input('page', 1) - 1) * 5;
        $j = (request()->input('page', 1) - 1) * 5;

        return view('dashboard.index', compact('films', 'genres', 'i', 'j'));
    }
}
