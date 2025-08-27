@extends('admin.master.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New City</title>
</head>
<body>


    <table class="table table-bordered">
        <thead class="table-light">
        </thead>
        <tbody>
    <form action="{{ $citys->id ? route('city.update', $citys) : route('city.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($citys->id)
            @method('PUT')
        @endif

        {{-- Country --}}
        <tr>
            <td><label for="country" class="form-label">Country</label></td>
            <td>
                <select name="country_id" id="country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $citys->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        {{-- Province --}}
        <tr>
            <td><label for="province" class="form-label">Province</label></td>
            <td>
                <select name="province_id" id="province" class="form-control">
                    <option value="">Select Province</option>
                    {{-- Provinces will be loaded dynamically --}}
                </select>
            </td>
        </tr>

       <tr>
            <td><label for="name" class="form-label">City Name</label></td>
            <td>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $citys->name) }}" required>
            </td>
        </tr>

        {{-- Image --}}
        <tr>
            <td><label for="img" class="form-label">Image</label></td>
            <td>
                @if($citys->image)
                    <div class="mb-2">
                        <img src="{{ asset($citys->image) }}" alt="Image" width="120" class="img-thumbnail">
                        <p class="text-muted">{{ basename($citys->image) }}</p>
                    </div>
                @endif
                <input type="file" name="img" id="img" class="form-control">
            </td>
        </tr>

        {{-- Submit --}}
        <tr>
            <td colspan="2" class="text-center">
                <button class="btn btn-primary" type="submit">Save</button>
            </td>
        </tr>
    </form>
</tbody>
    </table>

    <a class="text-success" href="{{ route('city.index') }}">Back to List</a>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    let countrySelect = document.getElementById("country");
    let provinceSelect = document.getElementById("province");
    let citysSelect = document.getElementById("citys");

    function loadProvinces(country_id, selectedProvinceId = null) {
        fetch(`/get-provinces/${country_id}`)
            .then(res => res.json())
            .then(data => {
                provinceSelect.innerHTML = '<option value="">Select Province</option>';
                data.forEach(province => {
                    let selected = (province.id == selectedProvinceId) ? 'selected' : '';
                    provinceSelect.innerHTML += `<option value="${province.id}" ${selected}>${province.name}</option>`;
                });

                // auto load cities if province is pre-selected
                if (selectedProvinceId) {
                    loadCities(selectedProvinceId, "{{ $citys->id ?? '' }}");
                }
            });
    }

    function loadCities(province_id, selectedcitysId = null) {
        fetch(`/get-cities/${province_id}`)
            .then(res => res.json())
            .then(data => {
                citysSelect.innerHTML = '<option value="">Select citys</option>';
                data.forEach(citys => {
                    let selected = (citys.id == selectedcitysId) ? 'selected' : '';
                    citysSelect.innerHTML += `<option value="${citys.id}" ${selected}>${citys.name}</option>`;
                });
            });
    }

    // Events
    countrySelect.addEventListener("change", function() {
        loadProvinces(this.value);
        citysSelect.innerHTML = '<option value="">Select citys</option>'; // reset cities
    });

    provinceSelect.addEventListener("change", function() {
        loadCities(this.value);
    });

    // On edit page load
    @if($citys->id)
        if (countrySelect.value) {
            loadProvinces(countrySelect.value, "{{ $citys->province_id }}");
        }
    @endif
});

</script>
</body>
</html>
@endsection
