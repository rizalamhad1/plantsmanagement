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
    public function addStock(Request $request, $plantId)
{
    $plant = Plant::findOrFail($plantId);

    // Validasi input
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    // Update atau buat stok
    $stock = $plant->stock ?? new Stock(['plant_id' => $plant->id]);
    $stock->quantity += $request->quantity;
    $stock->save();

    return redirect()->route('plants.index')->with('success', 'Stok berhasil ditambahkan.');
}
public function reduceStock(Request $request, $plantId)
{
    $plant = Plant::findOrFail($plantId);

    // Validasi input
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    // Pastikan stok cukup
    $stock = $plant->stock;
    if ($stock && $stock->quantity >= $request->quantity) {
        $stock->quantity -= $request->quantity;
        $stock->save();
    } else {
        return redirect()->back()->with('error', 'Stok tidak mencukupi.');
    }

    return redirect()->route('plants.index')->with('success', 'Stok berhasil dikurangi.');
}
}
