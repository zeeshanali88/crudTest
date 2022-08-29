@extends('layouts.master')
@section('content')
    <div class="table-responsive mt-3">
        <div class="d-flex justify-content-end">
            <a href="{{url('cars/create')}}" class="btn btn-success right">Add New</a>
        </div>
        @if(Session::has('success'))
            <div class = "alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
            <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Mileage</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $idx => $car)
            <tr>
                <th scope="row">{{ $idx + 1 }}</th>
                <td>{{ $car->brand->name }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->mileage }}</td>
                <td>
                    <a href="{{ url('cars/'.$car->id.'/edit/') }}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="deleteCar({{$car->id}})">
                        <i class="fa fa-trash" aria-hidden="true"></i>

                    </a>
                    <form method="POST" action="{{ url('cars/'.$car->id) }}" id="car_delete_{{$car->id}}">
                        {{ csrf_field() }}
                        @method('DELETE')
                    </form>


                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <script type="text/javascript">
       function deleteCar(id) {
            var c = confirm('Are you sure you want to delete?');
            if(c) {
                document.getElementById('car_delete_'+id).submit();

            }
        }
    </script>
@endsection
