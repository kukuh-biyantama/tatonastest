<?php

namespace App\Models;


use App\Models\Transaksi;
use App\Models\HardwareDetail;
use App\Models\TransaksiDetail;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $casts = [
        'localtime' => 'datetime', // Cast localtime attribute to DateTime
    ];
    protected $primaryKey = 'hardware';
    protected $fillable = [
        'hardware', 'location', 'timezone', 'localtime', 'latitude', 'longitude', 'created_by'
    ];

    // Define relationships here if needed
    public function hardwareDetails()
    {
        return $this->hasMany(HardwareDetail::class, 'hardware_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'hardware_id');
    }
    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class, 'hardware_id');
    }
}
