<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\dbmodel;
use App\Models\modelkaryawan;

class ControllerPenjualan extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function tampilkanview() {
        // $db = new dbmodel();

        // $res = $db->readDb('karyawan');

        return view('viewPenjualan.penjualan');
    }

    // public function tampilkanadd() {
    //     return view('viewKaryawan.addviewkaryawan');
    // }

    // public function tambah(Request $req) {
    //     $db = new modelkaryawan();
    //     $db->addDb('karyawan',$req);
    //     echo 'Data Saved ! go back now!';
    //     return redirect('/karyawanview');
    // }

    // public function hapus($id) {
    //     $db = new modelkaryawan();
    //     $db->delDb('karyawan',$id);
    //     return redirect('/karyawanview');
    // }

    // public function tampilkanedit($id) {
    //     $db = new modelkaryawan();
    //     $res = $db->fetchUpdate('karyawan',$id);
    //     return view('viewKaryawan.editviewkaryawan', ['db' => $res]);
    // }

    // public function update(Request $req) {
    //     $db = new modelkaryawan();
    //     $db->updateDb('karyawan', $req);
    //     return redirect('/karyawanview');
    // }
}
