<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\dbmodel;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function tampilkandb() {
        $db = new dbmodel();

        $res = $db->readDb('inventory');

        return view('viewBarang.dbview',['db' => $res]);
    }

    public function tampilkanadd() {
        return view('viewBarang.addview');
    }

    public function tambahbarang(Request $req) {
        $db = new dbmodel();
        $db->addDb('inventory',$req);
        echo 'Data Saved ! go back now!';
        return redirect('/mainview');
    }

    public function hapusbrg($id_brg) {
        $db = new dbmodel();
        $db->delDb('inventory',$id_brg);
        return redirect('/mainview');
    }

    public function tampilkanedit($id_brg) {
        $db = new dbmodel();
        $res = $db->fetchUpdate('inventory',$id_brg);
        return view('viewBarang.editview', ['db' => $res]);
    }

    public function updatebarang(Request $req) {
        $db = new dbmodel();
        $db->updateDb('inventory', $req);
        return redirect('/mainview');
    }
}
