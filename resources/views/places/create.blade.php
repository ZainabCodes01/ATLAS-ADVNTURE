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

    <form action="{{$placess->id !=null? route('places.update', $placess): route('places.store') }}" method="POST">
        @csrf

        @if ($placess->id !=null)
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="category_id">Category ID</label>
    <input type="text" id="category_id" name="category_id" placeholder="Enter category ID" value="{{$placess->category_id}}">
        </div><br>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" value="{{ $placess->name }}" required>
        </div>


        <div class="mb-3">
            <label for="description">Description</label>
    <input type="text" id="description" name="description" placeholder="Enter description" value="{{$placess->description}}">
        </div><br>

        <div class="mb-3">
            <label for="location">Location</label>
    <input type="text" id="location" name="location" placeholder="Enter location" value="{{$placess->location}}">
        </div><br>

        <div class="mb-3">
            <label for="thumbnail">Thumbnail</label>
    <input type="text" id="thumbnail" name="thumbnail" placeholder="Enter thumbnail URL" value="{{$placess->thumbnail}}">
        </div><br>

        <div class="mb-3">
            <label for="country_id">Country ID</label>
    <input type="text" id="country_id" name="country_id" placeholder="Enter country_id" value="{{$placess->country_id}}">
        </div><br>

        <div class="mb-3">
            <label for="city_id">City ID</label>
    <input type="text" id="city_id" name="city_id" placeholder="Enter city_id" value="{{$placess->city_id}}">
        </div><br>

        <div class="mb-3">
            <label for="town_id">Town ID</label>
    <input type="text" id="town_id" name="town_id" placeholder="Enter town_id" value="{{$placess->town_id}}">
        </div><br>

        <div class="mb-3">
            <label for="lat">Latitude</label>
    <input type="text" id="lat" name="lat" placeholder="Enter lattitude" value="{{$placess->lat}}">
        </div><br>

        <div class="mb-3">
            <label for="lng">Longitude</label>
    <input type="text" id="lng" name="lng" placeholder="Enter longitude" value="{{$placess->lng}}">
        </div><br>


        <div class="mb-3">
            <label for="id" class="form-label">Province_id</label>
        <input type="text" name="province_id" id="province_id" value="{{ $placess->province_id }}"><br>
        </div>




        <button class="rounded btn btn-primary" type="submit">Save</button>
    </form>
    <a class="text-success" href="{{ route('places.index') }}">Back to List</a>
</body>
</html>
@endsection

