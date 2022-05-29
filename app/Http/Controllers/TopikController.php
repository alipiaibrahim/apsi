<?php

namespace App\Http\Controllers;
use App\Models\Kelolatopik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\KelolatopikController;
use PhpOffice\PhpSpreadsheet\Calculation\Category;


class TopikController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $topik = Kelolatopik::all();
    return view('topikmhs', compact('user', 'topik'));
}

//proses ajax
public function getDataTopik($id)
{
    $topik = Kelolatopik::find($id);

    return response()->jsonp($topik);
}

public function update_topik(Request $req)
{

    $topik = Kelolatopik::find($req->get('id'));

    $topik->judul = $req->get('judul');
    $topik->dosen = $req->get('dosen');
    $topik->status = $req->get('status');

    $topik->save();

    $notification = array(
        'message' => 'Data topik berhasil diedit',
        'alert-type' => 'success'
    );

    return redirect()->route('mahasiswa.topik.update')->with($notification);
}

}

