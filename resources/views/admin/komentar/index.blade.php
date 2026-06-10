@extends('layouts.layoutsAdmin') 

@section('title', 'Kelola Komentar')

@push('styles')
    <style>
        /* ================= PREMIUM SaaS OBSIDIAN DESIGN ================= */
        .page-wrapper {
            background: transparent;
            color: var(--text);
            padding: 10px 0;
        }

        /* Header Kolom Lapisan Atas */
        .list-header-labels {
            display: flex;
            padding: 0 24px 12px;
            color: var(--muted);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        /* Container Daftar Baris */
        .comment-list-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Baris Komentar Bergaya Row Card */
        .comment-row-card {
            display: flex;
            align-items: center;
            background: var(--sidebar-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 18px 24px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .comment-row-card:hover {
            border-color: rgba(6, 182, 212, 0.25);
            background: rgba(17, 24, 39, 0.7);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Pengaturan Lebar Kolom Flexbox */
        .col-comment-user { flex: 1.2; display: flex; align-items: center; gap: 12px; }
        .col-comment-text { flex: 2.5; color: #cbd5e1; font-size: 0.95rem; padding-right: 15px; }
        .col-comment-source { flex: 1.8; display: flex; flex-direction: column; gap: 2px; }
        .col-comment-actions { flex: 0.8; text-align: right; display: flex; justify-content: flex-end; }

        /* Avatar Box Mini */
        .comment-avatar-box {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            font-size: 0.85rem;
        }

        /* Label Lokasi Buku & Halaman */
        .source-book-title {
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 220px;
        }
        .source-page-badge {
            font-size: 0.75rem;
            color: var(--primary);
            font-family: var(--font-mono, monospace);
        }

        /* Tombol Aksi Hapus Minimalis */
        .btn-action-purge {
            background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5 !important;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-action-purge:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: #ef4444;
            color: #ef4444 !important;
        }

        /* Custom Alert Notification */
        .alert-console-success {
            background: rgba(16, 185, 129, 0.05);
            border: 1px solid rgba(16, 185, 129, 0.15);
            color: #a7f3d0;
            border-radius: 10px;
        }

        /* Kustomisasi Navigasi Pagination Laravel */
        .pagination-wrapper {
            margin-top: 25px;
        }
        .pagination-wrapper .pagination {
            gap: 5px;
        }
        .pagination-wrapper .page-item .page-link {
            background: var(--sidebar-bg);
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 6px;
            padding: 8px 14px;
        }
        .pagination-wrapper .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #0b0f19;
            font-weight: 700;
        }

        /* Responsif Layout */
        @media (max-width: 992px) {
            .list-header-labels { display: none; }
            .comment-row-card { flex-direction: column; align-items: flex-start; gap: 14px; padding: 20px; }
            .col-comment-user, .col-comment-text, .col-comment-source, .col-comment-actions { width: 100%; }
            .col-comment-actions { justify-content: flex-start; margin-top: 5px; }
        }
    </style>
@endpush

@section('content')
<div class="container-fluid px-0 page-wrapper" style="max-width: 1300px;">

    {{-- ================= HEADER UTAMA HALAMAN ================= --}}
    <div class="mb-4">
        <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb mb-0" style="font-size: 0.8rem;">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}" style="color: var(--muted); text-decoration: none;">Dashboard</a></li>
                <li class="breadcrumb-item active" style="color: var(--primary);" aria-current="page">Kelola Komentar</li>
            </ol>
        </nav>
        <h2 class="fw-bold text-white m-0" style="font-size: 1.8rem; letter-spacing: -0.5px;">Kelola Komentar</h2>
    </div>

    {{-- ================= NOTIFIKASI SUKSES SISTEM ================= --}}
    @if(session('success'))
        <div class="alert alert-console-success rounded-3 shadow-sm mb-4 py-3 px-4 small d-flex align-items-center gap-2">
            <i class="fas fa-check-circle text-success fs-5"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    {{-- ================= LABEL HEADER SUB-KOLOM ================= --}}
    <div class="list-header-labels">
        <div class="col-comment-user">User</div>
        <div class="col-comment-text">Isi Komentar</div>
        <div class="col-comment-source">Lokasi Bacaan</div>
        <div class="col-comment-actions">Aksi</div>
    </div>

    {{-- ================= MAIN LIST CONTAINER ================= --}}
    <div class="comment-list-container">
        @forelse($komentar as $k)
            <div class="comment-row-card shadow-sm">
                
                {{-- KOLOM 1: INFO PENGGUNA --}}
                <div class="col-comment-user">
                    <div class="comment-avatar-box">
                        <i class="fas fa-user-ninja"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-white" style="font-size: 0.9rem;">{{ $k->user->username ?? '-' }}</div>
                        <span class="text-muted font-monospace" style="font-size: 0.72rem; opacity: 0.7;">UID #{{ $k->user->id ?? '0' }}</span>
                    </div>
                </div>

                {{-- KOLOM 2: ISI KOMENTAR --}}
                <div class="col-comment-text">
                    {{ $k->komentar }}
                </div>

                {{-- KOLOM 3: LOKASI BUKU DAN HALAMAN --}}
                <div class="col-comment-source">
                    <div class="source-book-title" title="{{ $k->book->title ?? '-' }}">
                        <i class="fas fa-book me-1 opacity-50" style="font-size: 0.8rem;"></i>
                        {{ $k->book->title ?? '-' }}
                    </div>
                    <span class="source-page-badge">
                        Halaman {{ $k->page }}
                    </span>
                </div>

                {{-- KOLOM 4: TOMBOL KONTROL HAPUS --}}
                <div class="col-comment-actions">
                    <form action="{{ route('admin.komentar.hapus', $k->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permanen komentar ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action-purge">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>

            </div>
        @empty
            {{-- TAMPILAN JIKA DATA KOSONG --}}
            <div class="text-center py-5" style="background: var(--sidebar-bg); border: 1px dashed var(--border); border-radius: 12px;">
                <div class="py-4 opacity-50">
                    <i class="fas fa-comments-slash fa-2.5x mb-3 text-secondary"></i>
                    <div class="small fw-semibold text-muted">Belum ada data komentar yang masuk dalam database.</div>
                </div>
            </div>
        @endforelse
    </div>

    {{-- ================= FOOTER: LINK PAGINATION SYSTEM ================= --}}
    <div class="pagination-wrapper d-flex justify-content-center">
        {{ $komentar->links() }}
    </div>

</div>
@endsection