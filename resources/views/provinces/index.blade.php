
@extends('admin.master.app')

@section('content')

<h1>Province</h1><br><br>
    <a href="{{ route('provinces.create') }}" class="rounded btn btn-primary mb-1">Create Provinces</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class=" table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($provinces as $provincee)
                <tr>
                    <td>{{ $provincee->id }}</td>
                    <td>{{ $provincee->country ? $provincee->country->name : 'No Country' }}</td>

                    <td>{{ $provincee->name }}</td>
                    <td>
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('provinces.edit', $provincee) }} ">Edit</a>
                        <form action="{{ route('provinces.destroy', $provincee) }}" method="POST" style="display:inline;">
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

