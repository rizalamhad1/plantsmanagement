<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Plant;
use App\Models\Supplier;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar transaksi.
     */
    public function index()
    {
        $transactions = Transaction::with(['plant', 'supplier'])->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Menampilkan form untuk menambahkan transaksi baru.
     */
    public function create()
    {
        $plants = Plant::all();
        $suppliers = Supplier::all();
        return view('transactions.create', compact('plants', 'suppliers'));
    }

    /**
     * Menyimpan transaksi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'transaction_type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Simpan transaksi
        $transaction = Transaction::create($request->all());

        // Update stok tanaman
        $plant = Plant::find($request->plant_id);
        if ($request->transaction_type == 'in') {
            $plant->increment('stock', $request->quantity); // Tambah stok
        } else {
            $plant->decrement('stock', $request->quantity); // Kurangi stok
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail transaksi.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Menampilkan form untuk mengedit transaksi.
     */
    public function edit(Transaction $transaction)
    {
        $plants = Plant::all();
        $suppliers = Supplier::all();
        return view('transactions.edit', compact('transaction', 'plants', 'suppliers'));
    }

    /**
     * Mengupdate transaksi di database.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'transaction_type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Update transaksi
        $transaction->update($request->all());

        // Update stok tanaman
        $plant = Plant::find($request->plant_id);
        if ($request->transaction_type == 'in') {
            $plant->increment('stock', $request->quantity); // Tambah stok
        } else {
            $plant->decrement('stock', $request->quantity); // Kurangi stok
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Menghapus transaksi dari database.
     */
    public function destroy(Transaction $transaction)
    {
        // Kembalikan stok tanaman jika transaksi dihapus
        $plant = Plant::find($transaction->plant_id);
        if ($transaction->transaction_type == 'in') {
            $plant->decrement('stock', $transaction->quantity); // Kurangi stok
        } else {
            $plant->increment('stock', $transaction->quantity); // Tambah stok
        }

        // Hapus transaksi
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
    public function addStock(Request $request, $id)
{
    $stock = Stock::find($id);

    // Validasi input
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    // Tambah stok
    $stock->quantity += $request->quantity;
    $stock->save();

    return redirect()->route('stocks.index')->with('success', 'Stok berhasil ditambahkan.');
}
}