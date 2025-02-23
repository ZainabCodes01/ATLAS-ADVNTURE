
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

                <tr>
                    <td>
                       <label for="name" class="form-label">Name</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $countrie->name }}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="flag" class="form-label">Flag</label>
                    </td>
                    <td>
                        <input type="file" name="flg">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image" class="form-label">Image</label>
                    </td>
                    <td>
                        <input type="file" name="img">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>



    <a class="text-success" href="{{ route('countries.index') }}">Back to List</a>
</body>
</html>
@endsection




