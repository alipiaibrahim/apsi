<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class KelolamahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::all();
        return view('kelolamahasiswa', compact('user', 'mahasiswa'));
    }

    public function tambah_mahasiswa(Request $req)
    {
        $mahasiswa = new Mahasiswa;

        $mahasiswa->npm = $req->get('npm');
        $mahasiswa->nama = $req->get('nama');
        $mahasiswa->angkatan = $req->get('angkatan');

        $mahasiswa->save();

        $notification = array(
            'message' => 'Data mahasiswa berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kelolamahasiswa.tambah')->with($notification);
    }
    //proses ajax
    public function getDataMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        return response()->jsonp($mahasiswa);
    }

    public function update_mahasiswa(Request $req)
    {

        $mahasiswa = Mahasiswa::find($req->get('id'));

        $mahasiswa->npm = $req->get('npm');
        $mahasiswa->nama = $req->get('nama');
        $mahasiswa->angkatan = $req->get('angkatan');

        $mahasiswa->save();

        $notification = array(
            'message' => 'Data mahasiswa berhasil diedit',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kelolamahasiswa.update')->with($notification);
    }

    public function delete_mahasiswa(Request $req)
    {
        $mahasiswa = Mahasiswa::find($req->get('id'));

        $mahasiswa->delete();

        $notification = array(
            'message' => 'Data mahasiswa berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.kelolamahasiswa.delete')->with($notification);
    }
}
