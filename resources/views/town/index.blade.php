@extends('admin.master.app')

@section('content')

<h1>Town</h1><br><br>
    <a href="{{ route('town.create') }}" class="rounded btn btn-primary mb-1">Create Town</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class=" table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>City</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($town as $twon)
                <tr>
                    <td>{{ $twon->id }}</td>
                    <td>{{ $twon->city ? $twon->city->name : 'No City' }}</td>
                    <td>{{ $twon->name }}</td>
                    <td><img src="{{ $twon->image}}" alt="Town Image" style="width: 250px; height: auto;">
                    </td>
                    <td>
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('town.edit', $twon) }} ">Edit</a>
                        <form action="{{ route('town.destroy', $twon) }}" method="POST" style="display:inline;">
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


