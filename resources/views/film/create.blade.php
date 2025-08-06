@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Tambah Film Baru</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('film.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul Film</label>
            <input type="text" name="judul_film" class="form-control" placeholder="Masukkan judul film">
        </div>
        <div class="mb-3">
            <label>Tahun Rilis</label>
            <input type="number" name="tahun_rilis" class="form-control" placeholder="Masukkan tahun rilis">
        </div>
        <div class="mb-3">
            <label>Genre</label>
            <select name="genre_id" class="form-control">
                <option value="">-- Pilih Genre --</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->nama_genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" placeholder="Tulis deskripsi film"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('film.index') }}">Batal</a>
    </form>
@endsection
