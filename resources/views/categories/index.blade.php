@extends('admin.master.app')

@section('content')

<h1>Categories</h1><br><br>
    <a style="background-color:#0C243C; color:#C9D1D5" href="{{ route('categories.create') }}" class="rounded btn mb-1">Create Categories</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped w-100">

        <thead class="table" style="background-color:#0C243C; color:#C9D1D5" >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td><img src="{{ $category->image}}" alt="Category Image" style="width: 250px; height: auto;">
                    </td>
                    <td>
                        <a class="rounded btn btn-success mt-2 mb-4" href="{{ route('categories.edit', $category) }} ">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
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

