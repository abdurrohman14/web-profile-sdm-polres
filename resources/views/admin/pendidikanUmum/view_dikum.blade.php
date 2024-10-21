@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Pendidikan Umum</h3>
        {{-- <button type="submit" class="btn btn-success"><a href="{{ route('create.pendidikan-umum') }}" class="text-white text-decoration-none">Tambah Data</a></button> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tingkat</th>
                        <th>Nama Institusi</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dikum as $key => $penum)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $penum->personel->nama_lengkap }}</td>
                        <td>{{ $penum->tingkat }}</td>
                        <td>{{ $penum->nama_institusi }}</td>
                        <td>{{ $penum->tahun }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('show.dikum', $penum->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a>
                                {{-- <a href="{{ route('edit.pendidikan-umum', $penum->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $penum->id }}" action="{{ route('delete.pendidikan-umum', $penum->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button onclick="confirmDelete(event, {{ $penum->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                            </form> --}}
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