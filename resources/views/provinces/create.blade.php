@extends('admin.master.app')

@section('content')
<h1>{{ $provincee->id ? 'Edit Province' : 'Create Province' }}</h1>

<form action="{{ $provincee->id ? route('provinces.update', $provincee->id) : route('provinces.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($provincee->id)
        @method('PUT')
    @endif

    <table class="table table-bordered">
        <tr>
            <td><label for="country" class="form-label">Country</label></td>
            <td>
                <select name="country_id" id="country" class="form-control" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id', $provincee->country_id) == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>


        <tr>
            <td><label for="name" class="form-label">Province Name</label></td>
            <td>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $provincee->name) }}" required>
            </td>
        </tr>

        <tr>
            <td><label for="img" class="form-label">Image</label></td>
            <td>
                @if($provincee->image)
                    <img src="{{ asset($provincee->image) }}" width="120" class="img-thumbnail mb-2">
                @endif
                <input type="file" name="img" id="img" class="form-control">
            </td>
        </tr>

        <tr>
            <td colspan="2" class="text-center">
                <button class="btn btn-primary" type="submit">Save</button>
            </td>
        </tr>
    </table>
</form>

<a class="text-success" href="{{ route('provinces.index') }}">Back to List</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function loadProvinces(countryId, selectedProvinceId = null){
        if(!countryId){
            $('#provincee').html('<option value="">Select Province</option>');
            return;
        }
        $.ajax({
            url: '/get-provinces/' + countryId,
            type: 'GET',
            success: function(data){
                $('#provincee').html('<option value="">Select Province</option>');
                $.each(data, function(i, province){
                    let selected = (province.id == selectedProvinceId) ? 'selected' : '';
                    $('#provincee').append('<option value="'+province.id+'" '+selected+'>'+province.name+'</option>');
                });
            }
        });
    }

    // country change
    $('#country').on('change', function(){
        loadProvinces($(this).val());
    });

    // edit page default
    let selectedCountry = "{{ $provincee->country_id }}";
    let selectedProvince = "{{ $provincee->id }}";
    if(selectedCountry){
        loadProvinces(selectedCountry, selectedProvince);
    }
});
</script>

@endsection
