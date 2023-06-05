<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Inertia\Inertia;
use App\Models\PetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PetCategoryController extends Controller
{

public function index()
{
    $petspecies = PetCategory::all();

    return Inertia::render('PetCategory/Index', [
        'petspecies' => $petspecies,
    ]);


}

public function create()
{
    return Inertia::render('PetCategory/Create', [
        'errors' => session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object)[],
    ]);
}

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'pet_species' => 'required|string|unique:pet_categories|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $petCategory = new PetCategory();
    $petCategory->pet_species = $request->input('pet_species');
    $petCategory->save();

    return redirect()->route('petcategories.index');
}

public function edit($id)
{
    $petCategory = PetCategory::findOrFail($id);

    return Inertia::render('PetCategory/Edit', [
        'petCategory' => $petCategory,
        'errors' => session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object)[],
    ]);
}
public function show($id)
{

    $petCategory = PetCategory::with('pets')->findOrFail($id);


    return Inertia::render('PetCategory/Show', [
        'petCategory' => $petCategory,
    ]);
}

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'pet_species' => 'required|string|unique:pet_categories,pet_species,' . $id . '|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $petCategory = PetCategory::findOrFail($id);
    $petCategory->pet_species = $request->input('pet_species');
    $petCategory->save();

    Session::flash('message', 'Updated Successfully');

    return Inertia::location(route('petcategories.index'));

}

public function destroy($id)
{
    $petCategory = PetCategory::findOrFail($id);
    $petCategory->delete();

    return redirect()->route('petcategories.index');
}
}
