<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Role;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Personel;
use App\Models\subJabatan;
use Illuminate\Http\Request;
use App\Models\pangkat_pns_polri;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PersonilController extends Controller
{
    public function index(Request $request) {
        $jabatan = $request->input('jabatan');

        if($jabatan) {
            $personels = Personel::with('jabatan', 'subJabatan', 'pangkat', 'pangkatPnsPolri', 'user')
            ->whereHas('jabatan', function($query) use ($jabatan) {
                $query->where('nama', $jabatan);
            })->get();
        } else {
            $personels = Personel::with('jabatan', 'pangkat', 'pangkatPnsPolri', 'user')->get();
        }

        return view('superadmin.personil.view_personil', [
            'personels' => $personels,
            'jabatan' => $jabatan,
            'title' => 'Data Personil'
        ]);
    }

    public function create() {
        $jabatan = Jabatan::all();
        $subJabatan = subJabatan::all();
        $pangkat = Pangkat::all();
        $pangkatPnsPolri = pangkat_pns_polri::all();
        $roles = Role::all();
        return view('superadmin.personil.create_personil', [
            'jabatan' => $jabatan,
            'subJabatan' => $subJabatan,
            'pangkat' => $pangkat,
            'pangkatPnsPolri' => $pangkatPnsPolri,
            'roles' => $roles,
            'title' => 'Tambah Personil'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'jabatan_id' => 'required|exists:jabatans,id',
            'sub_jabatan_id' => 'nullable|exists:sub_jabatans,id',
            'pangkat_id' => 'required|exists:pangkats,id',
            'pangkat_pns_polri_id' => 'nullable|exists:pangkat_pns_polris,id',
            'role_id' => 'required|exists:roles,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:50',
            'nrp' => 'required|string|max:20|unique:personels,nrp,' . $request->id,
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'email_pribadi' => 'required|string|email|max:255|unique:personels,email_pribadi,' . $request->id,
            'email_dinas' => 'nullable|string|email|max:255|unique:personels,email_dinas,' . $request->id,
            'no_hp' => 'required|string|max:15|unique:personels,no_hp,' . $request->id,
            'status' => 'required|string|in:aktif,non-aktif',
            'tmt_status' => 'nullable|date|after_or_equal:tanggal_lahir',
            'golongan_darah' => 'nullable|string|in:A,B,AB,O',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'status_pernikahan' => 'required|string|in:Belum Menikah,Menikah,Duda,Janda',
            'anak_ke' => 'nullable|integer|min:1',
            'agama' => 'required|string|max:50|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'alamat_personel' => 'nullable|string|max:255',
            'lkhpn' => 'nullable|string|max:255',
            'jenis_rambut' => 'nullable|string|max:50',
            'warna_mata' => 'nullable|string|max:50',
            'warna_kulit' => 'nullable|string|max:50',
            'warna_rambut' => 'nullable|string|max:50',
            'nama_ibu' => 'nullable|string|max:255',
            'telepon_ortu' => 'nullable|string|max:15',
            'alamat_ortu' => 'nullable|string|max:255',
            'tinggi' => 'nullable|integer|min:100|max:250',
            'berat' => 'nullable|integer|min:30|max:200',
            'ukuran_topi' => 'nullable|integer|min:1|max:20',
            'ukuran_celana' => 'nullable|integer|min:1|max:50',
            'ukuran_sepatu' => 'nullable|integer|min:1|max:50',
            'ukuran_baju' => 'nullable|integer|min:1|max:50',
            'sidik_jari_1' => 'nullable|string|max:255',
            'sidik_jari_2' => 'nullable|string|max:255',
            'nomor_keputusan_penyidik' => 'nullable|string|max:255',
            'kta' => 'nullable|string|max:255',
            'asabri' => 'nullable|string|max:255',
            'nik' => 'required|string|max:16|unique:personels,nik,' . $request->id,
            'npwp' => 'nullable|string|max:20|unique:personels,npwp,' . $request->id,
            'bpjs' => 'nullable|string|max:20|unique:personels,bpjs,' . $request->id,
            'nomor_kk' => 'nullable|string|max:20|unique:personels,nomor_kk,' . $request->id,
            'paspor' => 'nullable|string|max:9|unique:personels,paspor,' . $request->id,
            'akte_lahir' => 'nullable|string|max:255|unique:personels,akte_lahir,' . $request->id,
            'tmt_masa_dinas' => 'nullable|date|after_or_equal:tanggal_lahir',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/personil', $fotoName);
            $validateData['foto'] = $fotoName;
        }
        // Save data to the database
        try {
            $personel = new Personel();
            $personel->fill($validateData);
            $personel->save();
    
            return redirect()->route('view.personel')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
    
            return back()->withErrors('Gagal menambahkan data. Silakan coba lagi.' . $e->getMessage());
        }
    }

    public function show($id) {
        $personels = Personel::find($id);
        return view('superadmin.personil.detail_personil', [
            'personels' => $personels,
            'title' => 'Detail personil'
        ]);
    }

    public function edit($id) {
        $personels = Personel::find($id);
        $jabatans = Jabatan::all();
        $pangkats = Pangkat::all();
        $pangkatPnsPolri = pangkat_pns_polri::all();
        $roles = Role::all();
        
        return view('superadmin.personil.edit_personil', [
            'personels' => $personels,
            'jabatans' => $jabatans,
            'pangkats' => $pangkats,
            'pangkatPnsPolri' => $pangkatPnsPolri,
            'roles' => $roles,
            'title' => 'Edit Personil'
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
           'jabatan_id' => 'required|exists:jabatans,id',
            'pangkat_id' => 'required|exists:pangkats,id',
            'pangkat_pns_polri_id' => 'nullable|exists:pangkat_pns_polris,id', // nullable jika personel bukan PNS Polri
            'role_id' => 'required|exists:roles,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:50',
            'nrp' => 'required|string|max:20|unique:personels,nrp,' . $request->id,
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'email_pribadi' => 'required|string|email|max:255|unique:personels,email_pribadi,' . $request->id,
            'email_dinas' => 'nullable|string|email|max:255|unique:personels,email_dinas,' . $request->id,
            'no_hp' => 'required|string|max:15|unique:personels,no_hp,' . $request->id,
            'status' => 'required|string|in:aktif,non-aktif',
            'tmt_status' => 'nullable|date|after_or_equal:tanggal_lahir',
            'golongan_darah' => 'nullable|string|in:A,B,AB,O',
            'jenis_kelamin' => 'required|string|in:L,P',
            'status_pernikahan' => 'required|string|in:single,married,divorced',
            'anak_ke' => 'nullable|integer|min:1',
            'agama' => 'required|string|max:50',
            'alamat_personel' => 'nullable|string|max:255',
            'lkhpn' => 'nullable|string|max:255',
            'jenis_rambut' => 'nullable|string|max:50',
            'warna_mata' => 'nullable|string|max:50',
            'warna_kulit' => 'nullable|string|max:50',
            'warna_rambut' => 'nullable|string|max:50',
            'nama_ibu' => 'nullable|string|max:255',
            'telepon_ortu' => 'nullable|string|max:15',
            'alamat_ortu' => 'nullable|string|max:255',
            'tinggi' => 'nullable|integer|min:100|max:250',
            'berat' => 'nullable|integer|min:30|max:200',
            'ukuran_topi' => 'nullable|integer|min:1|max:10',
            'ukuran_celana' => 'nullable|integer|min:1|max:10',
            'ukuran_sepatu' => 'nullable|integer|min:1|max:50',
            'ukuran_baju' => 'nullable|integer|min:1|max:10',
            'sidik_jari_1' => 'nullable|string|max:255',
            'sidik_jari_2' => 'nullable|string|max:255',
            'nomor_keputusan_penyidik' => 'nullable|string|max:255',
            'kta' => 'nullable|string|max:255',
            'asabri' => 'nullable|string|max:255',
            'nik' => 'required|string|max:16|unique:personels,nik,' . $request->id,
            'npwp' => 'nullable|string|max:20|unique:personels,npwp,' . $request->id,
            'bpjs' => 'nullable|string|max:20|unique:personels,bpjs,' . $request->id,
            'nomor_kk' => 'nullable|string|max:20|unique:personels,nomor_kk,' . $request->id,
            'paspor' => 'nullable|string|max:9|unique:personels,paspor,' . $request->id,
            'akte_lahir' => 'nullable|string|max:255|unique:personels,akte_lahir,' . $request->id,
            'tmt_masa_dinas' => 'nullable|date|after_or_equal:tanggal_lahir',
        ]);

        $personels = Personel::find($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($personels->foto) {
                Storage::delete('public/' . $personels->foto);
            }
            $foto = $request->file('foto');
            $fotoName = time().'.'.$foto->getClientOriginalExtension();
            $foto->storeAs('public/personil', $fotoName);
            $validateData['foto'] =$fotoName;
        }
        
        $personels->jabatan_id = $validateData['jabatan_id'];
        $personels->pangkat_id = $validateData['pangkat_id'];
        $personels->pangkat_pns_polri_id = $validateData['pangkat_pns_polri_id'];
        $personels->role_id = $validateData['role_id'];
        $personels->nama_lengkap = $validateData['nama_lengkap'];
        $personels->nama_panggilan = $validateData['nama_panggilan'];
        $personels->nrp = $validateData['nrp'];
        $personels->tempat_lahir = $validateData['tempat_lahir'];
        $personels->tanggal_lahir = $validateData['tanggal_lahir'];
        $personels->email_pribadi = $validateData['email_pribadi'];
        $personels->email_dinas = $validateData['email_dinas'];
        $personels->no_hp = $validateData['no_hp'];
        $personels->status = $validateData['status'];
        $personels->tmt_status = $validateData['tmt_status'];
        $personels->golongan_darah = $validateData['golongan_darah'];
        $personels->jenis_kelamin = $validateData['jenis_kelamin'];
        $personels->status_pernikahan = $validateData['status_pernikahan'];
        $personels->anak_ke = $validateData['anak_ke'];
        $personels->agama = $validateData['agama'];
        $personels->lkhpn = $validateData['lkhpn'];
        $personels->jenis_rambut = $validateData['jenis_rambut'];
        $personels->warna_mata = $validateData['warna_mata'];
        $personels->warna_kulit = $validateData['warna_kulit'];
        $personels->warna_rambut = $validateData['warna_rambut'];
        $personels->nama_ibu = $validateData['nama_ibu'];
        $personels->telepon_ortu = $validateData['telepon_ortu'];
        $personels->alamat_ortu = $validateData['alamat_ortu'];
        $personels->tinggi = $validateData['tinggi'];
        $personels->berat = $validateData['berat'];
        $personels->ukuran_topi = $validateData['ukuran_topi'];
        $personels->ukuran_celana = $validateData['ukuran_celana'];
        $personels->ukuran_sepatu = $validateData['ukuran_sepatu'];
        $personels->ukuran_baju = $validateData['ukuran_baju'];
        $personels->sidik_jari_1 = $validateData['sidik_jari_1'];
        $personels->sidik_jari_2 = $validateData['sidik_jari_2'];
        $personels->nomor_keputusan_penyidik = $validateData['nomor_keputusan_penyidik'];
        $personels->kta = $validateData['kta'];
        $personels->asabri = $validateData['asabri'];
        $personels->nik = $validateData['nik'];
        $personels->npwp = $validateData['npwp'];
        $personels->bpjs = $validateData['bpjs'];
        $personels->nomor_kk = $validateData['nomor_kk'];
        $personels->paspor = $validateData['paspor'];
        $personels->akte_lahir = $validateData['akte_lahir'];
        $personels->tmt_masa_dinas = $validateData['tmt_masa_dinas'];

        if(isset($validateData['foto'])) {
            $personels->foto = $validateData['foto'];
        }

        $personels->save();

        return redirect()->route('view.personel')->with('success', 'Data berhasil ditambahkan');
    }

    public function delete($id) {
        try {
            $personel = Personel::findOrFail($id);
            $personel->delete();
            return redirect()->route('view.personel')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors('Gagal menghapus data. Silakan coba lagi. ' . $e->getMessage());
        }
    }
}
