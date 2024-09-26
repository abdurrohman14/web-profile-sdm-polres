@php
use Carbon\Carbon;
@endphp
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
                                    <img src="{{ public_path('storage/personil/' . $personel->gambar) }}" alt="Foto Personel">
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
                                <div class="value">{{ $personel->jabatan->nama }} / {{ $personel->subJabatan->nama }}</div>
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
                                <div class="label">Suku:</div>
                                <div class="value">{{ $personel->suku }}</div>
                            </div>
                            <div class="info-item">
                                <div class="label">Status Personel:</div>
                                <div class="value">{{ $personel->status }}</div>
                            </div>
                            <div class="info-item">
                                <div class="label">Lama Jabatan:</div>
                                <div class="value">{{ $lamaJabatan }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
                <h2>Pendidikan Kepolisian</h2>
            <ul>
                @foreach ($personel->pendidikanKepolisian as $pendidikan)
                    <li>{{ $pendidikan->tingkat }} ({{ $pendidikan->tahun }})</li>
                @endforeach
            </ul>
            <h2>Pendidikan Umum</h2>
            <ul>
                @foreach($personel->pendidikanUmum as $pendikum)
                <li>{{ $pendikum->tingkat }} ({{ $pendikum->nama_institusi }}) ({{ $pendikum->tahun}})
                @endforeach
            </ul>
            <h2>Riwayat Pangkat</h2>
            <ul>
                @foreach($personel->riwayatPangkat as $ripat)
                <li>{{ $ripat->pangkat }} {{ Carbon::parse($ripat->tmt)->format('d-m-Y') }}
                @endforeach
            </ul>
            <h2>Riwayat Jabatan</h2>
            <ul>
                @foreach($personel->riwayatJabatan as $rijab)
                <li>{{ $rijab->jabatan }} {{ Carbon::parse($rijab->tmt)->format('d-m-Y') }}
                @endforeach
            </ul>
            <h2>Pengembangan Pelatihan</h2>
            <ul>
                @foreach($personel->pengembanganPelatihan as $penlat)
                <li>{{ $penlat->dikbang }} {{ $penlat->tahun }}
                @endforeach
            </ul>
            <h2>Tanda Kehormatan</h2>
            <ul>
                @foreach($personel->tandaKehormatan as $tanker)
                <li>{{ $tanker->tanda_kehormatan }} {{ $tanker->tahun }}
                @endforeach
            </ul>
            <h2>Kemampuan Bahasa</h2>
            <ul>
                @foreach($personel->kemampuanBahasa as $mamba)
                <li>{{ $mamba->bahasa }} {{ $mamba->status }}
                @endforeach
            </ul>
            <h2>Penugasan Luar Struktur</h2>
            <ul>
                @foreach($personel->penugasanLuarStruktur as $penlu)
                <li>{{ $penlu->penugasan }} {{ $penlu->lokasi }}
                @endforeach
            </ul>
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
