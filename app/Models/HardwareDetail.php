<?php

namespace App\Models;


use App\Models\Hardware;
use App\Models\MasterSensor;
use Illuminate\Database\Eloquent\Model;

class HardwareDetail extends Model
{
    protected $fillable = [
        'hardware_id', 'sensor',
    ];

    // Define relationships here
    public function hardware()
    {
        return $this->belongsTo(Hardware::class, 'hardware_id');
    }

    public function masterSensor()
    {
        return $this->belongsTo(MasterSensor::class, 'sensor', 'sensor');
    }
}
