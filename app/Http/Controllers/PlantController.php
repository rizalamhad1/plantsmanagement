<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'nullable',
            'description' => 'nullable',
        ]);

        Plant::create($request->all());

        return redirect()->route('plants.index')->with('success', 'Tanaman berhasil ditambahkan.');
    }

    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'nullable',
            'description' => 'nullable',
        ]);

        $plant->update($request->all());

        return redirect()->route('plants.index')->with('success', 'Tanaman berhasil diperbarui.');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('plants.index')->with('success', 'Tanaman berhasil dihapus.');
    }
}
