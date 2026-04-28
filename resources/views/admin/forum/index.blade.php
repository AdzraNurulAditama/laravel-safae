@extends('layouts.layoutsAdmin')

@section('title', 'Kelola Forum')

@section('content')

<div class="container mt-4">
    <h2 class="fw-bold mb-3">Kelola Forum</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4 shadow-sm">

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Judul Topik</th>
                    <th>Pembuat</th>
                    <th>Tanggal</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($topics as $topic)
                <tr>
                    <td>{{ $topic->judul }}</td>
                    <td>{{ $topic->user->username ?? $topic->user->name ?? 'User' }}</td>
                    <td>{{ $topic->created_at->format('d/m/Y') }}</td>

                    <td>
                        {{-- DETAIL --}}
                        <a href="{{ route('admin.forum.detail', $topic->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        {{-- HAPUS --}}
                        <form method="POST"
                              action="{{ route('admin.forum.destroy', $topic->id) }}"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Hapus topik ini?')"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Belum ada topik forum
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
