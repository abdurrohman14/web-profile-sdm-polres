@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Hero</h3>
        <button type="submit" class="btn btn-primary"><a href="{{ route('create.hero') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($heros as $hero)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hero->title }}</td>
                        <td>{{ $hero->deskripsi }}</td>
                        <td>
                        @if($hero->gambar)
                            <img src="{{ asset('storage/' . $hero->gambar) }}" alt="{{ $hero->title }}" width="100">
                        @endif</td>
                        <td>
                            <a href="{{ route('edit.hero', $hero->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('delete.hero', ['id' => $hero->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection