<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\dbmodel;
use App\Models\modelgudang;
use Illuminate\Support\Facades\DB;

class ControllerGudang extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function tampilkanviewmaster() {
        $db = new dbmodel();

        $res = $db->readDb('mastergudang');

        return view('viewGudang.masterGudang', ['masterbarang'=>$res]);
    }
    public function tampilkanview() {
        $db = new dbmodel();

        $res = $db->readDb('inventory');

        return view('viewGudang.gudang', ['data_gudang'=> $res]);
    }
    
    public function datagudang() {
        $db = new dbmodel();

        return view('viewGudang.datagudang');
    }
    public function getdetail($id) {
        $db = new dbmodel();
        $res = DB::table('mastergudang')->join('detailgudang', 'mastergudang.kodetr', '=', 'detailgudang.kodetr')->where('mastergudang.kodetr', $id)->get();

        return response()->json(['obj'=>$res]);
    }
    public function getfilter($tgl_awal, $tgl_akhir) {
        $db = new dbmodel();
        
        $res = $db->readBetweenDb('mastergudang','tanggal', $tgl_awal, $tgl_akhir);

        return response()->json(['obj'=>$res]);
    }

    public function gudangmaster($kodetr,$tanggal,$namasupplier,
    $telpon,$alamat,$keterangan,$grandtotal) 
    {
        
        $xx=new modelgudang(); 
        $xx->SimpanMasterGudang($kodetr,$tanggal,$namasupplier,
        $telpon,$alamat,$keterangan,$grandtotal);
    } 

    public function gudangdetail($kodetr,$kodebrg,$harga,$jumlah)
    {
        $xx=new modelgudang(); 
        $xx->SimpanDetailGudang($kodetr,$kodebrg,$harga,$jumlah);
    }
}
