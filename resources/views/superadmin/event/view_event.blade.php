@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Events</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.event') }}" class="text-white text-decoration-none">Tambah Data</a></button>
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
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event as $key => $event)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $event->judul }}</td>
                        <td>{!! $event->deskripsi !!}</td>
                        <td>
                            @if($event->gambar)
                            <img src="{{ asset('storage/event/' . $event->gambar) }}" alt="{{ $event->title }}" width="100">
                            @endif
                        </td>
                        <td>{{ $event->created_at->locale('id')->translatedFormat('l, d F Y') }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{-- <a href="{{ route('show.event', $event->id) }}" class="btn btn-sm btn-info mr-1">View</a> --}}
                                <a href="{{ route('edit.event', $event->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $event->id }}" action="{{ route('delete.event', ['id' => $event->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="confrimDelete(event, {{ $event->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
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