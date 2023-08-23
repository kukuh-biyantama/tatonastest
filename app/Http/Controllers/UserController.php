<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use App\Models\MasterSensor;
use Illuminate\Http\Request;
use App\Models\HardwareDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function indexmastersensor()
    {
        $sensors = MasterSensor::all();
        $hardware = Hardware::all();
        $hardwaredetail = HardwareDetail::all();
        return view('content.user.index', compact('sensors', 'hardware', 'hardwaredetail'));
    }
    public function edit($sensor)
    {
        $sensor = MasterSensor::findOrFail($sensor);
        return view('content.superadmin.edit', compact('sensor'));
    }
    public function update(Request $request, $sensor)
    {
        $sensor = MasterSensor::findOrFail($sensor);

        $validatedData = $request->validate([
            'sensor_name' => 'required',
            'unit' => 'required',
        ]);

        $sensor->update($validatedData);

        return redirect()->route('user.test')
            ->with('success', 'Sensor updated successfully');
    }
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'sensor' => 'required|string|unique:master_sensors',
            'sensor_name' => 'required|string',
            'unit' => 'required|string',
            'created_by' => 'required|string', // Include this field in validation
        ]);

        // Create the master sensor record
        MasterSensor::create($validatedData);

        return redirect()->route('user.test')
            ->with('success', 'Master Sensor created successfully');
    }

    public function destroy($sensor)
    {
        $sensor = MasterSensor::findOrFail($sensor);

        // Delete related hardware details first
        $sensor->hardwareDetails()->delete();
        $sensor->transaksiDetails()->delete();
        $sensor->delete();

        return redirect()->route('user.test')
            ->with('success', 'Sensor deleted successfully');
    }

    //hardware
    public function edithardware($hardware)
    {
        $hardware = Hardware::findOrFail($hardware);
        return view('content.superadmin.edithardware', compact('hardware'));
    }

    public function updatehardware(Request $request, $hardware)
    {
        $hardware = Hardware::findOrFail($hardware);

        $hardware->update([
            'location' => $request->input('location'),
            'timezone' => $request->input('timezone'),
            'localtime' => $request->input('localtime'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return redirect()->route('user.test')
            ->with('success', 'Hardware updated successfully');
    }

    public function destroyhardware($hardware)
    {
        // Disable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Delete related transaksi details first
        Hardware::findOrFail($hardware)->transaksiDetails()->delete();
        Hardware::findOrFail($hardware)->hardwareDetails()->delete();

        // Now delete the hardware record itself
        Hardware::destroy($hardware);

        // Re-enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return redirect()->route('user.test')
            ->with('success', 'Hardware and related details deleted successfully');
    }
    public function storehardware(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'hardware' => 'required|string|unique:hardware',
            'location' => 'required|string',
            'timezone' => 'required|integer',
            'localtime' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Create the hardware record
        Hardware::create($validatedData);

        return redirect()->route('user.test')
            ->with('success', 'Hardware created successfully');
    }
    //hardwaredetails
    public function destroyhardwaredetails($id)
    {
        $sensor = HardwareDetail::findOrFail($id);
        $sensor->delete();

        return redirect()->route('user.test')
            ->with('success', 'Hardware and related details deleted successfully');
    }
}
