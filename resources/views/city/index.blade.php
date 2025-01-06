@extends('admin.master.app')

@section('content')

<h1>City</h1><br><br>
    <a href="{{ route('city.create') }}" class="rounded btn btn-primary mb-1">Create City</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class=" table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Province_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($city as $citys)
                <tr>
                    <td>{{ $citys->id }}</td>
                    <td>{{ $citys->name }}</td>
                    <td>{{ $citys->province_id}}</td>

                    <td>
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('city.edit', $citys) }} ">Edit</a>
                        <form action="{{ route('city.destroy', $citys) }}" method="POST" style="display:inline;">
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
