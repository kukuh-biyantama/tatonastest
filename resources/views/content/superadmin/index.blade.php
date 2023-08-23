@extends('layout.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container" style="margin-top: 6%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Master Sensor</div>
                <a class="badge bg-warning border-0" onclick="openCreateModal()">buat data</a>
                <table id="table">
                    <thead>
                        <tr>
                            <th>sensor</th>
                            <th>nama sensor</th>
                            <th>unit</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sensors as $sensor)
                        <tr>
                            <td>{{ $sensor->sensor }}</td>
                            <td>{{ $sensor->sensor_name }}</td>
                            <td>{{ $sensor->unit}}</td>
                            <td>
                                <a href="/superadmins-edit/{{$sensor->sensor}}" class="badge bg-warning border-0">Edit</a>
                                <form action="{{ route('superadmins-delete.destroy', $sensor->sensor) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 6%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hardware</div>
                <a class="badge bg-warning border-0" onclick="openCreatehardware()">buat data</a>
                <table id="hardware">
                    <thead>
                        <tr>
                            <th>hardware</th>
                            <th>location</th>
                            <th>timezone</th>
                            <th>localtime</th>
                            <th>latitude</th>
                            <th>longitude</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hardware as $hardware)
                        <tr>
                            <td>{{ $hardware->hardware }}</td>
                            <td>{{ $hardware->location }}</td>
                            <td>{{ $hardware->timezone}}</td>
                            <td>{{ $hardware->localtime}}</td>
                            <td>{{ $hardware->latitude}}</td>
                            <td>{{ $hardware->longitude}}</td>
                            <td>
                                <a href="/superadminshardware-edit/{{$hardware->hardware}}" , class="badge bg-warning border-0">Edit</a>
                                <form action="{{ route('superadminshardware-delete.destroyhardware', $hardware->hardware) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 6%; margin-bottom: 10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hardware detail</div>
                <a class="badge bg-warning border-0" onclick="openCreatehardwaredetail()">buat data</a>
                <table id="hardwaredetail">
                    <thead>
                        <tr>
                            <th>hardware_id</th>
                            <th>sensor</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hardwaredetail as $hardwaredetail)
                        <tr>
                            <td>{{ $hardwaredetail->hardware_id }}</td>
                            <td>{{ $hardwaredetail->sensor }}</td>
                            <td>
                                <form action="{{ route('superadminshardwaredetails-delete.destroyhardwaredetails', $hardwaredetail->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Create Form -->
<div id="createModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCreateModal()">&times;</span>
        <form method="post" action="{{ route('mastersensor.store') }}">
            @csrf
            <div class="form-group">
                <label for="sensor">Sensor</label>
                <input type="text" class="form-control" id="sensor" name="sensor" required>
            </div>
            <div class="form-group">
                <label for="sensor_name">Sensor Name</label>
                <input type="text" class="form-control" id="sensor_name" name="sensor_name" required>
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="unit" name="unit" required>
            </div>
            <div class="form-group">
                <label for="created_by">Created By</label>
                <input type="text" class="form-control" id="created_by" name="created_by" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div id="createModalhardware" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCreatehardware()">&times;</span>
        <form method="post" action="{{ route('hardware.store') }}">
            @csrf
            <div class="form-group">
                <label for="hardware">Hardware</label>
                <input type="text" class="form-control" id="hardware" name="hardware" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="timezone">Timezone</label>
                <input type="number" class="form-control" id="timezone" name="timezone" required>
            </div>
            <div class="form-group">
                <label for="localtime">Local Time</label>
                <input type="datetime-local" class="form-control" id="localtime" name="localtime" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="number" class="form-control" id="latitude" name="latitude" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="number" class="form-control" id="longitude" name="longitude" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>
    // Open the Create Modal
    function openCreateModal() {
        document.getElementById("createModal").style.display = "block";
    }

    // Close the Create Modal
    function closeCreateModal() {
        document.getElementById("createModal").style.display = "none";
    }

    function openCreatehardware() {
        document.getElementById("createModalhardware").style.display = "block";
    }

    // Close the Create Modal
    function closeCreatehardware() {
        document.getElementById("createModalhardware").style.display = "none";
    }

    function openCreatehardwaredetail() {
        document.getElementById("createModalhardwaredetail").style.display = "block";
    }

    function closeCreatehardware() {
        document.getElementById("createModalhardware").style.display = "none";
    }
</script>
@endsection