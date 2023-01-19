<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class modelsupplier extends dbmodel {
    
    public function addDb($db,$x) {
        DB::table($db)->insert([
            'id_supplier'=>$x->id_supplier,
            'kontak_supplier'=>$x->kontak_supplier,
            'alamat_supplier'=>$x->alamat_supplier,
            'telp_supplier'=>$x->telp_supplier,
            'keterangan_supplier'=>$x->keterangan_supplier,
            'telp_perusahaan'=>$x->telp_perusahaan,
            'nama_perusahaan'=>$x->nama_perusahaan
        ]);
    }
    
    public function delDb($db, $x) {
        DB::table($db)->where('id_supplier',$x)->delete();
    }

    public function fetchUpdate($db, $x) {
        return DB::table($db)->where('id_supplier', $x)->get();
    }

    public function updateDb($db,$x) {
        DB::table($db)->where('id_supplier',$x->id_supplier)->update([
            'kontak_supplier'=>$x->kontak_supplier,
            'alamat_supplier'=>$x->alamat_supplier,
            'telp_supplier'=>$x->telp_supplier,
            'keterangan_supplier'=>$x->keterangan_supplier,
            'telp_perusahaan'=>$x->telp_perusahaan,
            'nama_perusahaan'=>$x->nama_perusahaan
        ]);
    }
}