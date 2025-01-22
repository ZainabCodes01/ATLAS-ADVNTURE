{{-- @extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Places</title>
</head>
<body>
    <h1>Create New Places</h1>

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <div class="container mt-5">
                <form action="{{$image->id !=null? route('placeimage.update', $place): route('placeimage.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($image->id !=null)
                        @method('PUT')
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label for="place_id" class="form-label">{{ __('Select Places') }}</label>

                            <select name="place_id" id="place_id" class="form-control" >
                                <option value="{{null}}">Select Places</option>
                                @foreach ($places as $place)

                                <option value="{{$place->id}}">{{$image->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="image_path" class="form-label">Image_path</label>
                            <input type="file" name="image_paths" multiple required value="{{$image->image_path}}">
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-6">
                            <label for="caption" class="form-label">Caption</label>
                            <input type="text" class="form-control" name="caption" id="caption" value="{{ $image->caption }}" required>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </tbody>
    </table>


    <a class="text-success" href="{{ route('places.index') }}">Back to List</a>
</body>
</html>

@endsection --}}
