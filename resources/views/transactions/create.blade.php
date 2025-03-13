@extends('layouts.app')

@section('content')
    <h1>Tambah Transaksi Baru</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="plant_id" class="form-label">Tanaman</label>
            <select class="form-control" id="plant_id" name="plant_id" required>
                @foreach ($plants as $plant)
                    <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Pemasok</label>
            <select class="form-control" id="supplier_id" name="supplier_id">
                <option value="">Pilih Pemasok</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="transaction_type" class="form-label">Jenis Transaksi</label>
            <select class="form-control" id="transaction_type" name="transaction_type" required>
                <option value="in">Masuk</option>
                <option value="out">Keluar</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="mb-3">
            <label for="transaction_date" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection