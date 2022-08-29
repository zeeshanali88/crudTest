@extends('layouts.master')
@section('content')
    <div class="from-wrap p-3 w-50 mx-auto">
        <form action="{{ url('cars/'.(isset($car) ? $car->id : '')) }}" method="post">
            @if(isset($car))
               @method('PUT')
            @endif
            {{ @csrf_field() }}
            @if(count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Brand</label>
                <select class="form-select" name="brand_id" aria-label="Default select example" required>
                    <option value="">Please select a brand</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @if(isset($car) && $brand->id === $car->brand_id) selected @endif >
                        {{ $brand->name }}
                    </option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="forModel" class="form-label">Model</label>
                <input type="text" class="form-control" id="forModel" required name="model" value="{{isset($car) ? $car->model: ''}}">
            </div>
            <div class="mb-3">
                <label for="forYear" class="form-label">Year</label>
                <input type="number" class="form-control" id="forYear" required name="year" value="{{isset($car) ? $car->year: ''}}">
            </div>
            <div class="mb-3">
                <label for="forMileage" class="form-label">Mileage</label>
                <input type="number" class="form-control" id="forMileage" required  name="mileage" value="{{isset($car) ? $car->mileage: ''}}">
            </div>
            <div class="pull-right">
                <a href="{{ url('cars') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

@endsection
