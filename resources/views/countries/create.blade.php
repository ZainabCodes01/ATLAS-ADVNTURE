
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

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <form action="{{$countrie->id !=null? route('countries.update', $countrie): route('countries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($countrie->id !=null)
                    @method('PUT')
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $countrie->name }}" required>
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



    <a class="text-success" href="{{ route('countries.index') }}">Back to List</a>
</body>
</html>
@endsection
