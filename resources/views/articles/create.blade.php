@extends('layouts.article')

@section('content')
<div class="card shadow-sm">
<div class="card-header">Tambah Artikel</div>
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

<form method="POST" action="/articles" enctype="multipart/form-data">
@csrf

<div class="mb-2">
    <input class="form-control @error('judul') is-invalid @enderror" 
           name="judul" value="{{ old('judul') }}" placeholder="Judul">
    @error('judul') <span class="text-danger small">{{ $message }}</span> @enderror
</div>

<div class="mb-2">
    <textarea class="form-control @error('abstrak') is-invalid @enderror" 
              name="abstrak" placeholder="Abstrak / Deskripsi" rows="3">{{ old('abstrak') }}</textarea>
    @error('abstrak') <span class="text-danger small">{{ $message }}</span> @enderror
</div>

<div class="mb-2">
    <input class="form-control @error('kategori') is-invalid @enderror" 
           name="kategori" value="{{ old('kategori') }}" placeholder="Kategori">
    @error('kategori') <span class="text-danger small">{{ $message }}</span> @enderror
</div>

<div class="mb-2">
    <input class="form-control @error('penulis') is-invalid @enderror" 
           name="penulis" value="{{ old('penulis') }}" placeholder="Penulis">
    @error('penulis') <span class="text-danger small">{{ $message }}</span> @enderror
</div>

<div class="mb-2">
    <input type="date" class="form-control @error('tanggal_publikasi') is-invalid @enderror" 
           name="tanggal_publikasi" value="{{ old('tanggal_publikasi') }}">
    @error('tanggal_publikasi') <span class="text-danger small">{{ $message }}</span> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Upload File PDF</label>
    <input type="file" class="form-control @error('file') is-invalid @enderror" 
           name="file" accept=".pdf">
    @error('file') <span class="text-danger small">{{ $message }}</span> @enderror
</div>

<button class="btn btn-pink">Simpan</button>

</form>
</div>
</div>
@endsection
