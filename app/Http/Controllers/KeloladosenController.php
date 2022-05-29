<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class KeloladosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $keloladosens = Dosen::all();
        return view('keloladosen', compact('user', 'keloladosens'));
    }
    
    public function tambah_dosen(Request $req)
    {
        $keloladosens = new Dosen;
    
        $keloladosens->nidn = $req->get('nidn');
        $keloladosens->nama = $req->get('nama');
        $keloladosens->jabatan = $req->get('jabatan');
    
        $keloladosens->save();
    
        $notification = array(
            'message' => 'Data dosen berhasil ditambahkan',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.keloladosen.tambah')->with($notification);
    }
    //proses ajax
    public function getDataDosen($id)
    {
        $keloladosens = Dosen::find($id);
    
        return response()->jsonp($keloladosens);
    }
    
    public function update_dosen(Request $req)
    {
    
        $keloladosens = Dosen::find($req->get('id'));
    
        $keloladosens->nidn = $req->get('nidn');
        $keloladosens->nama = $req->get('nama');
        $keloladosens->jabatan = $req->get('jabatan');
    
        $keloladosens->save();
    
        $notification = array(
            'message' => 'Data dosen berhasil diedit',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.keloladosen.update')->with($notification);
    }
    
    public function delete_dosen(Request $req)
    {
        
        $keloladosens = Dosen::find($req->get('id'));
    
        $keloladosens->delete();
    
        $notification = array(
            'message' => 'Data dosen berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.keloladosen.delete')->with($notification);
    }
}
