@extends('admin.master.app')

@section('content')

<h1>City</h1><br><br>
    <a style="background-color:#0C243C; color:#C9D1D5"  href="{{ route('city.create') }}" class="rounded btn mb-1">Create City</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped w-100">

        <thead class="table" style="background-color:#0C243C; color:#C9D1D5" >

            <tr>
                <th>ID</th>
                <th>Province</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach($city as $citys)
                <tr>
                    <td>{{ $citys->id }}</td>
                    <td>{{ $citys->province ? $citys->province->name : 'No Province' }}</td>
                    <td>{{ $citys->name }}</td>
                    <td><img src="{{ $citys->image}}" alt="City Image" style="width: 250px; height: auto;">
                    </td>
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

<div class="mt-3 me-5">
    {{$city->links('pagination::bootstrap-5')}}
</div>
@endsection
