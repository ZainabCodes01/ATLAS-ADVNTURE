
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
                <th>Country_id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($provinces as $provins)
                <tr>
                    <td>{{ $provins->id }}</td>
                    <td>{{ $provins->country_id }}</td>
                    <td>{{ $provins->name }}</td>
                    <td>
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('provinces.edit', $provins) }} ">Edit</a>
                        <form action="{{ route('provinces.destroy', $provins) }}" method="POST" style="display:inline;">
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

