<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\dbmodel;
use App\Models\modelsupplier;

class ControllerSupplier extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function tampilkanview() {
        $db = new modelsupplier();

        $res = $db->readDb('supplier');

        return view('viewSupplier.supplier',['db' => $res]);
    }

    public function tampilkanadd() {
        return view('viewSupplier.addviewsupplier');
    }

    public function tambahsupplier(Request $req) {
        $db = new modelsupplier();
        $db->addDb('supplier',$req);
        echo 'Data Saved ! go back now!';
        return redirect('/supplierview');
    }

    public function hapus($id_supplier) {
        $db = new modelsupplier();
        $db->delDb('supplier',$id_supplier);
        return redirect('/supplierview');
    }

    public function tampilkanedit($id_supplier) {
        $db = new modelsupplier();
        $res = $db->fetchUpdate('supplier',$id_supplier);
        return view('viewSupplier.editviewsupplier', ['db' => $res]);
    }

    public function update(Request $req) {
        $db = new modelsupplier();
        $db->updateDb('supplier', $req);
        return redirect('/supplierview');
    }
}
