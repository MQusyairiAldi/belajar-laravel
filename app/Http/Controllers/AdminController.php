<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku;
use App\Models\dosen;
use App\Models\berita;
use App\Models\peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    //-----TAMBAH ADMIN------//
    public function tambah()
    {
        // Fungsi ini mengarahkan pengguna ke tampilan untuk menambah data admin.
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request)
    {
        // Validasi input dari formulir penambahan admin.
        $request->validate([
            'name' => 'required', // Nama admin wajib diisi.
            'email' => 'required|email', // Email wajib diisi dan harus berformat email.
            'jenisKelamin' => 'required', // Jenis kelamin wajib diisi.
            'password' => 'required|min:8|max:20|confirmed',//minimal pass 8, max pass 20
        ]);
    
        // Membuat instansi objek User (model) untuk menyimpan data admin baru.
        $user = new User;
    
        // Menyimpan data dari formulir ke dalam objek User.
        $user->name = $request->name; // Menyimpan nama admin.
        $user->email = $request->email; // Menyimpan email admin.
        $user->level = 'admin'; // Menyimpan level admin (misalnya, "admin").
        $user->jenis_kelamin = $request->jenisKelamin; // Menyimpan jenis kelamin admin.
        $user->password = Hash::make($request->password); // Mengenkripsi password admin sebelum disimpan.
    
        // Menyimpan data admin baru ke dalam database.
        $user->save();
    
        // Memeriksa apakah operasi penyimpanan berhasil atau tidak, kemudian memberikan respons sesuai hasilnya.
        if ($user) {
            // Jika berhasil, pengguna diarahkan kembali dengan pesan sukses.
            return back()->with('success', 'Admin baru berhasil ditambah!');
        } else {
            // Jika gagal, pengguna diarahkan kembali dengan pesan gagal.
            return back()->with('failed', 'Gagal menambah admin baru!');
        }
        
    }


    
    //---- Edit Admin -----
public function editAdmin($id)
{
    // Mencari data admin berdasarkan ID yang diberikan.
    $data = User::find($id);
    
    // Mengarahkan pengguna ke tampilan edit dengan data admin yang akan diedit.
    return view('admin.edit', compact('data'));
}

public function postEditAdmin(Request $request, $id)
{
    // Validasi input yang diterima dari formulir edit admin.
    $request->validate([
        'name' => 'required', // Nama admin wajib diisi.
        'email' => 'required|email:dns', // Email wajib diisi dan harus berformat email.
        'jenisKelamin' => 'required', // Jenis kelamin wajib diisi.
    ]);
    
    // Mencari data admin berdasarkan ID yang diberikan.
    $user = User::find($id);
    
    // Mengupdate data admin dengan nilai yang baru.
    $user->name = $request->name; // Mengupdate nama admin.
    $user->email = $request->email; // Mengupdate email admin.
    $user->jenis_kelamin = $request->jenisKelamin; // Mengupdate jenis kelamin admin.
    $user->save(); // Menyimpan perubahan ke dalam database.

    // Memeriksa apakah operasi penyimpanan berhasil atau tidak, kemudian memberikan respons sesuai hasilnya.
    if ($user) {
        // Jika berhasil, pengguna diarahkan kembali dengan pesan sukses.
        return back()->with('success', 'Data admin berhasil diupdate!');
    } else {
        // Jika gagal, pengguna diarahkan kembali dengan pesan gagal.
        return back()->with('failed', 'Gagal mengupdate data admin!');
    }
}

