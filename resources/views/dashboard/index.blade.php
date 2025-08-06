@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Dashboard Film & Genre</h2>

    <div class="card mb-4">
        <div class="card-header">
            <h4>Daftar Film</h4>
            <a href="{{ route('film.create') }}" class="btn btn-success btn-sm float-end">+ Tambah Film</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Judul Film</th>
                    <th>Tahun Rilis</th>
                    <th>Genre</th>
                    <th>Deskripsi</th>
                    <th width="150px">Aksi</th>
                </tr>
                @foreach ($films as $film)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $film->judul_film }}</td>
                    <td>{{ $film->tahun_rilis }}</td>
                    <td>{{ $film->genre->nama_genre }}</td>
                    <td>{{ $film->deskripsi }}</td>
                    <td>
                        <form action="{{ route('film.destroy', $film->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('film.edit', $film->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Daftar Genre</h4>
            <a href="{{ route('genre.create') }}" class="btn btn-success btn-sm float-end">+ Tambah Genre</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Genre</th>
                    <th width="150px">Aksi</th>
                </tr>
                @foreach ($genres as $genre)
                <tr>
                    <td>{{ ++$j }}</td>
                    <td>{{ $genre->nama_genre }}</td>
                    <td>
                        <form action="{{ route('genre.destroy', $genre->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('genre.edit', $genre->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
