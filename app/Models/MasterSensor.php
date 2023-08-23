<?php

namespace App\Models;


use App\Models\HardwareDetail;
use App\Models\TransaksiDetail;
use Illuminate\Database\Eloquent\Model;

class MasterSensor extends Model
{
    protected $primaryKey = 'sensor'; // Define the primary key
    public $incrementing = false; // Ensure the primary key is not auto-incrementing

    protected $fillable = [
        'sensor', 'sensor_name', 'unit', 'created_by'
    ];

    // Define relationships here if needed
    public function hardwareDetails()
    {
        return $this->hasMany(HardwareDetail::class, 'sensor', 'sensor');
    }
    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class, 'sensor', 'sensor');
    }
}
