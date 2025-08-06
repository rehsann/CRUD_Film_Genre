@extends('layout.app')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12">
            <h2>Daftar Film</h2>
            <a class="btn btn-success mb-2" href="{{ route('film.create') }}">+ Tambah Film</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul Film</th>
            <th>Tahun Rilis</th>
            <th>Genre</th>
            <th>Deskripsi</th>
            <th width="200px">Aksi</th>
        </tr>
        @foreach ($films as $film)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $film->judul_film }}</td>
            <td>{{ $film->tahun_rilis }}</td>
            <td>{{ $film->genre->nama_genre ?? '-' }}</td>
            <td>{{ $film->deskripsi }}</td>
            <td>
                <form action="{{ route('film.destroy',$film->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="{{ route('film.edit',$film->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $films->links() !!}
@endsection
