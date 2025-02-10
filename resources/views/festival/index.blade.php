@extends('admin.master.app')

@section('content')

<h1>Festival</h1><br><br>
    <a style="background-color:#0C243C; color:#C9D1D5" href="{{ route('festival.create') }}" class="rounded btn mb-1">Create Festival</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped w-100">

        <thead class="table" style="background-color:#0C243C; color:#C9D1D5" >

            <tr>
                <th>ID</th>
                <th>Place</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($festival as $festivals)
                <tr>
                    <td>{{ $festivals->id }}</td>
                    <td>{{ $festivals->place ? $festivals->place->name : 'No Place' }}</td>
                    <td>{{ $festivals->name }}</td>
                    <td>{{ $festivals->description }}</td>
                    <td><img src="{{ $festivals->image}}" alt="Festival Image" style="width: 250px; height: auto;">
                    </td>
                    <td>{{ $festivals->start_date }}</td>
                    <td>{{ $festivals->end_date }}</td>
                    <td>{{ $festivals->time }}</td>
                    <td>
                        <a class="rounded btn btn-success mt-2 mb-4" href="{{ route('festival.edit', $festivals) }} ">Edit</a>
                        <form action="{{ route('festival.destroy', $festivals) }}" method="POST" style="display:inline;">
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


