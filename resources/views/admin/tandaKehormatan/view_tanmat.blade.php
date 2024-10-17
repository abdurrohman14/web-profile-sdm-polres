@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Tanda Kehormatan</h3>
        {{-- <button type="submit" class="btn btn-success"><a href="{{ route('create.tanda-kehormatan') }}" class="text-white text-decoration-none">Tambah Data</a></button> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanda Kehormatan</th>
                        <th>TMT</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tanmat as $key => $tankers)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $tankers->personel->nama_lengkap }}</td>
                        <td>{{ $tankers->tanda_kehormatan }}</td>
                        <td>{{ $tankers->tahun }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{-- <a href="{{ route('detail.pendidikan-umum', $tankers->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a> --}}
                                <a href="{{ route('edit.tanda-kehormatan', $tankers->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $tankers->id }}" action="{{ route('delete.tanda-kehormatan', $tankers->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button onclick="confirmDelete(event, {{ $tankers->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
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