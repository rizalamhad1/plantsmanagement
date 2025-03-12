@extends('plants.app')

@section('content')
    <h1>Daftar Supplier</h1>
    <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Phone</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->contact_person }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>
                        <a href="{{ route('supplier.show', $supplier->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection