<?php

namespace App\Models;


use App\Models\Hardware;
use App\Models\Transaksi;
use App\Models\MasterSensor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'trans_id', 'hardware_id', 'sensor', 'value'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'trans_id');
    }

    public function hardware()
    {
        return $this->belongsTo(Hardware::class, 'hardware_id');
    }

    public function masterSensor()
    {
        return $this->belongsTo(MasterSensor::class, 'sensor', 'sensor');
    }
}
