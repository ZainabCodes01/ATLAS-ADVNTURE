@extends('admin.master.app')

@section('content')

<script src="{{asset('js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('summernote-0.9.0-dist/summernote-lite.min.css')}}">
<script src="{{asset('summernote-0.9.0-dist/summernote-lite.min.js')}}"></script>

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
                        <label for="description" id="description" class="form-label">Description</label>
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

    <script>
        $('#description').summernote({
          placeholder: 'Hello stand alone ui',
          tabsize: 2,
          height: 120,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
        });
      </script>

@endsection



