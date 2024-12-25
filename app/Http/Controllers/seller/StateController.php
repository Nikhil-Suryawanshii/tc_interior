<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function create()
    {
        return view('seller.state.create');
    }   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $state = new State();
        $state->name = $request->name;

        $state->save();

        return redirect()->route('state.list')->with('success', 'State created successfully');
    }   

    public function list()
    {
        $states = State::all();
        return view('seller.state.list', compact('states'));
    }

    public function edit($id)
    {
        $state = State::find($id);
        return view('seller.state.edit', compact('state'));
    }

    public function update(Request $request, $id)
    {
        $state = State::find($id);
        $state->name = $request->name;
        $state->save();
        return redirect()->route('state.list')->with('success', 'State updated successfully');
    }

    public function delete($id)
    {
        $state = State::find($id);
        $state->delete();
        return redirect()->route('state.list')->with('success', 'State deleted successfully');
    }
}
