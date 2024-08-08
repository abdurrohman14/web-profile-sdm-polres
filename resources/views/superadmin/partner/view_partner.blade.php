@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Partner</h3>
        <button type="submit" class="btn btn-primary"><a href="{{ route('create.partner') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $partner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                        @if($partner->gambar)
                            <img src="{{ asset('storage/' . $partner->gambar) }}" alt="" width="100">
                        @endif</td>
                        <td>
                            <a href="{{ route('edit.partner', $partner->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('delete.partner', ['id' => $partner->id]) }}" method="post">
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