@extends('plants.app')

@section('content')
    <h1>Edit Tanaman</h1>
    <form action="{{ route('plants.update', $plant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $plant->name }}" required>
        </div>
        <div class="mb-3">
            <label for="species" class="form-label">Spesies</label>
            <input type="text" class="form-control" id="species" name="species" value="{{ $plant->species }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $plant->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('plants.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection