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

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $categorie->name }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description">{{ $categorie->description }}</textarea>
                    </div>
                </div>

                <div>
                    <input type="file" name="img">
                </div>


                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </tbody>
    </table>


    <a class="text-success" href="{{ route('categories.index') }}">Back to List</a>
</body>
</html>
@endsection



