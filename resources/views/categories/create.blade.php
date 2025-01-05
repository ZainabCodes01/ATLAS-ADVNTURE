@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Categories</title>
</head>
<body>
    <h1>Create New  Categories</h1>

    <form action="{{$categorie->id !=null? route('categories.update', $categorie): route('categories.store') }}" method="POST">
        @csrf

        @if ($categorie->id !=null)
        @method('PUT')
        @endif


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" value="{{ $categorie->name }}" required><br>
        </div>

       <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description">{{ $categorie->description }}</textarea>
       </div>

        <button class="rounded btn btn-primary" type="submit">Save</button>
    </form>
    <a class="text-success" href="{{ route('categories.index') }}">Back to List</a>
</body>
</html>
@endsection



