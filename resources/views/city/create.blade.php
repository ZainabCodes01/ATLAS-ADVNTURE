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

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <form action="{{$citys->id !=null? route('city.update', $citys): route('city.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($citys->id !=null)
                    @method('PUT')
                @endif

                <tr>
                    <td>
                        <label for="province_id" class="form-label">{{'Province'}}</label>
                    </td>
                    <td>
                        <select name="province_id" id="province_id">
                            <option value="{{null}}">Select Province</option>
                            @foreach ($provinces as $provincee)

                                <option value="{{$provincee->id}}">{{$provincee->name}}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name" class="form-label">City Name</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $citys->name }}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" name="img">
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

    <a class="text-success" href="{{ route('city.index') }}">Back to List</a>
</body>
</html>
@endsection