public function deleteAdmin($id)
{
    // Mencari data admin berdasarkan ID yang diberikan.
    $data = User::find($id);
    
    // Menghapus data admin.
    $data->delete();
    
    // Memeriksa apakah operasi penghapusan berhasil atau tidak, kemudian memberikan respons sesuai hasilnya.
    if ($data) {
        // Jika berhasil, pengguna diarahkan kembali dengan pesan sukses.
        return back()->with('success', 'Data berhasil dihapus!');
    } else {
        // Jika gagal, pengguna diarahkan kembali dengan pesan gagal.
        return back()->with('failed', 'Gagal menghapus data!');
    }
}


    //   ----Admin Tambah buku

    public function adminBuku(Request $request) {
        // Mengambil kata kunci pencarian dari permintaan (request)
        $search = $request->input('search');
    
        // Mencari buku berdasarkan judul yang cocok dengan kata kunci pencarian
        $data = Buku::where(function ($query) use ($search) {
            $query->where('judul_buku', 'LIKE', '%' . $search . '%');
        })->paginate(5);
        // Mengirim data hasil pencarian ke tampilan 'admin.buku'
        return view('admin.buku', compact('data'));
    }
    
    public function tambahBuku() {
        // Menampilkan halaman tambah buku
        return view('admin.tambahBuku');
    }
    
    public function postTambahBuku(Request $request) {
        // Validasi data yang diinputkan oleh pengguna
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'required|image|max:5120', // Gambar harus berupa gambar dan ukuran maksimum 5MB
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);
    
        // Membuat objek Buku baru
        $buku = new Buku;
    
        // Mengisi properti-properti objek dengan data dari formulir
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori;
    
        // Mengelola unggahan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $buku->gambar = $filename;
        }
    
        // Menyimpan objek Buku ke database
        $buku->save();
    
        // Mengembalikan pesan ke halaman sebelumnya
        if ($buku) {
            return back()->with('success', 'Buku baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }
    


    // ------EDIT BUKU
    public function editBuku($id) {
        // Mengambil data buku yang akan diedit berdasarkan ID
        $data = Buku::find($id);

        
    
        // Menampilkan halaman edit buku dengan data buku yang dipilih
        return view('admin.editBuku', compact('data'));
    }
    
    public function postEditBuku(Request $request, $id) {
        // Validasi data yang diinputkan oleh pengguna untuk edit buku
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'image|max:5120', // Gambar opsional, ukuran maksimum 5MB
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);
    
        // Mengambil data buku yang akan diedit berdasarkan ID
        $buku = Buku::find($id);
    
        // Mengisi properti-properti objek Buku dengan data dari formulir edit
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori;
    
        // Mengelola unggahan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
    
            // Menghapus gambar lama jika ada
            $oldFilePath = public_path('images/') . $buku->gambar;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
    
            $buku->gambar = $filename;
        }
    
        // Menyimpan objek Buku yang sudah diubah ke database
        $buku->save();
    
        // Mengembalikan pesan ke halaman sebelumnya
        if ($buku) {
            return back()->with('success', 'Buku berhasil diupdate!');
        } else {
            return back()->with('failed', 'Buku gagal diupdate!');
        }
    }
    
    public function deleteBuku($id) {
        // Mengambil data buku yang akan dihapus berdasarkan ID
        $buku = Buku::find($id);
    
        // Menghapus gambar yang terkait dengan buku
        if ($buku->gambar) {
            $filePath = public_path('images/') . $buku->gambar;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    
        // Menghapus data buku dari database
        $buku->delete();
    
        // Mengembalikan pesan ke halaman sebelumnya
        if ($buku) {
            return back()->with('success', 'Data buku berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data buku!');
           
        }
    }

      public function admindosen(Request $request)
    {
        // Mengambil kata kunci pencarian dari permintaan (request)
        $search = $request->input('search');

        // Mencari buku berdasarkan judul yang cocok dengan kata kunci pencarian
        $data = Dosen::where(function ($query) use ($search) {
    $query->where('nama', 'LIKE', '%' . $search . '%');
})->paginate(5);


        // Mengirim data hasil pencarian ke tampilan 'admin.berita'
        return view('admin.dosen', compact('data'));
    }

    //1. tambah dosen
    public function tambahdosen()
    {
        // Menampilkan halaman tambah buku
        return view('admin.tambahdosen');
    }

    public function postTambahdosen(Request $request)
    {
        // Validasi data yang diinputkan oleh pengguna
        $request->validate([
            'gambar' => 'required|image|max:5120',
            'id_dosen' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'tanggal_lahir'=> 'required',
            'no_hp'=> 'required',
        ]);

        // Membuat objek Buku baru
        $dosen = new Dosen;

        // Mengisi properti-properti objek dengan data dari formulir
        $dosen->id_dosen = $request->id_dosen;
        $dosen->nama = $request->nama;
        $dosen->jurusan = $request->jurusan;
        $dosen->jurusan = $request->jurusan;
        $dosen->tanggal_lahir = $request->tanggal_lahir;
        $dosen->no_hp = $request->no_hp;


        // Mengelola unggahan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $dosen->gambar = $filename;
        }

        // Menyimpan objek Buku ke database
        $dosen->save();

        // Mengembalikan pesan ke halaman sebelumnya
        if ($dosen) {
            return back()->with('success', 'dosen baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }

    public function adminberita(Request $request)
    {
        // Mengambil kata kunci pencarian dari permintaan (request)
        $search = $request->input('search');

        // Mencari buku berdasarkan judul yang cocok dengan kata kunci pencarian
        $data = Berita::where(function ($query) use ($search) {
    $query->where('judul', 'LIKE', '%' . $search . '%');
})->paginate(5);


        // Mengirim data hasil pencarian ke tampilan 'admin.berita'
        return view('admin.berita', compact('data'));
    }

    //1. tambah dosen
    public function tambahberita()
    {
        // Menampilkan halaman tambah buku
        return view('admin.tambahberita');
    }

    public function postTambahberita(Request $request)
    {
        // Validasi data yang diinputkan oleh pengguna
        $request->validate([
            'gambar' => 'required|image|max:5120',
            'judul' => 'required',
            'tanggal' => 'required',
            'narasi' => 'required',
            
        ]);

        // Membuat objek Buku baru
        $berita = new Berita;

        // Mengisi properti-properti objek dengan data dari formulir
        $berita->judul = $request->judul;
        $berita->tanggal = $request->tanggal;
        $berita->narasi = $request->narasi;
       
       


        // Mengelola unggahan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $berita->gambar = $filename;
        }

        // Menyimpan objek Buku ke database
        $berita->save();

        // Mengembalikan pesan ke halaman sebelumnya
        if ($berita) {
            return back()->with('success', 'berita baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }


    public function adminPeminjaman(Request $request, ChartPeminjaman $chartPeminjaman) {
    $search = $request->input('search');
    $data = Peminjaman::where(function($query) use ($search) {

        $query->where('id_user', 'LIKE', '%' . $search . '%');
    })->paginate(5);
    return view('admin.peminjaman', compact('data', 'chart'));
    }

    public function tambahPeminjaman() {
    return view('admin.tambahPeminjaman');
}

public function postTambahPeminjaman(Request $request) {
    $request->validate([
        'idUser' => 'required',
        'kodeBuku' => 'required|int',
        'tanggalPeminjaman' => 'required|date',
        'tanggalPengembalian' => 'required|date',
    ]);

    $peminjaman = new Peminjaman;
    $peminjaman->id_user = $request->idUser;
    $peminjaman->id_buku = $request->kodeBuku;
    $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
    $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
    $peminjaman->status = 'Belum Dikembalikan';
    $peminjaman->save();

    if ($peminjaman) {
        return back()->with('success', 'Data peminjaman berhasil ditambahkan!');
    } else {
        return back()->with('failed', 'Gagal menambahkan data peminjaman!');
    }
}

public function editPeminjaman($id) {
    $data = Peminjaman::find($id);
    return view('admin/editPeminjaman', compact('data'));
}

public function postEditPeminjaman(Request $request, $id) {
    $request->validate([
        'idUser' => 'required',
        'kodeBuku' => 'required|int',
        'tanggalPeminjaman' => 'required',
        'tanggalPengembalian' => 'required',
        'status' => 'required',
    ]);

    $peminjaman = Peminjaman::find($id);
    $peminjaman->id_user = $request->idUser;
    $peminjaman->id_buku = $request->kodeBuku;
    $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
    $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
    $peminjaman->status = $request->status;
    $peminjaman->save();

    if ($peminjaman) {
        return back()->with('success', 'Data peminjaman berhasil diupdate!');
    } else {
        return back()->with('failed', 'Gagal mengupdate data peminjaman!');
    }
}

public function deletePeminjaman($id) {
    $data = Peminjaman::find($id);
    $data->delete();

    if ($data) {
        return back()->with('success', 'Data peminjaman berhasil dihapus!');
    } else {
        return back()->with('failed', 'Gagal menghapus data peminjaman!');
    }
}

public function detailPeminjaman($id_peminjaman, $id_user, $id_buku){
    $detailPeminjaman = Peminjaman::select('peminjaman.*','buku.*','user.*')
    ->join('buku','peminjaman.id_buku', '=', 'buku.id')
    ->join('users','peminjaman.id_user','=', 'users.id')
    ->where('peminjaman.id',$id_peminjaman)
    ->where('buku.id',$id_buku)
    ->where('user.id',$id_user)
    ->first();

    if(!$detailPeminjaman){
        abort(404, 'Data tidak ditemukan');
    }
    return view('admin.detailPeminjaman', compact('detailPeminjaman'));
    }

    public function cetakDataPeminjaman(){
        $data = DB::table('peminjaman')
        ->join('users', 'users.id', '=', 'peminjaman.id_user')
        ->join('buku', 'buku.id', '=', 'peminjaman.id_buku')
        ->select('peminjaman.*', 'users.name', 'buku.judul_buku')
        ->get();
        $pdf = PDF::loadView('admin.cetakPeminjaman', ['data' => $data]);
        return $pdf->stream();

    }



    
}