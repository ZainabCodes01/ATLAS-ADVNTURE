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

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <form action="{{$towns->id !=null? route('town.update', $towns): route('town.store') }}" method="POST">
                @csrf

                @if ($towns->id !=null)
                    @method('PUT')
                @endif

                <tr>
                    <td>
                        <label for="city_id" class="form-label">City</label>
                    </td>
                    <td>
                        <select name="city_id" id="city_id">
                            <option value="{{null}}">Select City</option>
                            @foreach ($city as $citys)

                                <option value="{{$citys->id}}">{{$citys->name}}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name" class="form-label">Name</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $towns->name }}" required>
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

    <a class="text-success" href="{{ route('town.index') }}">Back to List</a>
</body>
</html>
@endsection
