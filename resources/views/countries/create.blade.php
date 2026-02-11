
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
        <label for="flg" class="form-label">Flag</label>
    </td>
    <td>
        @if($countrie->flag)
            <div class="mb-2">
                <img src="{{ asset($countrie->flag) }}" alt="Flag" width="80" class="img-thumbnail">
                <p class="text-muted mb-0">{{ basename($countrie->flag) }}</p>
            </div>
        @endif
        <input type="file" name="flg" class="form-control">
    </td>
</tr>

<tr>
    <td>
        <label for="img" class="form-label">Image</label>
    </td>
    <td>
        @if($countrie->image)
            <div class="mb-2">
                <img src="{{ asset($countrie->image) }}" alt="Image" width="120" class="img-thumbnail">
                <p class="text-muted mb-0">{{ basename($countrie->image) }}</p>
            </div>
        @endif
        <input type="file" name="img" class="form-control">
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




