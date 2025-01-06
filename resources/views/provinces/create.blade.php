@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New province</title>
</head>
<body>
    <h1>Create New  Province</h1>

    <form action="{{$provincee->id !=null? route('provinces.update', $provincee): route('provinces.store') }}" method="POST">
        @csrf

        @if ($provincee->id !=null)
        @method('PUT')
        @endif


        <div class="mb-3">
            <label for="id" class="form-label">Country_id</label>
        <input type="text" name="country_id" id="country_id" value="{{ $provincee->country_id }}"><br>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" value="{{ $provincee->name }}" required>
        </div>


        <button class="rounded btn btn-primary" type="submit">Save</button>
    </form>
    <a class="text-success" href="{{ route('provinces.index') }}">Back to List</a>
</body>
</html>
@endsection
