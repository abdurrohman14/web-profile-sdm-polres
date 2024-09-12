@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Berita</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.berita') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beritas as $key => $berita)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->slug }}</td>
                        <td>{!! $berita->deskripsi !!}</td>
                        <td>
                            <form action="{{ route('status.berita', ['id' => $berita->id]) }}" method="POST">
                                @csrf
                                </form>
                                <div>{{ $berita->status ? 'Publish' : 'Draft' }}</div>
                        </td>
                        <td>
                        @if($berita->gambar)
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->title }}" width="100">
                        @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('show.berita', $berita->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a>
                                <a href="{{ route('edit.berita', $berita->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form action="{{ route('delete.berita', ['id' => $berita->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
