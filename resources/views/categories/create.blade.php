@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Categories</title>
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
$(document).ready(function() {
  $('#description').summernote();
});
</script> --}}

</head>
<body>
    <h1>Create New  Categories</h1>

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
        
            <form action="{{$category->id !=null? route('categories.update', $category): route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($category->id !=null)
                    @method('PUT')
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description">{{ $category->description }}</textarea>
                    </div>
                </div>

                <div>
                    <input type="file" name="img">
                </div>


                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </tbody>
    </table>


    <a class="text-success" href="{{ route('categories.index') }}">Back to List</a>
</body>
</html>
@endsection



