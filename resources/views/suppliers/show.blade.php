@extends('layouts.app')

@section('content')
    <h1>Detail Supplier</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $supplier->name }}</h5>
            <p class="card-text"><strong>Contact Person:</strong> {{ $supplier->contact_person }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $supplier->phone }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $supplier->address }}</p>
            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
            </form>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection