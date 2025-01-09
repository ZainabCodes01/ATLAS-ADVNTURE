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

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <form action="{{$provincee->id ==null? route('provinces.update', $provincee ): route('provinces.store') }}" method="POST">
                @csrf

                @if ($provincee->id !=null)
                    @method('PUT')
                @endif

              <tr>
                    <td>
                        <label for="country_id" class="form-label">Country</label>
                    </td>
                    <td>
                        <select name="country_id" id="country">
                            @foreach ($countries as $countrie)
                                <option value="{{ $countrie->id }}">{{ $countrie->country_name }}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="name" class="form-label">Province Name</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $provincee->name }}" required>
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
        <a class="text-success" href="{{ route('provinces.index') }}">Back to List</a>
</body>
</html>
@endsection
