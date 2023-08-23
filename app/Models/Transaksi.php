<?php

namespace App\Models;

use App\Models\Hardware;
use App\Models\TransaksiDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'hardware_id', 'parameter'
    ];

    public function hardware()
    {
        return $this->belongsTo(Hardware::class, 'hardware_id');
    }
    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class, 'trans_id');
    }
}
