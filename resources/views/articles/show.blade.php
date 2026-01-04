@extends('layouts.article')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Detail Artikel</span>
        <a href="/articles" class="btn btn-sm btn-light">Kembali</a>
    </div>
    <div class="card-body">
        <h2 class="mb-3">{{ $article->judul }}</h2>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 150px;">Penulis</th>
                        <td>: {{ $article->penulis }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: {{ $article->kategori }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Upload</th>
                        <td>: {{ $article->tanggal_publikasi }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <h5>Abstrak / Deskripsi</h5>
            <p class="text-justify bg-light p-3 rounded border">
                {{ $article->abstrak ?? 'Tidak ada deskripsi.' }}
            </p>
        </div>

        <div>
            <h5 class="mb-3">Preview File</h5>
            @if($article->file_path)
                <div class="ratio ratio-16x9 border">
                    <iframe src="{{ asset('storage/' . $article->file_path) }}" allowfullscreen></iframe>
                </div>
                <div class="mt-2 text-end">
                    <a href="{{ asset('storage/' . $article->file_path) }}" target="_blank" class="btn btn-pink">
                        Download / Buka Fullscreen
                    </a>
                </div>
            @else
                <div class="alert alert-warning">File PDF tidak tersedia.</div>
            @endif
        </div>
    </div>
</div>
@endsection
