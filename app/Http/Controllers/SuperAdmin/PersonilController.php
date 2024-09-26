<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Role;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Personel;
use App\Models\subJabatan;
use App\Models\subPnsPolri;
use Illuminate\Http\Request;
use App\Models\subPangkatPolri;
use App\Models\pangkat_pns_polri;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonilController extends Controller
{
    public function index(Request $request) {
        $jabatan = $request->input('jabatan');

        if($jabatan) {
            $personels = Personel::with('jabatan', 'subJabatan', 'pangkat', 'pangkatPnsPolri', 'user.role')
            ->whereHas('jabatan', function($query) use ($jabatan) {
                $query->where('nama', $jabatan);
            })->get();
        } else {
            $personels = Personel::with('jabatan', 'pangkat', 'pangkatPnsPolri', 'user.role')->get();
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
        $subPangkat = subPangkatPolri::all();
        // $pangkatPnsPolri = pangkat_pns_polri::all();
        // $subPnsPolri = subPnsPolri::all();
        $user = User::all();
        $roles = Role::all();
        return view('superadmin.personil.create_personil', [
            'jabatan' => $jabatan,
            'subJabatan' => $subJabatan,
            'pangkat' => $pangkat,
            'subPangkat' => $subPangkat,
            // 'pangkatPnsPolri' => $pangkatPnsPolri,
            // 'subPnsPolri' => $subPnsPolri,
            'user' => $user,
            'roles' => $roles,
            'title' => 'Tambah Personil'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'jabatan_id' => 'required|exists:jabatans,id',
            'sub_jabatan_id' => 'nullable|exists:sub_jabatans,id',
            'pangkat_id' => 'required|exists:pangkats,id',
            'sub_pangkat_id' => 'nullable|exists:sub_pangkat_polris,id',
            // 'pangkat_pns_polri_id' => 'nullable|exists:pangkat_pns_polris,id',
            // 'sub_pns_polri_id' => 'nullable|exists:sub_pns_polris,id',
            'role_id' => 'required|exists:roles,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:50',
            'nrp' => 'required|string|max:20|unique:personels,nrp,' . $request->id,
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'email_pribadi' => 'required|string|email|max:255|unique:personels,email_pribadi,' . $request->id,
            'email_dinas' => 'nullable|string|email|max:255|unique:personels,email_dinas,' . $request->id,
            'no_hp' => 'required|string|max:15|unique:personels,no_hp,' . $request->id,
            'status' => 'required|string',
            'suku' => 'nullable|string|max:20',
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
            'ukuran_baju' => 'nullable|integer',
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
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/personil', $imageName);
            $validateData['gambar'] = $imageName;
        }
        // Save data to the database
        try {
            // dd($request);
            $input = ([
                'name' => $request->nama_lengkap,
                'email' => $request->email_pribadi,
                'role_id' => $request->role_id,
                'jabatan_id' => $request->jabatan_id,
                'password' => bcrypt($request->nrp),
            ]);

            $user = User::create($input);
            $validateData['user_id'] = $user->id;

            $personels = Personel::create($validateData);

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
         // Ambil data personil berdasarkan ID
        $personels = Personel::findOrFail($id);

        // Ambil data yang diperlukan untuk form edit
        $jabatan = Jabatan::all();
        $subJabatan = subJabatan::all();
        $pangkat = Pangkat::all();
        $subPangkat = subPangkatPolri::all();
        // $pangkatPnsPolri = pangkat_pns_polri::all();
        // $subPnsPolri = subPnsPolri::all();
        $user = User::all();
        $roles = Role::all();

        return view('superadmin.personil.edit_personil', [
            'personels' => $personels,
            'jabatan' => $jabatan,
            'subJabatan' => $subJabatan,
            'pangkat' => $pangkat,
            'subPangkat' => $subPangkat,
            // 'pangkatPnsPolri' => $pangkatPnsPolri,
            // 'subPnsPolri' => $subPnsPolri,
            'user' => $user,
            'roles' => $roles,
            'title' => 'Edit Personil'
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
           'jabatan_id' => 'required|exists:jabatans,id',
            'sub_jabatan_id' => 'nullable|exists:sub_jabatans,id',
            'pangkat_id' => 'required|exists:pangkats,id',
            'sub_pangkat_id' => 'nullable|exists:sub_pangkat_polris,id',
            // 'pangkat_pns_polri_id' => 'nullable|exists:pangkat_pns_polris,id',
            // 'sub_pns_polri_id' => 'nullable|exists:sub_pns_polris,id',
            'role_id' => 'required|exists:roles,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:50',
            'nrp' => 'required|string|max:20|unique:personels,nrp,' . $id,
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'email_pribadi' => 'required|string|email|max:255|unique:personels,email_pribadi,' . $id,
            'email_dinas' => 'nullable|string|email|max:255|unique:personels,email_dinas,' . $id,
            'no_hp' => 'required|string|max:15|unique:personels,no_hp,' . $id,
            'status' => 'required|string',
            'suku' => 'nullable|string|max:20',
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
            'ukuran_baju' => 'nullable|integer',
            'sidik_jari_1' => 'nullable|string|max:255',
            'sidik_jari_2' => 'nullable|string|max:255',
            'nomor_keputusan_penyidik' => 'nullable|string|max:255',
            'kta' => 'nullable|string|max:255',
            'asabri' => 'nullable|string|max:255',
            'nik' => 'required|string|max:16|unique:personels,nik,' . $id,
            'npwp' => 'nullable|string|max:20|unique:personels,npwp,' . $id,
            'bpjs' => 'nullable|string|max:20|unique:personels,bpjs,' . $id,
            'nomor_kk' => 'nullable|string|max:20|unique:personels,nomor_kk,' . $id,
            'paspor' => 'nullable|string|max:9|unique:personels,paspor,' . $id,
            'akte_lahir' => 'nullable|string|max:255|unique:personels,akte_lahir,' . $id,
            'tmt_masa_dinas' => 'nullable|date|after_or_equal:tanggal_lahir',
        ]);
        
        $personels = Personel::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            Storage::delete('public/personil/'.$personels->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/personil/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        // Save data to the database
        try {

            // Update user details
            $user = User::findOrFail($personels->user_id);
            $user->update([
                'name' => $request->nama_lengkap,
                'email' => $request->email_pribadi,
                'role_id' => $request->role_id,
                'jabatan_id' => $request->jabatan_id,
                'password' => bcrypt($request->nrp),
            ]);

            // Update personel details
            $personels->update($validateData);

            return redirect()->route('view.personel')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withErrors('Gagal memperbarui data. Silakan coba lagi.' . $e->getMessage());
        }
    }

    public function delete($id) {
        DB::beginTransaction(); // Memulai transaksi

        try {
            // Temukan data personel dan hapus
            $personel = Personel::findOrFail($id);

            // Hapus foto personel
            if (file_exists(public_path('storage/personil/' . $personel->gambar))) {
                unlink(public_path('storage/personil/' . $personel->gambar));
            }
            
            // Temukan data user terkait dan hapus
            $user = User::where('id', $personel->user_id)->first();

            // Hapus personel terlebih dahulu
            $personel->delete();

            // Hapus user jika ada
            if ($user) {
                $user->delete();
            }

            DB::commit(); // Menyimpan perubahan jika semuanya berhasil
            return redirect()->route('view.personel')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack(); // Membatalkan perubahan jika terjadi kesalahan
            return back()->withErrors('Gagal menghapus data. Silakan coba lagi. ' . $e->getMessage());
        }
    }
}
