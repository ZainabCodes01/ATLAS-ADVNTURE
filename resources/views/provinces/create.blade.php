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
            <form action="{{$provincee->id !=null? route('provinces.update', $provincee): route('provinces.store') }}" method="POST">
                @csrf

                @if ($provincee->id !=null)
                    @method('PUT')
                @endif

                <tr>
                    <td>
                        <label for="country_id" class="form-label">Country ID</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="country_id" id="country_id" value="{{ $provincee->country_id }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="countries" class="form-label">Country</label>
                    </td>
                    <td>
                        <select id="countries" class="form-select" name="countries">
                            <option value="none" disabled selected>Choose a country</option>
                            <option value="pakistan" {{ $provincee->countries == 'pakistan' ? 'selected' : '' }}>Pakistan</option>
                            <option value="turkey" {{ $provincee->countries == 'turkey' ? 'selected' : '' }}>Turkey</option>
                            <option value="malaysia" {{ $provincee->countries == 'malaysia' ? 'selected' : '' }}>Malaysia</option>
                            <option value="oman" {{ $provincee->countries == 'oman' ? 'selected' : '' }}>Oman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name" class="form-label">Name</label>
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
