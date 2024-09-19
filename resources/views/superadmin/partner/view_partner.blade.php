@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Partner</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.partner') }}" class="text-white text-decoration-none">Tambah Data</a></button>
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
                    @foreach($partners as $key => $partner)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                        @if($partner->gambar)
                            <img src="{{ asset('storage/partner/' . $partner->gambar) }}" alt="" width="100">
                        @endif</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('edit.partner', $partner->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $partner->id }}" action="{{ route('delete.partner', ['id' => $partner->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="confirmDelete(event, {{ $partner->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
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