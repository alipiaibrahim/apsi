<?php

namespace App\Http\Controllers;

use App\Models\Dataproposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class DataproposalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataproposals = Dataproposal::all();
        return view('dataproposal', compact('user', 'dataproposals'));
    }
    public function tambah_dataproposal(Request $req)
    {
        $dataproposals = new Dataproposal;

        $dataproposals->nama = $req->get('nama');
        $dataproposals->npm = $req->get('npm');
        $dataproposals->judul_tugas = $req->get('judul_tugas');
        // $dataproposals->tgl_pengajuan = $req->get('tgl_pengajuan');
        if ($req->hasFile('proposal')) {
            $extension = $req->file('proposal')->extension();

            $filename = 'proposal_dataproposals_'.time().'.'.$extension;

            $req->file('proposal')->storeAs(
                'public/proposal_dataproposals', $filename
            );

            $dataproposals->proposal = $filename;
        }

        $dataproposals->save();

        $notification = array(
            'message' => 'Data dataproposal berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('mahasiswa.dataproposal.tambah')->with($notification);
    }
    //proses ajax
    public function getDataDataproposal($id)
    {
        $dataproposals = Dataproposal::find($id);

        return response()->jsonp($dataproposals);
    }

    public function update_dataproposal(Request $req)
    {

        $dataproposals = Dataproposal::find($req->get('id'));

        $dataproposals->nama = $req->get('nama');
        $dataproposals->npm = $req->get('npm');
        $dataproposals->judul_tugas = $req->get('judul_tugas');
        // $dataproposals->tgl_pengajuan = $req->get('tgl_pengajuan');
        // $dataproposals->proposal = $req->get('proposal');
        if ($req->hasFile('proposal')) {
            $extension = $req->file('proposal')->extension();

            $filename = 'proposal_dataproposals_'.time().'.'.$extension;

            $req->file('proposal')->storeAs(
                'public/proposal_dataproposals', $filename
            );

            Storage::delete('public/proposal_dataproposals/'.$req->get('old_proposal'));

            $dataproposals->proposal = $filename;
        }

        $dataproposals->save();

        $notification = array(
            'message' => 'Data dataproposals berhasil diedit',
            'alert-type' => 'success'
        );

        return redirect()->route('mahasiswa.dataproposal.update')->with($notification);
    }

    public function delete_dataproposal(Request $req)
    {
        $dataproposals = Dataproposal::find($req->get('id'));

        storage::delete('public/roposal_dataproposals/'.$req->get('old_proposal'));

        $dataproposals->delete();

        $notification = array(
            'message' => 'Data dataproposals berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('mahasiswa.dataproposal.delete')->with($notification);
    }
}
