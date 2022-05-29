<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class KelolauserController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $users = User::all();
    return view('kelolauser', compact('user', 'users'));
}

public function tambah_user(Request $req)
{
    $users = new User;

    $users->name = $req->get('name');
    $users->username = $req->get('username');
    $users->email = $req->get('email');
    $users->password = $req->get('password');
    $users->roles_id = $req->get('roles_id');

    $users->save();

    $notification = array(
        'message' => 'Data users berhasil ditambahkan',
        'alert-type' => 'success'
    );

    return redirect()->route('admin.kelolauser.tambah')->with($notification);
}
//proses ajax
public function getDataUser($id)
{
    $users = User::find($id);

    return response()->jsonp($users);
}

public function update_user(Request $req)
{

    $users = User::find($req->get('id'));

    $users->name = $req->get('name');
    $users->username = $req->get('username');
    $users->email = $req->get('email');
    $users->password = $req->get('password');
    $users->roles_id = $req->get('roles_id');

    $users->save();

    $notification = array(
        'message' => 'Data users berhasil diedit',
        'alert-type' => 'success'
    );

    return redirect()->route('admin.kelolauser.update')->with($notification);
}

public function delete_user(Request $req)
{
    $users = User::find($req->get('id'));

    $users->delete();

    $notification = array(
        'message' => 'Data users berhasil dihapus',
        'alert-type' => 'success'
    );
    return redirect()->route('admin.kelolauser.delete')->with($notification);
}
}
