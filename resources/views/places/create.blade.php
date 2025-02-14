@extends('admin.master.app')

@section('content')

{{-- <script src="{{asset('js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('summernote-0.9.0-dist/summernote-lite.min.css')}}">
<script src="{{asset('summernote-0.9.0-dist/summernote-lite.min.js')}}"></script> --}}
    <h1>Create New Places</h1>

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <div class="container mt-5">
                <form action="{{$placesc->id !=null? route('places.update', $placesc): route('places.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($placesc->id !=null)
                        @method('PUT')
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Place Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $placesc->name }}" required>
                        </div>
                        <div class="col-md-6">

                            <label for="external_url" class="form-label">External URL</label>
                            <input type="external_url" class="form-control" name="external_url" id="location" placeholder="Enter External URL" value="{{$placesc->external_url}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="thumbnail" class="form-label">Thumbnail</label><br>
                            <input type="file" name="thumbnails" value="{{$placesc->thumbnail}}"  required >
                        </div>
                        <div class="col-md-6">
                            <label for="image_path" class="form-label">Image_Path</label>
                            <input type="file" name="image_path[]" value="{{$placesc->image_path}}" multiple required >
                        </div>
{{--
                      <div class="col-md-6">
                        <label for="image_path" class="form-label">Image Path</label><br>
                        <a  class="rounded btn btn-primary" href="{{route('placeimage.index', $placesc)}}">Add & View Images</a>
                        </div> --}}
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-6">
                            <label for="lat" class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="lat" id="lat" placeholder="Enter latitude" value="{{$placesc->lat}}">
                        </div>
                        <div class="col-md-6">
                            <label for="lng" class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="lng" id="lng" placeholder="Enter longitude" value="{{$placesc->lng}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label for="category_id" class="form-label">{{ __('Select Category') }}</label>

                            <select name="category_id" id="category_id" class="form-control" >
                                <option value="{{null}}">Select Category</option>
                                @foreach ($categories as $category)

                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">

                            <label for="country_id" class="form-label">{{ __('Select Country') }}</label>

                            <select name="country_id" id="country_id" class="form-control" >
                                <option value="{{null}}">Select Country</option>
                                @foreach ($countries as $country)

                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label for="province_id" class="form-label">{{ __('Select Province') }}</label>

                            <select name="province_id" id="province_id" class="form-control" >
                                <option value="{{null}}">Select Provinces</option>

                            </select>
                        </div>
                        <div class="col-md-6">

                            <label for="city_id" class="form-label">{{ __('Select City') }}</label>

                            <select name="city_id" id="city_id" class="form-control" >
                                <option value="{{null}}">Select City</option>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label for="town_id" class="form-label">{{ __('Select Town') }}</label>

                            <select name="town_id" id="town_id" class="form-control" >
                                <option value="{{null}}">Select Town</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Enter location" value="{{$placesc->location}}">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" value="{{$placesc->description}}">
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
    {{-- <script>
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
      </script> --}}



<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){

        $('#country_id').on('change',function(){
            var country_id=$('#country_id').val();

            if(country_id){
                $.ajax({
                    url:'/getProvinces',
                    type:'GET',
                    data: {someattribute:country_id},
                    success : function(response){
                        $('#province_id').html(response);
                    },
                    error:function(response){

                    }
                });

            }
        });


        $('#province_id').on('change',function(){
            var province_id=$('#province_id').val();

            if(province_id){
                $.ajax({
                    url:'/getCities',
                    type:'GET',
                    data: {someattribute:province_id},
                    success : function(response){
                        $('#city_id').html(response);
                    },
                    error:function(response){

                    }
                });

            }
        });

        $('#city_id').on('change',function(){
            var city_id=$('#city_id').val();

            if(city_id){
                $.ajax({
                    url:'/getTown',
                    type:'GET',
                    data: {someattribute:city_id},
                    success : function(response){
                        $('#town_id').html(response);
                    },
                    error:function(response){

                    }
                });

            }
        });
    });
</script>
@endsection

