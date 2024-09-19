<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Informasi Personel</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            margin: 0; 
            padding: 0; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            background-color: #f4f4f4; 
            position: relative;
        }
        .card { 
            border: 1px solid #ddd; 
            padding: 15px; 
            border-radius: 5px; 
            background-color: #fff; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 800px; 
            position: relative;
            padding-top: 40px; /* Adjust to make space for header-title */
        }
        .header-title { 
            position: absolute;
            top: 15px;
            left: 15px;
            text-align: left;
            font-size: 5px;
            color: #333;
            max-width: calc(100% - 30px); /* Ensure it fits within the card */
            padding-right: 15px; /* Ensure it does not overlap */
        }
        .header-title h2 { 
            margin: 0;
            line-height: 1.2;
            text-align: center;
        }
        .card-header { 
            font-size: 10px; 
            margin-bottom: 10px; 
            text-align: center; 
        }
        .card-footer { 
            margin-top: 20px; 
            text-align: center; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        td { 
            padding: 10px; 
            vertical-align: top; 
        }
        img { 
            width: 100%; 
            max-width: 298px; 
            height: auto; 
            border-radius: 8px; 
        }
        .label { 
            font-weight: bold; 
            font-size: 15px;
        }
        .value { 
            margin-left: 10px; 
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header-title">
            <h2>KEPOLISIAN NEGARA REPUBLIK INDONESIA<br>
            DAERAH JAWA TIMUR<br>
            RESORT KOTA BANYUWANGI</h2>
        </div>
        <div class="card-header">
            <h1>DAFTAR RIWAYAT HIDUP</h1>  
        </div>
        <div class="card-body">
            @if ($personel)
                <table>
                    <tr>
                        <td style="width: 30%;">
                            <div class="info-item">
                                <div class="label">Foto Personel:</div>
                                <div class="value">
                                    <img src="{{ asset('storage/personil/' . $personel->gambar) }}" alt="Foto Personel">
                                </div>
                            </div>
                        </td>
                        <td style="width: 50%;">
                            <div class="info-item">
                                <div class="label">Nama Lengkap:</div>
                                <div class="value">{{ $personel->nama_lengkap }}</div>
                            </div>
                            <div class="info-item">
                                <div class="label">Jabatan:</div>
                                <div class="value">{{ $personel->jabatan->nama }}</div>
                            </div>
                            <div class="info-item">
                                <div class="label">Tempat, Tanggal Lahir:</div>
                                <div class="value">{{ $personel->tempat_lahir }}, {{ \Carbon\Carbon::parse($personel->tanggal_lahir)->format('d-m-Y') }}</div>
                            </div>
                            <div class="info-item">
                                <div class="label">Alamat Personel:</div>
                                <div class="value">{{ $personel->alamat_personel }}</div>
                            </div>
                            <div class="info-item">
                                <div class="label">Agama:</div>
                                <div class="value">{{ $personel->agama }}</div>
                            </div>
                            <div class="info-item">
                                <div class="label">Status Personel:</div>
                                <div class="value">{{ $personel->status }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
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
