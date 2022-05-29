<?php

namespace App\Http\Controllers;

use App\Models\Dospem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Session;

class DosenpebimbingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dospems = Dospem::all();
        return view('dospemhs', compact('user', 'dospems'));
    }
    public function pesan(){
        Session::flash('sukses', 'Data berhasil');
        return redirect('pesan');
    }
}
