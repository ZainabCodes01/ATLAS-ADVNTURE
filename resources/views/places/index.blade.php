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
                {{-- <th>Description</th> --}}
                <th>Thumbnail</th>
                {{-- <th>Image_Path</th> --}}
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Category</th>
                <th>Country</th>
                <th>Province</th>
                <th>City</th>
                <th>Town</th>
                <th>Location</th>
                <th>External URL</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($places as $placesc)
                <tr>
                    <td>{{ $placesc->id }}</td>
                    <td>{{ $placesc->name }}</td>
                    {{-- <td>{{ $placesc->description }}</td> --}}
                     <td><img src="{{ $placesc->thumbnail}}" alt="Thumbnail Image" style="width: 250px; height: auto;">
                    </td>
                    {{-- <td>
                        <a href="{{route('placeimage.index')}}" class="rounded btn btn-primary">Add & View Image</a>
                    </td> --}}
                    <td>{{ $placesc->lat }}</td>
                    <td>{{ $placesc->lng}}</td>
                    <td>{{ $placesc->category ? $placesc->category->name : 'No Category' }}</td>
                    <td>{{ $placesc->country ? $placesc->country->name : 'No Country' }}</td>
                    <td>{{ $placesc->province ? $placesc->province->name : 'No Province' }}</td>
                   <td>{{ $placesc->city ? $placesc->city->name : 'No City' }}</td>
                   <td>{{ $placesc->town ? $placesc->town->name : 'No Town' }}</td>
                   <td>{{ $placesc->location }}</td>
                   <td>{{$placesc->external_url}}</td>
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
