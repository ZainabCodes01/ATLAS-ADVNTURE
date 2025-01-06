@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Town</title>
</head>
<body>
    <h1>Create New Town</h1>

    <form action="{{$towns->id !=null? route('town.update', $towns): route('town.store') }}" method="POST">
        @csrf

        @if ($towns->id !=null)
        @method('PUT')
        @endif


        <div class="mb-3">
            <label for="id" class="form-label">City_id</label>
        <input type="text" name="city_id" id="city_id" value="{{ $towns->city_id }}"><br>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" value="{{ $towns->name }}" required>
        </div>


        <button class="rounded btn btn-primary" type="submit">Save</button>
    </form>
    <a class="text-success" href="{{ route('town.index') }}">Back to List</a>
</body>
</html>
@endsection
