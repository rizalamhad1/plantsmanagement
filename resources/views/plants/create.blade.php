@extends('plants.app')

@section('content')
    <h1>Tambah Tanaman Baru</h1>
    <form action="{{ route('plants.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="species" class="form-label">Spesies</label>
            <input type="text" class="form-control" id="species" name="species">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('plants.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection