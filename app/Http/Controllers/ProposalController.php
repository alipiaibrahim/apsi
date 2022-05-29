<?php

namespace App\Http\Controllers;

use App\Models\Dataproposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ProposalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataproposals = Dataproposal::all();
        return view('proposalmhs', compact('user', 'dataproposals'));
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
        return redirect()->route('koordinator.proposal.delete')->with($notification);
    }
}
