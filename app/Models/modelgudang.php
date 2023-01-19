<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB; 

class modelgudang extends Model
{
   
    public function SimpanMasterGudang($kodetr,$tanggal,$namasupplier,
    $telpon,$alamat,$keterangan,$grandtotal)
    {
        DB::table('mastergudang')->insert([
            'kodetr'=>$kodetr, 
            'tanggal'=>$tanggal,
            'namasupplier'=>$namasupplier,
            'telpon'=>$telpon, 
            'alamat'=>$alamat,
            'keterangan'=>$keterangan, 
            'grandtotal'=>$grandtotal 
        ]);         
    
    }

    public function SimpanDetailGudang($kodetr,$kodebrg,$harga,$jumlah)
    {
        DB::table('detailgudang')->insert([
            'kodetr'=>$kodetr, 
            'kodebrg'=>$kodebrg,
            'harga'=>$harga,
            'jumlah'=>$jumlah
            
        ]);         
    
    }
    



}
