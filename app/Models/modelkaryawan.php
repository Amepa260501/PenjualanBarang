<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class modelkaryawan extends dbmodel {
    
    public function addDb($db,$x) {
        DB::table($db)->insert([
            'id_karyawan'=>$x->id_karyawan,
            'nama_karyawan'=>$x->nama_karyawan,
            'alamat_karyawan'=>$x->alamat_karyawan,
            'telp_karyawan'=>$x->telp_karyawan,
            'jeniskel_karyawan'=>$x->jeniskel_karyawan,
            'jabatan_karyawan'=>$x->jabatan_karyawan,
            'email_karyawan'=>$x->email_karyawan,
            'pass_karyawan'=>$x->pass_karyawan
        ]);
    }
    
    public function delDb($db, $x) {
        DB::table($db)->where('id_karyawan',$x)->delete();
    }

    public function fetchUpdate($db, $x) {
        return DB::table($db)->where('id_karyawan', $x)->get();
    }

    public function updateDb($db,$x) {
        DB::table($db)->where('id_karyawan',$x->id_karyawan)->update([
            'nama_karyawan'=>$x->nama_karyawan,
            'alamat_karyawan'=>$x->alamat_karyawan,
            'telp_karyawan'=>$x->telp_karyawan,
            'jeniskel_karyawan'=>$x->jeniskel_karyawan,
            'jabatan_karyawan'=>$x->jabatan_karyawan,
            'email_karyawan'=>$x->email_karyawan,
            'pass_karyawan'=>$x->pass_karyawan
        ]);
    }
}