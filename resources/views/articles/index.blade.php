@extends('layouts.article')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="form-control"
                       placeholder="Cari judul atau penulis...">
            </div>
            
            <div class="col-md-3">
                <input type="text" name="category" value="{{ request('category') }}"
                       class="form-control"
                       placeholder="Filter Kategori...">
            </div>

            <div class="col-md-2">
                <select name="year" class="form-control">
                    <option value="">Semua Tahun</option>
                    @for($y = date('Y'); $y >= 2020; $y--)
                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-pink flex-grow-1">Cari / Filter</button>
                <a href="/articles" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="row mb-2">
    <div class="col-12 text-end">
        <span class="badge bg-pink text-white p-2">
            Total Artikel Ditemukan: {{ $articles->total() }}
        </span>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        Data Artikel
    </div>

    <div class="card-body">

        @auth
        @if(auth()->user()->role === 'admin')
        <a href="/articles/create" class="btn btn-pink mb-3">
            + Tambah Artikel
        </a>
        @endif
        @endauth

        <table class="table table-bordered align-middle">
            <tr class="table-primary">
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Tanggal</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>

            @forelse($articles as $article)
            <tr>
                <td>{{ $article->judul }}</td>
                <td>{{ $article->kategori }}</td>
                <td>{{ $article->penulis }}</td>
                <td>{{ $article->tanggal_publikasi }}</td>
                <td>
                     <a href="/articles/{{ $article->id }}" class="btn btn-sm btn-info text-white">
                         Detail & Preview
                     </a>
                </td>
                <td>

                    @auth
                    @if(auth()->user()->role === 'admin')
                    <a href="/articles/{{ $article->id }}/edit"
                       class="btn btn-sm btn-pink">
                        Edit
                    </a>

                    <button type="button" class="btn btn-sm btn-danger" 
                            onclick="confirmDelete({{ $article->id }})">
                        Hapus
                    </button>
                    @else
                    <span class="text-muted">Lihat saja</span>
                    @endif
                    @endauth

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">
                    Data artikel belum tersedia
                </td>
            </tr>
            @endforelse
        </table>

    <div class="d-flex justify-content-center mt-3">
            {{ $articles->withQueryString()->links() }}
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus artikel ini? Data yang dihapus tidak dapat dikembalikan.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form id="deleteForm" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function confirmDelete(id) {
        var form = document.getElementById('deleteForm');
        form.action = '/articles/' + id;
        var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
</script>

@endsection
