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
            margin: 1px 0; 
            line-height: 1.2;
            text-align: center;
            font-size: 10px;
        }
        .card-header { 
            margin: 70px 0; 
            margin-bottom: 10px;
            line-height: 1.2;
            text-align: center;
            font-size: 10px;
        }
        .card-body {
            margin-top: 1px; 
            padding-top: 1px; 
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
        .info-item {
            display: flex;
            align-items: center; 
            margin-bottom: 5px; 
        }
        .label {
            font-weight: bold;
            font-size: 12px;
            margin-right: 10px; 
            white-space: nowrap;
            display: inline-block;
            width: 180px; 
        }
        .col {
            display: inline-block;  /* Allows spacing to be maintained */
            margin-right: 10px;    /* Space between the colon and value */
        }
        .value {
            display: inline-block;
            font-size: 12px;
            flex: 1; 
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
        <hr style="border: 1px solid black; margin: 25px auto; width: 34%; float: left;">
        <div class="card-header">
            <h1>DAFTAR RIWAYAT HIDUP</h1>  
        </div>
        
        <div class="card-body">
            @if ($personel)
                <table>
                    <tr>
                        <td style="width: 30%;">
                            <div class="info-item">
                                <div class="value">
                                    <img src="{{ public_path('storage/personil/' . $personel->gambar) }}" alt="Foto Personel">
                                </div>
                            </div>
                        </td>
                        <td style="width: 70%;">
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Nama Lengkap</span>
                                <span class="col">:</span>
                                <span class="value">{{ $personel->nama_lengkap }}</span>
                            </div>                            
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Jabatan</span>
                                <span class="col">:</span>
                                <span class="value">{{ $personel->jabatan->nama }} / {{ $personel->subJabatan->nama }}</span>
                            </div>     
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Pangkat</span>
                                <span class="col">:</span>
                                <span class="value">{{ $personel->pangkat->nama }}</span>
                            </div>         
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Lama Jabatan</span>
                                <span class="col">:</span>
                                <span class="value">{{ $lamaJabatan }}</span>
                            </div>                   
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Tempat, Tanggal Lahir</span>
                                <span class="col">:</span>
                                <span class="value">{{ $personel->tempat_lahir }}, {{ \Carbon\Carbon::parse($personel->tanggal_lahir)->format('d-m-Y') }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Agama</span>
                                <span class="col">:</span>
                                <span class="value">{{ $personel->agama }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Suku</span>
                                <span class="col">:</span>
                                <span class="value">{{ $personel->suku }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label" style="font-weight: bold; margin-right: 10px;">Status Personel</span>
                                <span class="col">:</span>
                                <span class="value">{{ $personel->status }}</span>
                            </div>
                        </td>
                    </tr>
                </table>
                
                <div class="table-container" style="font-size: 12px;">
                    <div class="table-box">
                        <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px;">
                            <thead>
                                <tr>
                                    <th colspan="2" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Pendidikan Kepolisian</th>
                                </tr>
                                <tr>
                                    <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Tingkat</th>
                                    <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personel->pendidikanKepolisian as $pendidikan)
                                    <tr>
                                        <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $pendidikan->tingkat }}</td>
                                        <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $pendidikan->tahun }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                    <div class="table-box">
                        <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px;">
                            <thead>
                                <tr>
                                    <th colspan="3" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Pendidikan Umum</th>
                                </tr>
                                <tr>
                                    <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Tingkat</th>
                                    <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Nama Institusi</th>
                                    <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($personel->pendidikanUmum as $pendikum)
                                    <tr>
                                        <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $pendikum->jenjang->nama }}</td>
                                        <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $pendikum->nama_institusi }}</td>
                                        <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $pendikum->tahun }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Riwayat Pangkat</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Pangkat</th>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">TMT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personel->riwayatPangkat as $ripat)
                            <tr>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $ripat->pangkat }}</td>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ Carbon::parse($ripat->tmt)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Riwayat Jabatan</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Jabatan</th>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">TMT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personel->riwayatJabatan as $rijab)
                            <tr>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $rijab->jabatan }}</td>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ Carbon::parse($rijab->tmt)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Pengembangan Pelatihan</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Dikbang</th>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personel->pengembanganPelatihan as $penlat)
                            <tr>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $penlat->dikbang }}</td>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $penlat->tahun }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Tanda Kehormatan</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Tanda Kehormatan</th>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personel->tandaKehormatan as $tanker)
                            <tr>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $tanker->tanda_kehormatan }}</td>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $tanker->tmt }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Kemampuan Bahasa</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Bahasa</th>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personel->kemampuanBahasa as $mamba)
                            <tr>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $mamba->bahasa }}</td>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $mamba->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <table style="width: 95%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border: 1px solid #D4AC0D; padding: 8px; text-align: left; background-color: rgba(212, 172, 13, 0.3);">Penugasan Luar Struktur</th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Penugasan</th>
                            <th style="border: 1px solid #D4AC0D; padding: 8px; text-align: left;">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personel->penugasanLuarStruktur as $penlu)
                            <tr>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $penlu->penugasan }}</td>
                                <td style="border: 1px solid #D4AC0D; padding: 8px;">{{ $penlu->lokasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                

            @else
                <p>Data tidak ditemukan untuk pengguna ini.</p>
            @endif
        </div>
        <div style="text-align: center; margin: 20px 0; font-size: 12px;">
            <p>Selesai.</p>
        </div>
    </div>
</body>
</html>
