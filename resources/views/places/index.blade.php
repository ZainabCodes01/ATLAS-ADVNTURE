@extends('admin.master.app')

@section('content')

<h1>Places</h1><br><br>
    <a href="{{ route('places.create') }}" class="rounded btn btn-primary mb-1">Create Places</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class=" table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Thumbnail</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Category_id</th>
                <th>Country_id</th>
                <th>Province_id</th>
                <th>City_id</th>
                <th>Town_id</th>

            </tr>
        </thead>
        <tbody>
            @foreach($places as $placesc)
                <tr>
                    <td>{{ $placesc->id }}</td>
                    <td>{{ $placesc->name }}</td>
                    <td>{{ $placesc->description }}</td>
                    <td>{{ $placesc->location }}</td>
                    <td>{{ $placesc->thumbnail }}</td>
                    <td>{{ $placesc->lat }}</td>
                    <td>{{ $placesc->lng}}</td>
                    <td>{{ $placesc->category_id }}</td>
                    <td>{{ $placesc->country_id}}</td>
                    <td>{{ $placesc->province_id}}</td>
                    <td>{{ $placesc->city_id }}</td>
                    <td>{{ $placesc->town_id}}</td>
                    <td>
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('places.edit', $placesc) }} ">Edit</a>
                        <form action="{{ route('places.destroy', $placesc) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="rounded btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
