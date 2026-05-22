@extends('layouts.app')

@section('title', 'Buku Favorit')

@section('content')

<style>
    /* Styling khusus Halaman Favorit */
    .favorite-header {
        color: #f1f5f9;
        font-weight: 800;
        margin-bottom: 30px;
    }

    .book-card {
        background: #1e293b;
        border: 1px solid #334155;
        border-radius: 20px;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }

    .book-card:hover {
        transform: translateY(-5px);
        border-color: #ef4444; /* Aksen merah untuk buku favorit */
        box-shadow: 0 10px 20px rgba(239, 68, 68, 0.1);
    }

    .card-img-wrapper {
        height: 240px;
        overflow: hidden;
        position: relative;
    }

    .card-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .book-card:hover .card-img-wrapper img {
        transform: scale(1.05);
    }

    .card-body {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .book-title {
        color: #f1f5f9;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-footer {
        background: transparent !important;
        border-top: 1px solid #334155;
        padding: 15px;
    }
    
    /* Tombol Hapus */
    .btn-remove {
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s;
        color: #f87171;
        border: 1px solid #f87171;
        background: transparent;
    }
    
    .btn-remove:hover {
        background: #ef4444;
        color: #fff;
    }

    /* Tampilan Kosong (Empty State) */
    .empty-state {
        background: #1e293b;
        border: 2px dashed #334155;
        border-radius: 20px;
        padding: 60px 20px;
        text-align: center;
    }
</style>

<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h3 class="favorite-header mb-0">
            <i class="fa-solid fa-heart text-danger me-2"></i> Buku Favorit Saya
        </h3>
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        @forelse ($favorites as $fav)
            <div class="col">
                <div class="book-card shadow-sm">
                    
                    <a href="{{ route('fullbacaan.show', $fav->book->id) }}" class="text-decoration-none">
                        <div class="card-img-wrapper">
                            <img src="{{ $fav->book->image_path ? asset($fav->book->image_path) : 'https://via.placeholder.com/300x400?text=No+Cover' }}" 
                                 alt="{{ $fav->book->title }}">
                        </div>
                        
                        <div class="card-body text-center">
                            <h6 class="book-title" title="{{ $fav->book->title }}">
                                {{ $fav->book->title }}
                            </h6>
                            <small class="text-muted">
                                <i class="fa-solid fa-user me-1"></i> {{ $fav->book->author }}
                            </small>
                        </div>
                    </a>

                    <div class="card-footer text-center">
                        <form action="{{ route('favorite.hapus') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $fav->book->id }}">
                            <button class="btn btn-remove btn-sm w-100">
                                <i class="fa-solid fa-heart-crack me-1"></i> Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="empty-state shadow-sm">
                    <i class="fa-solid fa-book-heart fa-4x text-muted mb-3"></i>
                    <h4 class="text-white fw-bold mb-2">Belum ada buku favorit</h4>
                    <p class="text-muted mb-4">Jelajahi koleksi Safae dan simpan buku kesukaanmu di sini!</p>
                    <a href="{{ route('genre.index') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-bold" style="background: #38bdf8; color: #0f172a; border: none;">
                        <i class="fa-solid fa-magnifying-glass me-2"></i> Mulai Eksplorasi
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>

@endsection