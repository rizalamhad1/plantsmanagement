<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;


class SupplierController extends Controller
{
    // Method untuk menampilkan daftar supplier
    public function index()
    {
        $suppliers = Supplier::all(); // Ambil semua data supplier
        return view('suppliers.index', compact('suppliers')); // Kirim data ke view
    }

    // Method untuk menampilkan form tambah supplier
    public function create()
    {
        return view('suppliers.create');
    }

    // Method untuk menyimpan supplier baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'contact_person' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        // Simpan data ke database
        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Method untuk menampilkan detail supplier
    public function show($id)
{
    $supplier = Supplier::find($id); // Ambil data supplier berdasarkan ID
    return view('suppliers.show', compact('supplier')); // Kirim variabel $supplier ke view
}

    // Method untuk menampilkan form edit supplier
    public function edit($id)
{
    $supplier = Supplier::find($id); // Ambil data supplier berdasarkan ID
    return view('suppliers.edit', compact('supplier')); // Kirim variabel $supplier ke view
}

    // Method untuk mengupdate supplier
    public function update(Request $request, Supplier $supplier)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'contact_person' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        // Update data di database
        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    // Method untuk menghapus supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}