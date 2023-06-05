<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(5)->through(fn ($car)=>[
            'id' => $car->id,
            'brand' => $car->brand,
            'model' => $car->model,
            'year' => $car->year,
            'price' => $car->price,
        ]);

        return Inertia::render('Cars/Index', compact('cars'));
    }

    public function create()
    {
        return Inertia::render('Cars/Create', [
            'errors' => session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object)[],
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $car = new Car();
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->price = $request->input('price');


        $car->save();

        return Redirect::route('cars.index')->with('message', 'Cars Added Successfully');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);

        return Inertia::render('Cars/Show', compact('car'));
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return Inertia::render('Cars/Edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->price = $request->input('price');
        $car->save();

        Session::flash('message', 'Updated Successfully');

        return Inertia::location(route('cars.index'));

    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        Session::flash('message', 'Deleted Successfully');

        return Inertia::location(route('cars.index'));
    }
}

