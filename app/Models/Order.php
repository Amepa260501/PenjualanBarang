<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model {
    protected $table = 'order';
    protected $primaryKey = 'kodeorder';
    public $timestamps = false;

    
    protected $fillable = [
        'kodeorder',
        'kodesupplier',
        'kodekaryawan',
        'tanggal',
        'do',
        'keterangan',
        'grandtotal'
    ];
    
}