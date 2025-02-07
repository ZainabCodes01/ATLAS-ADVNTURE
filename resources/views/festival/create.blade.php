 @extends('admin.master.app')

@section('content')


    <h1>Create New Festival</h1>

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <div class="container mt-5">
                <form action="{{$festivals->id !=null? route('festival.update', $festivals): route('festival.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($festivals->id !=null)
                        @method('PUT')
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">

                            <label for="place_id" class="form-label">{{ __('Select Places') }}</label>

                            <select name="place_id" id="place_id" class="form-control" >
                                <option value="{{null}}">Select Places</option>
                                @foreach ($places as $place)

                                <option value="{{$place->id}}">{{$place->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Festival Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $festivals->name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $festivals->description }}" required>
                        </div>
                        <div class="row mb-3">
                            <input type="file" name="img">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $festivals->start_date }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $festivals->end_date }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" id="time" value="{{ $festivals->time }}" required>
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


@endsection

