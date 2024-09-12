<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Informasi Personel</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .info-item { margin-bottom: 10px; }
        .label { font-weight: bold; }
        .value { margin-left: 10px; }
        .card { border: 1px solid #ddd; padding: 15px; border-radius: 5px; }
        .card-header { font-size: 18px; margin-bottom: 10px; }
        .card-footer { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>Detail Informasi Personel</h1>
        </div>
        <div class="card-body">
            @if ($personel)
                <div class="info-item">
                    <div class="label">Nama Lengkap:</div>
                    <div class="value">{{ $personel->nama_lengkap }}</div>
                </div>
                <div class="info-item">
                    <div class="label">Jabatan:</div>
                    <div class="value">{{ $personel->jabatan->nama }}</div>
                </div>
                <!-- Add more fields as needed -->
                <div class="info-item">
                    <div class="label">Alamat Personel:</div>
                    <div class="value">{{ $personel->alamat_personel }}</div>
                </div>
                <!-- Add remaining fields following the same pattern -->
            @else
                <p>Data tidak ditemukan untuk pengguna ini.</p>
            @endif
        </div>
        <div class="card-footer">
            <p>Terima kasih.</p>
        </div>
    </div>
</body>
</html>
