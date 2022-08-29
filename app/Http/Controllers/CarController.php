<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('brand')->get();

        return view('cars.list', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get();
        return view('cars.form',[
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_id' => 'required',
            'model' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'mileage' => 'required|integer',
        ]);

        $car = new Car();
        $car->brand_id = $request->brand_id;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->mileage = $request->mileage;
        $car->save();

        return redirect('/cars')->with('success', 'Car has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::get();
        return view('cars.form',[
            'car' => $car,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand_id' => 'required',
            'model' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')),
            'mileage' => 'required|integer',
        ]);

        $car = Car::findOrFail($id);
        $car->brand_id = $request->brand_id;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->mileage = $request->mileage;
        $car->save();

        return redirect('/cars')->with('success', 'Car has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect('/cars')->with('success', 'Car has been deleted successfully!');
    }

}
