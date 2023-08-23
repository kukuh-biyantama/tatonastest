<?php

use App\Models\Hardware;
use App\Models\Transaksi;
use App\Models\MasterSensor;
use App\Models\HardwareDetail;
use App\Models\TransaksiDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed MasterSensor table
        MasterSensor::create([
            'sensor' => 'rf',
            'sensor_name' => 'Rainfall',
            'unit' => 'mm',
            'created_by' => 'admin',
            'created_at' => '2022-11-10 16:20',
        ]);

        MasterSensor::create([
            'sensor' => 'wl',
            'sensor_name' => 'Water Level',
            'unit' => 'cm',
            'created_by' => 'admin',
            'created_at' => '2022-11-10 16:20',
        ]);

        // Seed Hardware table
        // Seed Hardware table
        $hardware1 = Hardware::create([
            'hardware' => '4001',
            'location' => 'ST. JOMBANG',
            'timezone' => 7,
            'localtime' => '2022-11-10 16:20', // Corrected column name
            'latitude' => -3.709444,
            'longitude' => 115.403611,
            'created_by' => 'admin',
            'created_at' => '2022-11-10 16:20',
        ]);

        $hardware2 = Hardware::create([
            'hardware' => '4002',
            'location' => 'ST. TIMBURU',
            'timezone' => 7,
            'localtime' => '2022-11-10 16:20', // Corrected column name
            'latitude' => -2.552639,
            'longitude' => 115.964806,
            'created_by' => 'admin',
            'created_at' => '2022-11-10 16:20',
        ]);

        //hardware detail 
        HardwareDetail::create([
            'hardware_id' => '4001',
            'sensor' => 'rf',
        ]);

        HardwareDetail::create([
            'hardware_id' => '4002',
            'sensor' => 'wl',
        ]);
        // Seed Transaksi table
        $transaksi1 = Transaksi::create([
            'hardware_id' => '4001',
            'parameter' => '{[isi data dari alat]}',
            'created_by' => '4001',
            'created_at' => '2022-11-08 16:20',
        ]);

        $transaksi2 = Transaksi::create([
            'hardware_id' => '4002',
            'parameter' => '{[isi data dari alat]}',
            'created_by' => '4002',
            'created_at' => '2022-11-08 16:20',
        ]);

        // Seed TransaksiDetail table
        TransaksiDetail::create([
            'trans_id' => $transaksi1->id,
            'hardware_id' => '4001',
            'sensor' => 'rf',
            'value' => 0.5,
        ]);

        TransaksiDetail::create([
            'trans_id' => $transaksi2->id,
            'hardware_id' => '4002',
            'sensor' => 'wl',
            'value' => 701.25,
        ]);
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
        // You can add more seed data for other tables here
    }
}
