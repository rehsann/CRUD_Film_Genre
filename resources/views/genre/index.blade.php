@extends('layout.app')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12">
            <h2>Daftar Genre</h2>
            <a class="btn btn-success mb-2" href="{{ route('genre.create') }}">+ Tambah Genre</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Genre</th>
            <th width="200px">Aksi</th>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $genre->nama_genre }}</td>
            <td>
                <form action="{{ route('genre.destroy',$genre->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="{{ route('genre.edit',$genre->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $genres->links() !!}
@endsection
