@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Riwayat Jabatan</h3>
        <button type="submit" class="btn btn-success">
            <a href="{{ route('personil.rijab.create') }}" class="text-white text-decoration-none">Tambah Data</a>
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
                            <div class="value ml-2 font-weight-bold">{{ $riwayatJabatan[0]->personel->nama_lengkap ?? '-' }}</div>
                        </div>
                        <table class="table border-0">
                            <thead>
                                <tr>
                                    <th>Jabatan</th>
                                    <th>Tahun</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayatJabatan as $rijab)
                                <tr>
                                    <td>{{ $rijab->jabatan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($rijab->tmt)->format('d-m-Y') }}</td>
                                    <td>
                                        @if(!empty($rijab->gambar) && is_array(json_decode($rijab->gambar)))
                                            @foreach(json_decode($rijab->gambar) as $image)
                                                <a href="javascript:void(0)" onclick="showImage('{{ asset('storage/riwayatJabatan/' . $image) }}')">
                                                    <img src="{{ asset('storage/riwayatJabatan/' . $image) }}" alt="{{ $image }}" style="width:100px; height:auto;">
                                                </a>
                                            @endforeach
                                        @else
                                            <a href="javascript:void(0)" onclick="showImage('{{ asset('storage/riwayatJabatan/' . $rijab->gambar) }}')">
                                                <img src="{{ asset('storage/riwayatJabatan/' . $rijab->gambar) }}" alt="{{ $rijab->gambar }}" style="width:100px; height:auto;">
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('personil.rijab.edit', $rijab->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('personil.rijab.destroy', $rijab->id) }}" method="POST" style="display:inline;">
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

<!-- Modal Pop-up -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gambar Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Gambar Jabatan" style="max-width:100%; height:auto;">
            </div>
        </div>
    </div>
</div>

<script>
    function showImage(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        $('#imageModal').modal('show');
    }
</script>

@endsection
