@extends('admin.master.app')

@section('content')

<h1>Places</h1><br><br>
    <a href="{{ route('placeimage.create') }}" class="rounded btn btn-primary mb-1">Create Places</a>

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
            @foreach($placeimage as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>{{ $image->place }}</td>
                    <td><img src="{{ $image->image_path}}" alt="Image Path" style="width: 250px; height: auto;">
                    </td>
                    <td>{{$image->caption}}</td>
                    {{-- <td><img src="{{ $placesc->image_path}}" alt="Image_Path" style="width: 250px; height: auto;">
                    </td> --}}
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('images.edit', $image) }} ">Edit</a>
                        <form action="{{ route('images.destroy', $image) }}" method="POST" style="display:inline;">
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

