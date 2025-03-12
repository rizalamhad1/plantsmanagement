@extends('plants.app')

@section('content')
    <h1>Daftar Tanaman</h1>
    <a href="{{ route('plants.create') }}" class="btn btn-primary mb-3">Tambah Tanaman</a>

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
                <th>Spesies</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plants as $plant)
                <tr>
                    <td>{{ $plant->id }}</td>
                    <td>{{ $plant->name }}</td>
                    <td>{{ $plant->species }}</td>
                    <td>{{ $plant->description }}</td>
                    <td>
                        <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" class="d-inline">
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