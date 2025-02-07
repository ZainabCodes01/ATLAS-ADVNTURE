 @extends('admin.master.app')

@section('content')


    <h1>Create New Slider</h1>

    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
            <div class="container mt-5">
                <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($slider->id !=null)
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="img" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Priority Order</label>
                        <select name="priority_order" class="form-control" required>
                            <option value="">Select Priority Order</option>
                            @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
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

