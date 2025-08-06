@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Tambah Genre Baru</h2>
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

    <form action="{{ route('genre.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Genre</label>
            <input type="text" name="nama_genre" class="form-control" placeholder="Masukkan nama genre">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('genre.index') }}">Batal</a>
    </form>
@endsection
