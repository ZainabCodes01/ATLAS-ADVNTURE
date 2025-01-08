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

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <form action="{{$categorie->id !=null? route('categories.update', $categorie): route('categories.store') }}" method="POST">
                @csrf

                @if ($categorie->id !=null)
                    @method('PUT')
                @endif

                <tr>
                    <td>
                        <label for="name" class="form-label">Name</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $categorie->name }}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description" class="form-label">Description</label>
                    </td>
                    <td>
                        <textarea class="form-control" name="description" id="description">{{ $categorie->description }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>

    <a class="text-success" href="{{ route('categories.index') }}">Back to List</a>
</body>
</html>
@endsection



