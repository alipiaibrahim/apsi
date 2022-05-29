<?php

namespace App\Http\Controllers;

use App\Models\Kelolatopik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class KelolatopikController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $topik = Kelolatopik::all();
    return view('kelolatopik', compact('user', 'topik'));
}

public function tambah_topik(Request $req)
{
    $topik = new Kelolatopik;

    $topik->judul = $req->get('judul');
    $topik->dosen = $req->get('dosen');
    $topik->status = $req->get('status');

    $topik->save();

    $notification = array(
        'message' => 'Data topik berhasil ditambahkan',
        'alert-type' => 'success'
    );

    return redirect()->route('koordinator.kelolatopik.tambah')->with($notification);
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

    return redirect()->route('koordinator.kelolatopik.update')->with($notification);
}

public function delete_topik(Request $req)
{
    $topik = Kelolatopik::find($req->get('id'));

    $topik->delete();

    $notification = array(
        'message' => 'Data topik berhasil dihapus',
        'alert-type' => 'success'
    );
    return redirect()->route('koordinator.kelolatopik.delete')->with($notification);
}
}
