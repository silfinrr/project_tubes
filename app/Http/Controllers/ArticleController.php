<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Menampilkan daftar artikel (Halaman Utama)
    // Ini buat nampilin daftar artikel di halaman utama ya
    public function index(Request $request)
    {
        $search = $request->search; // Judul atau Penulis
        $category = $request->category; // Kategori
        $year = $request->year; // Tahun Publikasi

        // Siapin query buat ambil data artikel
        $articles = Article::query();

        // Kalau ada yang nyari judul atau penulis, filter di sini
        if ($search) {
            $articles->where(function($q) use ($search) {
                $q->where('judul', 'like', "%$search%")
                  ->orWhere('penulis', 'like', "%$search%");
            });
        }

        // Filter berdasarkan Kategori
        if ($category) {
            $articles->where('kategori', 'like', "%$category%");
        }

        // Filter berdasarkan Tahun
        if ($year) {
            $articles->whereYear('tanggal_publikasi', $year);
        }

        $articles = $articles->latest()->paginate(5); // Menampilkan 5 artikel per halaman

        return view('articles.index', compact('articles', 'search', 'category', 'year'));
    }

    // Menampilkan form tambah artikel
    public function create()
    {
        // Eits, cuma admin yang boleh masuk sini ya
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('articles.create');
    }

    // Proses simpan artikel baru ke database
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        // Cek kelengkapan datanya dulu sebelum disimpen
        $request->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'kategori' => 'required',
            'penulis' => 'required',
            'tanggal_publikasi' => 'required',
            'file' => 'required|mimes:pdf|max:5120' // Maksimal 5MB
        ], [
            'judul.required' => 'Judul artikel wajib diisi.',
            'abstrak.required' => 'Abstrak/Deskripsi wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'tanggal_publikasi.required' => 'Tanggal publikasi wajib diisi.',
            'file.required' => 'File PDF wajib diupload.',
            'file.mimes' => 'Format file harus PDF.',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5MB.'
        ]);

        $data = $request->all();

        // Kalau ada filenya, upload dulu ke storage
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('articles', 'public');
            $data['file_path'] = $filePath;
        }

        Article::create($data);

        return redirect('/articles')->with('success', 'Artikel berhasil ditambahkan');
    }

    // Menampilkan form edit artikel
    public function edit(Article $article)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('articles.edit', compact('article'));
    }

    // Update data artikel yang udah ada
    public function update(Request $request, Article $article)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        // Validasi lagi, siapa tau ada yang kosong
        $request->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'kategori' => 'required',
            'penulis' => 'required',
            'tanggal_publikasi' => 'required',
            'file' => 'nullable|mimes:pdf|max:5120'
        ], [
            'judul.required' => 'Judul artikel wajib diisi.',
            'abstrak.required' => 'Abstrak/Deskripsi wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'tanggal_publikasi.required' => 'Tanggal publikasi wajib diisi.',
            'file.mimes' => 'Format file harus PDF.',
            'file.max' => 'Ukuran file tidak boleh lebih dari 5MB.'
        ]);

        $data = $request->all();

        // Cek jika ada file baru yang diupload
        if ($request->hasFile('file')) {
            // File lama kita buang dulu kalau user upload yang baru
            if ($article->file_path && Storage::disk('public')->exists($article->file_path)) {
                Storage::disk('public')->delete($article->file_path);
            }
            
            // Simpan file baru
            $filePath = $request->file('file')->store('articles', 'public');
            $data['file_path'] = $filePath;
        }

        $article->update($data);

        return redirect('/articles')->with('success', 'Artikel berhasil diperbarui');
    }

    // Hapus artikel beserta file-filenya
    public function destroy(Article $article)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        // Bersihin file aslinya dari storage biar gak menu-menuhin server
        if ($article->file_path && Storage::disk('public')->exists($article->file_path)) {
            Storage::disk('public')->delete($article->file_path);
        }

        $article->delete();

        return redirect('/articles')->with('success', 'Artikel berhasil dihapus');
    }

    // Nampilin detail artikel biar bisa dibaca lengkap
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
