@extends('layouts.article')

@section('content')
<div class="card shadow-sm">
<div class="card-header">Edit Artikel</div>
<div class="card-body">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/articles/{{ $article->id }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-2">
    <label>Judul</label>
    <input class="form-control" name="judul" value="{{ old('judul', $article->judul) }}">
</div>

<div class="mb-2">
    <label>Abstrak / Deskripsi</label>
    <textarea class="form-control" name="abstrak" rows="3">{{ old('abstrak', $article->abstrak) }}</textarea>
</div>

<div class="mb-2">
    <label>Kategori</label>
    <input class="form-control" name="kategori" value="{{ old('kategori', $article->kategori) }}">
</div>

<div class="mb-2">
    <label>Penulis</label>
    <input class="form-control" name="penulis" value="{{ old('penulis', $article->penulis) }}">
</div>

<div class="mb-2">
    <label>Tanggal</label>
    <input type="date" class="form-control" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', $article->tanggal_publikasi) }}">
</div>

<div class="mb-3">
    <label class="form-label">File PDF</label>
    @if($article->file_path)
        <div class="mb-2">
            <a href="{{ asset('storage/' . $article->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                📄 Lihat File Saat Ini
            </a>
        </div>
    @endif
    <input type="file" class="form-control" name="file" accept=".pdf">
    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file.</small>
</div>

<button class="btn btn-pink">Update</button>

</form>
</div>
</div>
@endsection
