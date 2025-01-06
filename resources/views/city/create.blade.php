@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New City</title>
</head>
<body>
    <h1>Create New City</h1>

    <form action="{{$citys->id !=null? route('city.update', $citys): route('city.store') }}" method="POST">
        @csrf

        @if ($citys->id !=null)
        @method('PUT')
        @endif


        <div class="mb-3">
            <label for="id" class="form-label">Province_id</label>
        <input type="text" name="province_id" id="province_id" value="{{ $citys->province_id }}"><br>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" value="{{ $citys->name }}" required>
        </div>


        <button class="rounded btn btn-primary" type="submit">Save</button>
    </form>
    <a class="text-success" href="{{ route('city.index') }}">Back to List</a>
</body>
</html>
@endsection
