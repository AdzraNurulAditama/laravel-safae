@extends('layouts.app')

@section('title', $buku->title . ' - Halaman ' . $page)

@section('content')

<style>
    /* Styling khusus Halaman Baca */
    .reader-container {
        max-width: 850px;
        margin: 0 auto;
        background: #1e293b;
        padding: 40px;
        border-radius: 20px;
        border: 1px solid #334155;
    }

    .reader-header h1 { font-weight: 800; color: #38bdf8; margin-bottom: 10px; }
    
    .meta-info { color: #94a3b8; font-size: 0.95rem; margin-bottom: 30px; }
    .meta-info i { margin-right: 5px; color: #38bdf8; }

    .reader-content {
        font-size: 1.25rem;
        line-height: 1.9;
        color: #e2e8f0;
        margin-bottom: 50px;
        text-align: justify;
    }

    /* Tombol Navigasi */
    .btn-reader {
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s;
        border: none;
    }
    .btn-blue { background: #38bdf8; color: #0f172a; }
    .btn-blue:hover { background: #7dd3fc; }
    
    .btn-yellow { background: #fbbf24; color: #0f172a; }
    .btn-yellow:hover { background: #fcd34d; }
    
    .btn-outline { border: 2px solid #334155; color: #94a3b8; }
    .btn-outline:hover { background: #334155; color: white; }
</style>

<div class="container">
    <div class="reader-container">
        <div class="reader-header text-center">
            <h1>{{ $buku->title }}</h1>
            <div class="meta-info">
                <i class="fa-solid fa-user"></i> {{ $buku->author }} &nbsp; | &nbsp; 
                <i class="fa-solid fa-tag"></i> {{ $buku->genre }} &nbsp; | &nbsp;
                <i class="fa-solid fa-book-open"></i> Halaman {{ $page }} / {{ $totalHalaman }}
            </div>
        </div>

        <div class="reader-content">
            <p>{{ $halaman }}</p>
        </div>

        <div class="buttons d-flex flex-wrap gap-2 justify-content-center pt-4 border-top border-secondary">
            
            @if($page > 1)
                <a href="{{ route('book.show', ['id' => $buku->id, 'page' => $page - 1]) }}" class="btn btn-reader btn-blue">
                    <i class="fa-solid fa-arrow-left me-2"></i> Sebelumnya
                </a>
            @endif

            @if($page < $totalHalaman)
                <a href="{{ route('book.show', ['id' => $buku->id, 'page' => $page + 1]) }}" class="btn btn-reader btn-blue">
                    Selanjutnya <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            @else
                <button onclick="alert('🎉 Kamu telah selesai membaca buku ini!')" class="btn btn-reader btn-blue">
                    <i class="fa-solid fa-check me-2"></i> Selesai Membaca
                </button>
                <a href="{{ route('ulasan.index', ['id' => $buku->id]) }}" class="btn btn-reader btn-yellow">
                    <i class="fa-solid fa-star me-2"></i> Beri Ulasan
                </a>
            @endif

            <a href="{{ route('genre.index') }}" class="btn btn-reader btn-outline">
                <i class="fa-solid fa-list me-2"></i> Daftar Buku
            </a>

            <a href="{{ route('komentar.index', ['bookId' => $buku->id, 'page' => $page]) }}" class="btn btn-reader btn-yellow">
                <i class="fa-solid fa-comments me-2"></i> Komentar
            </a>
        </div>
    </div>
</div>

@endsection