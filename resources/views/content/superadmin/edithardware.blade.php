@extends('layout.app')

@section('content')
<div class="container">
    <h2>Edit Hardware</h2>
    <form action="{{ route('hardware.update', $hardware->hardware) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $hardware->location }}" required>
        </div>

        <div class="form-group">
            <label for="timezone">Timezone</label>
            <input type="number" name="timezone" class="form-control" value="{{ $hardware->timezone }}" required>
        </div>

        <div class="form-group">
            <label for="localtime">Local Time</label>
            <input type="datetime-local" name="localtime" class="form-control" value="{{ $hardware->localtime->format('Y-m-d\TH:i:s') }}" required>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="number" name="latitude" class="form-control" value="{{ $hardware->latitude }}" required>
        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="number" name="longitude" class="form-control" value="{{ $hardware->longitude }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection