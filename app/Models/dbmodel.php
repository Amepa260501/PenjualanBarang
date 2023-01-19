<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dbmodel extends Model {

    public function readDb($from) {
        $data = DB::table($from)->get();
        return $data;
    }
    public function readWhereDb($from, $where, $id) {
        $data = DB::table($from)->where($where, $id)->get();
        return $data;
    }
    public function readBetweenDb($from, $where, $param1, $param2) {
        $data = DB::table($from)->whereBetween($where, [$param1, $param2])->get();
        return $data;
    }
    public function addDb($db,$x) {
        DB::table($db)->insert([
            'kode_brg'=>$x->kode_brg,
            'nama_brg'=>$x->nama_brg,
            'satuan'=>$x->satuan,
            'harga_beli'=>$x->harga_beli,
            'harga_jual'=>$x->harga_jual
        ]);
    }
    
    public function delDb($db, $x) {
        DB::table($db)->where('kode_brg',$x)->delete();
    }

    public function fetchUpdate($db, $x) {
        return DB::table($db)->where('kode_brg', $x)->get();
    }

    public function updateDb($db,$x) {
        DB::table($db)->where('kode_brg',$x->kode_brg)->update([
            'nama_brg'=>$x->nama_brg,
            'satuan'=>$x->satuan,
            'harga_beli'=>$x->harga_beli,
            'harga_jual'=>$x->harga_jual
        ]);
    }
}