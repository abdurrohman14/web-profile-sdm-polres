@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Pengembangan Pelatihan</h3>
        {{-- <button type="submit" class="btn btn-success"><a href="{{ route('create.pengembangan-pelatihan') }}" class="text-white text-decoration-none">Tambah Data</a></button> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Dikbang</th>
                        <th>Tahun</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($penglat as $key => $penlats)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $penlats->personel->nama_lengkap }}</td>
                        <td>{{ $penlats->dikbang }}</td>
                        <td>{{ $penlats->tahun }}</td>
                        {{-- <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('detail.pendidikan-umum', $penlats->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a>
                                <a href="{{ route('edit.pengembangan-pelatihan', $penlats->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $penlats->id }}" action="{{ route('delete.pengembangan-pelatihan', $penlats->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button onclick="confirmDelete(event, {{ $penlats->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                            </form>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection