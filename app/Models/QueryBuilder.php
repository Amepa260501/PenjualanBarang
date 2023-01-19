<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class queryBuilder extends Model {

    protected $table = 'order';
    
    //select
    function selectdb() {
        $data = DB::table($this->table)->get();
        return $data;
    }
    //where
    function wheredb() {
        $data = DB::table($this->table)->where('kodeorder', 'o1233')->get();
        return $data;  
    }
    //orderby
    function orderbydb() {
        $data = DB::table($this->table)->orderBy('grandtotal', 'desc')->get();
        return $data;
    }
    //insert
    function insertdb() {
        DB::table($this->table)->insert([
            'kodeorder'=>'o1236',
            'kodesupplier'=>'s1',
            'kodekaryawan'=>'ko1',
            'tanggal'=>'31/11/2022',
            'do'=>'do1213',
            'keterangan'=>'belibahan',
            'grandtotal'=>30000
        ]);
    }
    //update
    function updatedb() {
        DB::table($this->table)->where('kodeorder','o1236')->update([
            'tanggal'=>'1/12/2022',
            'kodekaryawan'=>'k02'
        ]);
    }
    //delete
    function deletedb() {
        DB::table($this->table)->where('kodeorder', 'o1236')->delete();
    }
    //join
    function joindb() {
        $data = DB::table($this->table)->join('order_item', $this->table.'.kodeorder', '=' , 'order_item.kodeorder')->get();
        return $data;
    }
    //orderby
    function orderdb() {
        $data = DB::table($this->table)->orderBy('grandtotal', 'desc');
    }
}