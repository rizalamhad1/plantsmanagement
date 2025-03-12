@extends('plants.app')

@section('content')
    <h1>Detail Tanaman</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $plant->name }}</h5>
            <p class="card-text"><strong>Spesies:</strong> {{ $plant->species }}</p>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $plant->description }}</p>
            <a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
            </form>
            <a href="{{ route('plants.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection