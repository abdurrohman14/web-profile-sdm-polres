@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Pendidikan Umum</h3>
        <button type="submit" class="btn btn-success">
            <a href="{{ route('personil.penum.create') }}" class="text-white text-decoration-none">Tambah Data</a>
        </button>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="info-item d-flex mb-2">
                            <div class="label"><strong>Nama Lengkap</strong></div>
                            <div class="colon ml-2">:</div>
                            <div class="value ml-2 font-weight-bold">{{ $pendidikanUmum[0]->personel->nama_lengkap ?? '-' }}</div>
                        </div>
                        <table class="table border-0">
                            <thead>
                                <tr>
                                    <th>Tingkat</th>
                                    <th>Nama Institusi</th>
                                    <th>Tahun</th>
                                    <th>Ijazah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendidikanUmum as $penum)
                                <tr>
                                    <td>{{ $penum->jenjang->nama }}</td>
                                    <td>{{ $penum->nama_institusi }}</td>
                                    <td>{{ $penum->tahun }}</td>
                                    <td>
                                        @if(!empty($penum->gambar) && is_array(json_decode($penum->gambar)))
                                            @foreach(json_decode($penum->gambar) as $image)
                                                <a href="javascript:void(0)" onclick="showImage('{{ asset('storage/pendidikanUmum/' . $image) }}')">
                                                    <img src="{{ asset('storage/pendidikanUmum/' . $image) }}" alt="{{ $image }}" style="width:100px; height:auto;">
                                                </a>
                                            @endforeach
                                        @else
                                            <a href="javascript:void(0)" onclick="showImage('{{ asset('storage/pendidikanUmum/' . $penum->gambar) }}')">
                                                <img src="{{ asset('storage/pendidikanUmum/' . $penum->gambar) }}" alt="{{ $penum->gambar }}" style="width:100px; height:auto;">
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('personil.penum.edit', $penum->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('personil.penum.destroy', $penum->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Image Popup -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" alt="Ijazah" style="width:100%; height:auto;">
            </div>
        </div>
    </div>
</div>

<script>
    function showImage(src) {
        document.getElementById('modalImage').src = src;
        $('#imageModal').modal('show');
    }
</script>

@endsection
