
@extends('admin.master.app')

@section('content')

<h1>Countries</h1><br><br>
    <a href="{{ route('countries.create') }}" class="rounded btn btn-primary mb-1">Create Countries</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class=" table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $countrie)
                <tr>
                    <td>{{ $countrie->id }}</td>
                    <td>{{ $countrie->name }}</td>
                    <td><img src="{{ $countrie->image}}" alt="Country Image" style="width: 250px; height: auto;">
                    </td>
                    <td>
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('countries.edit', $countrie) }} ">Edit</a>
                        <form action="{{ route('countries.destroy', $countrie) }}" method="POST" style="display:inline;">
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

