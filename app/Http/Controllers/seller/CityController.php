<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('state')->get();
        return view('seller.city.list', compact('cities'));
    }

    public function create()
    {
        $states = State::all();
        return view('seller.city.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
        ]);

        City::create($request->all());

        return redirect()->route('seller.city.list')->with('success', 'City added successfully.');
    }

    public function list()
    {
        $cities = City::with('state')->get();
        return view('seller.city.list', compact('cities'));
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        $states = State::all();
        return view('seller.city.edit', compact('city', 'states'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        return redirect()->route('city.list')->with('success', 'City updated successfully');
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('city.list')->with('success', 'City deleted successfully.');
    }
}
