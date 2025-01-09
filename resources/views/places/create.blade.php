@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Places</title>
</head>
<body>
    <h1>Create New Places</h1>

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <form action="{{$placess->id !=null? route('places.update', $placess): route('places.store') }}" method="POST">
                @csrf
                @if ($placess->id !=null)
                    @method('PUT')
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category ID</label>
                        <input type="text" class="form-control" name="category_id" id="category_id" placeholder="Enter category ID" value="{{$placess->category_id}}">
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Place Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $placess->name }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" value="{{$placess->description}}">
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Enter location" value="{{$placess->location}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="text" class="form-control" name="thumbnail" id="thumbnail" placeholder="Enter thumbnail URL" value="{{$placess->thumbnail}}">
                    </div>
                    <div class="col-md-6">
                        <label for="country_id" class="form-label">Country ID</label>
                        <input type="text" class="form-control" name="country_id" id="country_id" placeholder="Enter country_id" value="{{$placess->country_id}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="province_id" class="form-label">Province ID</label>
                        <input type="text" class="form-control" name="province_id" id="province_id" value="{{ $placess->province_id }}">
                    </div>
                    <div class="col-md-6">
                        <label for="city_id" class="form-label">City ID</label>
                        <input type="text" class="form-control" name="city_id" id="city_id" placeholder="Enter city_id" value="{{$placess->city_id}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="town_id" class="form-label">Town ID</label>
                        <input type="text" class="form-control" name="town_id" id="town_id" placeholder="Enter town_id" value="{{$placess->town_id}}">
                    </div>
                    <div class="col-md-6">
                        <label for="lat" class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="lat" id="lat" placeholder="Enter latitude" value="{{$placess->lat}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="lng" class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="lng" id="lng" placeholder="Enter longitude" value="{{$placess->lng}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </tbody>
    </table>


    <a class="text-success" href="{{ route('places.index') }}">Back to List</a>
</body>
</html>
@endsection

