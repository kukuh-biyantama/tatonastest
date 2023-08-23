@extends('layout.app')

@section('content')
<div class="container" style="margin-top: 6%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Sensor</div>
                <div class="card-body">
                    <form method="post" action="{{ route('master-sensors.update', $sensor->sensor) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="sensor_name">Sensor Name</label>
                            <input type="text" class="form-control" id="sensor_name" name="sensor_name" value="{{ $sensor->sensor_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="{{ $sensor->unit }}" required>
                        </div>
                        <!-- Other fields can be added here -->

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection