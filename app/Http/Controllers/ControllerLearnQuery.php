<?php

namespace App\Http\Controllers;

use App\Models\queryBuilder;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ControllerLearnQuery extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //Query Builder
    function tampilkanquery() {
        $db = new queryBuilder();
        $qbselect = $db->selectdb();
        $qbwhere = $db->wheredb();
        $qborder = $db->orderbydb();
        $db->insertdb();
        $db->updatedb();
        $db->deletedb();
        $qbjoin = $db->joindb();
        return compact('qbselect', 'qbwhere', 'qborder','qbjoin');
    }

    //Query Eloquent
    function tampilkanquery2() {
        $qeselect = Order::all();
        $qewhere = Order::where('kodeorder', 'o1233')->get();
        $qeorder = Order::orderBy('grandtotal', 'desc')->get();
        //insert
        $qeInsert = Order::create([
            'kodeorder' => 'o1236',
            'kodesupplier' => 's1',
            'kodekaryawan' => 'k01',
            'tanggal' => '2/12/2022',
            'do' => 'do1213',
            'keterangan' => 'beli bahan',
            'grandtotal' => 400000,
        ]);
        
        $qeInsert->save();

            //update
        $qeUpdate = Order::find('o1236');
        
        $qeUpdate->kodesupplier = 's2';
        $qeUpdate->kodekaryawan = 'k02';

        $qeUpdate->save();

            //delete
        $qeDelete = Order::find('o1236');
        $qeDelete->delete();

            //join
        $qejoin = Order::join('order_item','order_item.kodeorder', '=', 'order.kodeorder')
                        ->get();


        return compact('qeselect', 'qewhere','qeorder', 'qejoin');
    }
}
