@extends('admin.master.app')

@section('content')

<h1>Places</h1><br><br>
    <a href="{{ route('placeimages.create') }}" class="rounded btn btn-primary mb-1">Create Places</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class=" table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Place</th>
                <th>Image Path</th>
                <th>Caption</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($placeimages as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->place }}</td>
                    <td><img src="{{ $place->image_path}}" alt="Image Path" style="width: 250px; height: auto;">
                    </td>
                    <td>{{$place->caption}}</td>
                    {{-- <td><img src="{{ $placesc->image_path}}" alt="Image_Path" style="width: 250px; height: auto;">
                    </td> --}}
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('placeimages.edit', $placesc) }} ">Edit</a>
                        <form action="{{ route('placeimages.destroy', $placesc) }}" method="POST" style="display:inline;">
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

