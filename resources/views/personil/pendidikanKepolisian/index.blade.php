@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Pendidikan Kepolisian</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('personil.penpol.create') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="info-item d-flex mb-2">
                            <div class="label"><strong>Nama Lengkap</strong></div>
                            <div class="colon ml-2">:</div>
                            <div class="value ml-2 font-weight-bold">{{ $pendidikanKepolisian[0]->personel->nama_lengkap ?? '-' }}</div>
                        </div>
                        <table class="table border-0">
                            <thead>
                                <tr>
                                    <th>Tingkat</th>
                                    <th>Tahun</th>
                                    <th>Ijazah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendidikanKepolisian as $penpol)
                                <tr>
                                    <td>{{ $penpol->tingkat }}</td>
                                    <td>{{ $penpol->tahun }}</td>
                                    <td>
                                        @foreach(explode(',', $penpol->gambar) as $image)
                                        <a href="#" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('storage/pendidikanKepolisian/' . trim($image)) }}">
                                            <img src="{{ asset('storage/pendidikanKepolisian/' . trim($image)) }}" alt="{{ $image }}" style="width:100px; height:auto;">
                                        </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('personil.penpol.edit', $penpol->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('personil.penpol.destroy', $penpol->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
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

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Gambar Ijazah" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#imageModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var imageUrl = button.data('image');
            var modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
        });
    });
</script>

@endsection
