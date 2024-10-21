<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Personel;
use App\Models\subJabatan;
use App\Models\subPnsPolri;
use Illuminate\Http\Request;
use App\Models\subPangkatPolri;
use App\Mail\PensiunNotification;
use App\Models\pangkat_pns_polri;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\notifikasi;
use App\Http\Controllers\SuperAdmin\PangkatController;


class RoleController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function admin()
    {
        $jabatan_id = Auth::user()->jabatan_id;
        $totalPersonelBag = Personel::where('jabatan_id', $jabatan_id)->count();
        $personelMan = Personel::where('jabatan_id', $jabatan_id)->where('jenis_kelamin', 'Laki-laki')->count();
        $personelGirl = Personel::where('jabatan_id', $jabatan_id)->where('jenis_kelamin', 'Perempuan')->count();
        $personelPenghargaan = Personel::whereHas('TandaKehormatan')->count();

        // Personel yang akan segera pensiun (misalnya dalam 1 tahun ke depan)
        // $personelPensiun = Personel::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [57])->get();
        $personelPensiun = Personel::where(function ($query) {
            $query->whereHas('Pangkat', function ($query) {
                $query->whereIn('nama', ['Bintara', 'Tamtama']);
            })->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [58]);
        })->orWhere(function ($query) {
            $query->whereHas('Pangkat', function ($query) {
                $query->whereIn('nama', ['Perwira Pertama', 'Perwira Menengah']);
            })->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [60]);
        })->get(); // Gunakan get() untuk mengambil semua data
        
        foreach ($personelPensiun as $personel) {
            // Sekarang Anda bisa menggunakan foreach untuk melakukan loop
            echo $personel->nama;
        }        
        
        foreach ($personelPensiun as $personel) {
            if($personel !== null && $personel->email_pribadi !== null) {
                try {
                    Mail::to($personel->email_pribadi)->send(new PensiunNotification($personel));
                    Log::info("Email sent to {$personel->email_pribadi}");
                } catch (\Exception $e) {
                    Log::error("Error sending email to {$personel->email_pribadi}: {$e->getMessage()}");
                }
            } else {
                Log::info("Personel {$personel->nama_lengkap} does not have an email address.");
            }

            // Simpan notifikasi ke dalam database, Periksa apakah notifikasi sudah ada
            $notifikasi = notifikasi::where('personel_id', $personel->id)
                ->where('tipe', 'pensiun')
                ->first();

            if (!$notifikasi) {
                // Simpan notifikasi ke dalam database
                notifikasi::create([
                    'personel_id' => $personel->id,
                    'tipe' => 'pensiun',
                    'pesan' => 'Anda akan pensiun dalam waktu kurang dari 1 tahun.',
                    'sedang_dibaca' => false,
                ]);
            }
        }
        
        // Personel yang sudah terlalu lama di satu jabatan (misalnya lebih dari 5 tahun)
        $personelJabatanLama = Personel::where('jabatan_id', $jabatan_id)->whereRaw('TIMESTAMPDIFF(YEAR, tmt_masa_dinas, CURDATE()) > ?', [5])->count();

        // Personel yang belum mengikuti pelatihan wajib
        $personelBelumPelatihan = Personel::where('jabatan_id', $jabatan_id)
    ->whereDoesntHave('PengembanganPelatihan', function($query) {
        $query->where('dikbang', 'Pelatihan Wajib');
    })->count();

        return view('admin.admin', [
            'title' => 'Admin',
            'totalPersonelBag' => $totalPersonelBag,
            'personelMan' => $personelMan,
            'personelGirl' => $personelGirl,
            'personelPenghargaan' => $personelPenghargaan,
            'personelPensiun' => $personelPensiun->count(),
            'personelJabatanLama' => $personelJabatanLama,
            'personelBelumPelatihan' => $personelBelumPelatihan,
        ]);
    }

    public function superadmin()
    {
        $totalPersonel = Personel::count();
        $personelMan = Personel::where('jenis_kelamin', 'Laki-laki')->count();
        $personelGirl = Personel::where('jenis_kelamin', 'Perempuan')->count();
        $personelPenghargaan = Personel::whereHas('TandaKehormatan')->count();
        // Personel yang sudah terlalu lama di satu jabatan (misalnya lebih dari 5 tahun)
        $personelJabatanLama = Personel::whereRaw('TIMESTAMPDIFF(YEAR, tmt_masa_dinas, CURDATE()) > ?', [5])->count();
        // Personel yang belum mengikuti pelatihan wajib
        $personelBelumPelatihan = Personel::whereDoesntHave('PengembanganPelatihan', function($query) {
            $query->where('dikbang', 'Pelatihan Wajib');
        })->count();

        // Panggil controller Pangkat untuk cek kenaikan pangkat
        $pangkatController = new PangkatController();

        // Cek kenaikan pangkat untuk setiap personel
        $personels = Personel::with('pangkat')->get();
        $lamaJabatanData = [];
        foreach ($personels as $personel) {
            $lamaJabatan = $personel->getLamaJabatan();
            // logika untuk notifikasi kenaikan pangkat
            if ($lamaJabatan >= 3) {
                $notifikasi = Notifikasi::where('personel_id', $personel->id)
                ->where('tipe', 'kenaikan pangkat')
                ->first();

                if (!$notifikasi) {
                    Notifikasi::create([
                        'personel_id' => $personel->id,
                        'tipe' => 'kenaikan pangkat',
                        'pesan' => 'Anda sudah 3 tahun di jabatan ini. Pertimbangkan untuk mengajukan kenaikan pangkat.',
                    ]);
                }
            }
            // Ambil notifikasi kelayakan kenaikan pangkat
            $promotionNotification = $this->getPromotionNotifications($personel);
            if (!empty($promotionNotification)) {
                $notifikasi = Notifikasi::where('personel_id', $personel->id)
                    ->where('tipe', 'promosi')
                    ->first();

                if (!$notifikasi) {
                    Notifikasi::create([
                        'personel_id' => $personel->id,
                        'tipe' => 'promosi',
                        'pesan' => $promotionNotification['message'],
                        'sedang_dibaca' => false,
                    ]);
                }
            }
            $lamaJabatanData[] = [
                'nama' => $personel->nama_lengkap,
                'lama_jabatan' => $personel->getLamaJabatan(),
                'pangkat' => $personel->subPangkat ? $personel->subPangkat->nama : 'Tidak ada pangkat',
            ];
        }

        // Personel yang akan segera pensiun (misalnya dalam 1 tahun ke depan)
        // $personelPensiun = Personel::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [57])->get();
        $personelPensiun = Personel::where(function ($query) {
            $query->whereHas('Pangkat', function ($query) {
                $query->whereIn('nama', ['Bintara', 'Tamtama']);
            })->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [58]);
        })->orWhere(function ($query) {
            $query->whereHas('Pangkat', function ($query) {
                $query->where('nama', 'Perwira Pertama', 'Perwira Menengah');
            })->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [60]);
        })->get();
        
        foreach ($personelPensiun as $personel) {
            if($personel !== null && $personel->email_pribadi !== null) {
                try {
                    Mail::to($personel->email_pribadi)->send(new PensiunNotification($personel));
                    Log::info("Email sent to {$personel->email_pribadi}");
                } catch (\Exception $e) {
                    Log::error("Error sending email to {$personel->email_pribadi}: {$e->getMessage()}");
                }
            } else {
                Log::info("Personel {$personel->nama_lengkap} does not have an email address.");
            }

            // Simpan notifikasi ke dalam database, Periksa apakah notifikasi sudah ada
            $notifikasi = notifikasi::where('personel_id', $personel->id)
                ->where('tipe', 'pensiun')
                ->first();

            if (!$notifikasi) {
                // Simpan notifikasi ke dalam database
                notifikasi::create([
                    'personel_id' => $personel->id,
                    'tipe' => 'pensiun',
                    'pesan' => 'Anda akan pensiun dalam waktu kurang dari 1 tahun.',
                    'sedang_dibaca' => false,
                ]);
            }
        }

        return view('superadmin.superadmin', [
            'title' => 'Super Admin',
            'totalPersonel' => $totalPersonel,
            'personelMan' => $personelMan,
            'personelGirl' => $personelGirl,
            'personelPenghargaan' => $personelPenghargaan,
            'personelPensiun' => $personelPensiun->count(),
            'personelJabatanLama' => $personelJabatanLama,
            'personelBelumPelatihan' => $personelBelumPelatihan,
            'lamaJabatanData' => $lamaJabatanData,
        ]);
    }

    public function personil()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();
        // Ambil data personel yang terkait dengan pengguna
        $personel = Personel::where('user_id', $userId)->first();
        
        // Periksa apakah data personel ditemukan
        if (!$personel) {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk pengguna ini.');
        };

        // Ambil notifikasi yang belum dibaca untuk personil yang sedang login
        $notifications = notifikasi::where('personel_id', $personel->id)
                                        ->where('sedang_dibaca', false)
                                        ->get();

        // Tandai semua notifikasi sebagai telah dibaca setelah ditampilkan
        notifikasi::where('personel_id', $personel->id)->update(['sedang_dibaca' => true]);

        // Periksa kelayakan kenaikan pangkat
        $promotionNotifications = $this->getPromotionNotifications($personel);
        return view('personil.personil', [
            'personel' => $personel,
            'notifications' => $notifications,
            'title' => 'Dashboard',
            'promotionNotifications' => $promotionNotifications,
        ]);
    }

    public function show($id) {
        $personel = Personel::with('jabatan', 'pangkat', 'pangkatPnsPolri')->findOrFail($id);
        return view('personil.detail', [
            'personel' => $personel,
            'title' => 'Detail Personel',
        ]);
    }

    private function getPromotionNotifications($personel) {
        // logika untuk mengecek kelayakan kenaikan pangkat
        $promotionEligible = false;

        // Misalkan jika pangkat saat ini adalah 'Bintara' dan telah 3 tahun,
        // berikan notifikasi kenaikan pangkat
        if ($personel->pangkat->nama === 'Bintara' && $this->hasBeenInPositionForYears($personel, 3)) {
            $promotionEligible = true;
        }

        return $promotionEligible ? ['message' => 'Selamat! Anda memenuhi syarat untuk kenaikan pangkat.'] : [];
    }

    // Contoh metode untuk memeriksa waktu dalam jabatan
    private function hasBeenInPositionForYears($personel, $years) {
        $tmt = new \Carbon\Carbon($personel->tmt_status); // Asumsi tmt_status ada di model Personel
        return $tmt->diffInYears(now()) >= $years;
    }

    public function edit($id) {
        $personel = Personel::findOrFail($id);

        // Ambil data yang diperlukan untuk form edit
        $jabatan = Jabatan::all();
        $subJabatan = subJabatan::all();
        $pangkat = Pangkat::all();
        $subPangkat = subPangkatPolri::all();
        // $pangkatPnsPolri = pangkat_pns_polri::all();
        // $subPnsPolri = subPnsPolri::all();
        $user = User::all();
        $roles = Role::all();

        return view('personil.edit', [
            'personel' => $personel,
            'jabatan' => $jabatan,
            'subJabatan' => $subJabatan,
            'pangkat' => $pangkat,
            'subPangkat' => $subPangkat,
            // 'pangkatPnsPolri' => $pangkatPnsPolri,
            // 'subPnsPolri' => $subPnsPolri,
            'user' => $user,
            'roles' => $roles,
            'title' => 'Edit Personel',
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
            'role_id' => 'sometimes|exists:roles,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:50',
            'nrp' => 'required|string|max:20|unique:personels,nrp,' . $id,
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'email_pribadi' => 'required|string|email|max:255|unique:personels,email_pribadi,' . $id,
            'email_dinas' => 'nullable|string|email|max:255|unique:personels,email_dinas,' . $id,
            'no_hp' => 'required|string|max:15|unique:personels,no_hp,' . $id,
            'status' => 'required|string|in:Aktif,Tidak Aktif',
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
            'ukuran_baju' => 'nullable|integer|min:1|max:50',
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

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/personil', $imageName);
            $validateData['gambar'] = $imageName;
        }

        // Save data to the database
        try {
            $personel = Personel::findOrFail($id);
            // Jika role adalah 'personil', jangan rubah role_id
            if($personel->role->name === 'personil') {
                $request->merge(['role_id' => $personel->role_id]);
            }

            // Update user details
            $user = User::findOrFail($personel->user_id);
            $user->update([
                'name' => $request->nama_lengkap,
                'email' => $request->email_pribadi,
                'role_id' => $request->role_id,
                'jabatan_id' => $request->jabatan_id,
                'password' => bcrypt($request->nrp),
            ]);

            // Update personel details
            $personel->update($validateData);

            return redirect()->route('personil')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withErrors('Gagal memperbarui data. Silakan coba lagi.' . $e->getMessage());
        }
    }
}
