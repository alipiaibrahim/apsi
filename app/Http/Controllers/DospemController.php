<?php

namespace App\Http\Controllers;

use App\Models\Dospem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;


class DospemController extends Controller
{
public function index()
{
    $user = Auth::user();
    $dospems = Dospem::all();
    return view('dospem', compact('user', 'dospems'));
}

public function tambah_dospem(Request $req)
{
    $dospems = new Dospem;

    $dospems->mahasiswas = $req->get('mahasiswas');
    $dospems->npm = $req->get('npm');
    $dospems->proposal = $req->get('proposal');
    $dospems->dosens = $req->get('dosens');

    $dospems->save();

    $notification = array(
        'message' => 'Data dospem berhasil ditambahkan',
        'alert-type' => 'success'
    );

    return redirect()->route('dospem.tambah')->with($notification);
}
public function getDataDospem($id)
    {
        $dospems = Dospem::find($id);
    
        return response()->jsonp($dospem);
    }
    
    public function update_dospem(Request $req)
    {
    
        $dospems = Dospem::find($req->get('id'));
    
        $dospems->mahasiswas = $req->get('mahasiswas');
        $dospems->npm = $req->get('npm');
        $dospems->proposal = $req->get('proposal');
        $dospems->dosens = $req->get('dosens');
    
        $dospems->save();
    
        $notification = array(
            'message' => 'Data dosen berhasil diedit',
            'alert-type' => 'success'
        );
    
        return redirect()->route('koordinator.dospem.update')->with($notification);
    }
    
    public function delete_dospem(Request $req)
    {
        
        $dospems = Dospem::find($req->get('id'));
    
        $dospems->delete();
    
        $notification = array(
            'message' => 'Data dosen berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('koordinator.dospem.delete')->with($notification);
    }
}
