@extends('layouts.app')

@section('title', 'Dashboard User - Safae')

@section('content')
<style>
    /* Dark Mode Overrides */
    .dashboard-card {
        background: #1e293b; /* Sidebar color */
        border: 1px solid #334155;
        color: #f1f5f9;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }
    
    .dashboard-card:hover { transform: translateY(-5px); border-color: #38bdf8; }
    
    .card-header { background: transparent !important; border-bottom: 1px solid #334155 !important; }
    
    .section-title { color: #f1f5f9; font-weight: 600; }
    .section-title::after { background: linear-gradient(90deg, #38bdf8, #667eea); }
    
    .text-muted { color: #94a3b8 !important; }
    .text-dark { color: #f1f5f9 !important; }
    
    .list-group-item { background: transparent; color: #f1f5f9; border-bottom: 1px solid #334155 !important; }
    .list-group-item:hover { background: #334155; }
    
    .welcome-banner {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        border: 1px solid #334155;
        color: white;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
    }
</style>

<div class="container-fluid px-4 py-5">
    <div class="welcome-banner shadow">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-2 text-white"><i class="fas fa-hand-sparkles me-2 text-primary"></i>Selamat Datang, {{ Auth::user()->username }}!</h2>
                <p class="mb-0 text-muted">Selamat membaca dan jelajahi koleksi buku kami hari ini</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <div class="d-flex justify-content-md-end align-items-center">
                    <div class="me-3 text-start">
                        <div class="fs-4 fw-bold text-primary">{{ $userPoints }}</div>
                        <small class="text-muted">Total Poin</small>
                    </div>
                    <i class="fas fa-trophy fa-3x text-warning opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        @php
            $stats = [
                ['title' => 'Total Buku', 'val' => $totalBooks, 'icon' => 'fa-book', 'color' => 'text-primary'],
                ['title' => 'Pengguna', 'val' => $totalUsers, 'icon' => 'fa-users', 'color' => 'text-success'],
                ['title' => 'Dibaca', 'val' => $userBooksRead, 'icon' => 'fa-book-reader', 'color' => 'text-info'],
                ['title' => 'Review', 'val' => $userReviews, 'icon' => 'fa-star', 'color' => 'text-warning']
            ];
        @endphp
        
        @foreach($stats as $s)
        <div class="col-xl-3 col-md-6">
            <div class="card dashboard-card p-3">
                <div class="d-flex align-items-center">
                    <i class="fas {{ $s['icon'] }} {{ $s['color'] }} fa-2x me-3 opacity-75"></i>
                    <div>
                        <h6 class="text-muted mb-0">{{ $s['title'] }}</h6>
                        <h3 class="mb-0 fw-bold text-white">{{ number_format($s['val']) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-6">
            <div class="card dashboard-card h-100">
                <div class="card-header py-3">
                    <h5 class="section-title mb-0"><i class="fas fa-book-open me-2 text-primary"></i>Sedang Dibaca</h5>
                </div>
                <div class="card-body">
                    @forelse($recentBooks as $history)
                        <a href="{{ route('book.show', $history->book->id) }}" class="list-group-item d-flex align-items-center py-2">
                            <img src="{{ asset($history->book->image_path ?? 'images/default-book.jpg') }}" width="45" height="60" class="rounded me-3 object-fit-cover">
                            <div>
                                <h6 class="mb-0">{{ $history->book->title }}</h6>
                                <small class="text-muted">{{ $history->book->author }} • {{ $history->last_read_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @empty
                        <p class="text-muted text-center py-4">Belum ada buku yang dibaca.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card dashboard-card h-100">
                <div class="card-header py-3">
                    <h5 class="section-title mb-0"><i class="fas fa-chart-pie me-2 text-success"></i>Genre Populer</h5>
                </div>
                <div class="card-body">
                    @foreach($popularGenres as $genre)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>{{ $genre->genre }}</span>
                            <span class="text-muted">{{ $genre->total }} buku</span>
                        </div>
                        <div class="progress progress-bar-custom bg-secondary">
                            <div class="progress-bar bg-success" style="width: {{ ($genre->total / max(1, $totalBooks)) * 100 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection