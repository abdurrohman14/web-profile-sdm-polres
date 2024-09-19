@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-dark">Personil</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.person') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    {{-- <form method="GET" action="{{ route('index.person') }}">
        <label for="subJabatan">Filter SubJabatan:</label>
        <select name="subJabatan" id="subJabatan">
            <option value="">-- Pilih SubJabatan --</option>
            @foreach($subJabatans as $id => $nama)
                <option value="{{ $id }}" {{ $subJabatanId == $id ? 'selected' : '' }}>
                    {{ $nama }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form> --}}
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Sub Jabatan</th>
                        <th>Pangkat</th>
                        <th>Gol Ruang</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personels as $key => $personil)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $personil->nama_lengkap }}</td>
                        <td>{{ $personil->jabatan->nama }}</td>
                        <td>{{ $personil->subJabatan->nama ?? '-' }}</td>
                        <td>{{ $personil->pangkat->nama }}</td>
                        <td>{{ $personil->pangkatPnsPolri->nama }}</td>
                        <td>{{ $personil->user->role }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('show.person', $personil->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a>
                                <a href="{{ route('edit.person', $personil->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $personil->id }}" action="{{ route('delete.personel', ['id' => $personil->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="confirmDelete(event, {{ $personil->id }})" class="btn btn-sm btn-danger mr-1"><i class="fas fa-solid fa-trash"></i></button>
                                </form>
                                <a href="{{ route('export.person', $personil->id) }}" class="btn btn-sm btn-success"><i class="fas fa-solid fa-download"></i></a>
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