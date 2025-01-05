
@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Countries</title>
</head>
<body>
    <h1>Create New  Countries</h1>

    <form action="{{$countrie->id !=null? route('countries.update', $countrie): route('countries.store') }}" method="POST">
        @csrf

        @if ($countrie->id !=null)
        @method('PUT')
        @endif


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" value="{{ $countrie->name }}" required><br>
        </div>


        <button class="rounded btn btn-primary" type="submit">Save</button>
    </form>
    <a class="text-success" href="{{ route('countries.index') }}">Back to List</a>
</body>
</html>
@endsection
