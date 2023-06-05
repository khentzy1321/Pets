<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Inertia\Inertia;
use App\Models\PetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PetController extends Controller
{
    public function index()
    {
        $petcateg = PetCategory::get();

        $pets = Pet::paginate(5)->through(fn ($pet)=>[
            'id' => $pet->id,
            'pet_name' => $pet->pet_name,
            'pet_type' => $pet->pet_type,
            'pet_color' => $pet->pet_color,
            'pet_species' => $pet->petCategory->pet_species,
        ]);

        return Inertia::render('Pets/Index', compact('pets', 'petcateg'));
    }

    public function create()
    {
        $petcategories = PetCategory::all();

        return Inertia::render('Pets/Create', [
            'errors' => session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object)[],
            'petcategories' => $petcategories
        ]);


        return Inertia::render('Pets/Create', compact('petcategories'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pet_name' => 'required|string',
            'pet_type' => 'required|string',
            'pet_color' => 'required|string',
            'petspecies_id' => 'required|exists:pet_categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


            $pet = new Pet();
            $pet->pet_name = $request->input('pet_name');
            $pet->pet_type = $request->input('pet_type');
            $pet->pet_color = $request->input('pet_color');
            $pet->petspecies_id = $request->input('petspecies_id');

            $pet->save();

        return Redirect::route('pets.index')->with('message', 'Pets Added Successfully');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);

        return Inertia::render('Pets/Show', compact('pet'));
    }
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);

        return Inertia::render('Pets/Edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->pet_name = $request->input('pet_name');
        $pet->pet_type = $request->input('pet_type');
        $pet->pet_color = $request->input('pet_color');
        $pet->petspecies_id = $request->input('petspecies_id');
        $pet->save();

        Session::flash('message', 'Updated Successfully');

        return Inertia::location(route('pets.index'));

    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        Session::flash('message', 'Deleted Successfully');

        return Inertia::location(route('pets.index'));
    }
}

