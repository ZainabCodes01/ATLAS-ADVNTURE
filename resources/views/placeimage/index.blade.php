
 @extends('admin.master.app')

@section('content')

<h1>Upload Place Images</h1><br><br>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   {{-- <div class="card-header">
                    <h4>Upload Place Images
                        <a href="{{route('places.index')}}" class="btn btn-primary">Back</a>
                    </h4>
                   </div> --}}
                 <div class="card-body">
                 {{-- <h5>Place Name: {{$places->name}}</h5> --}}

                    {{-- @if ($errors->any())
                       <ul class="alert alert-warning">
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                        </ul>
                    @endif--}}
                    <form action="{{route('placeimage.store', $places->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Upload Images</label>
                            <input type="file" name="images[]" multiple class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="rounded btn btn-primary">Save</button>
                        </div>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <a class="text-success" href="{{ route('places.index') }}">Back to List</a>
@endsection
