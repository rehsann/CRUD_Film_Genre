@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <h2>Edit Genre</h2>
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

    <form action="{{ route('genre.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Genre</label>
            <input type="text" name="nama_genre" value="{{ $genre->nama_genre }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a class="btn btn-secondary" href="{{ route('genre.index') }}">Batal</a>
    </form>
@endsection
