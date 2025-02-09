@extends('admin.master.app')

@section('content')

<h1>Slider</h1><br><br>
    <a href="{{ route('slider.create') }}" class="rounded btn btn-primary mb-1">Create Slider</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered ">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Priority Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td><img src="{{ $slider->image}}" alt="Slider Image" style="width: 250px; height: auto;">
                    </td>
                    <td>{{ $slider->priority_order  }}</td>
                     <td>
                        <a class="rounded btn btn-success mt-2 mb-2" href="{{ route('slider.edit', $slider) }} ">Edit</a>
                        <form action="{{ route('slider.destroy', $slider) }}" method="POST" style="display:inline;">
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


