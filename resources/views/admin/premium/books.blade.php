@extends('layouts.layoutsAdmin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-premium.css') }}">

<div class="adm-wrap">

    <div class="adm-topbar">
        <div class="adm-title">
            <i class="ti ti-crown"></i>
            Kelola Buku Premium
        </div>
        <span class="adm-count">{{ $books->count() }} buku</span>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="adm-alert success">
            <i class="ti ti-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
        <div class="adm-alert danger">
            <i class="ti ti-alert-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="adm-card">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Judul & Penulis</th>
                    <th>Status</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($books as $book)
                    <tr>

                        {{-- Judul --}}
                        <td>
                            <div class="book-info">
                                <span class="book-title-cell">
                                    {{ $book->title }}
                                </span>

                                <span class="book-author-cell">
                                    {{ $book->author }}
                                </span>
                            </div>
                        </td>

                        {{-- Status --}}
                        <td>
                            @if($book->is_premium)
                                <span class="badge-premium">
                                    <i class="ti ti-crown"></i>
                                    Premium
                                </span>
                            @else
                                <span class="badge-biasa">
                                    Biasa
                                </span>
                            @endif
                        </td>

                        {{-- Poin --}}
                        <td>
                            @if($book->is_premium)
                                <span class="poin-val">
                                    <i class="ti ti-star"></i>
                                    {{ number_format($book->premium_point) }}
                                </span>
                            @else
                                <span class="poin-dash">—</span>
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td>
                            <div class="aksi-row">

                                {{-- Jadikan Premium --}}
                                @if(!$book->is_premium)
                                    <form action="{{ route('admin.premium.set', $book->id) }}"
                                          method="POST"
                                          style="display:flex; gap:8px; align-items:center;">
                                        @csrf

                                        <input type="number"
                                               name="premium_point"
                                               class="inp-poin"
                                               placeholder="Poin"
                                               min="1"
                                               required>

                                        <button type="submit" class="btn-set">
                                            <i class="ti ti-crown"></i>
                                            Jadikan Premium
                                        </button>
                                    </form>
                                @else
                                    <span class="txt-premium">
                                        <i class="ti ti-check"></i>
                                        Sudah Premium
                                    </span>
                                @endif

                                {{-- Hapus Premium --}}
                                <form action="{{ route('admin.premium.destroy', $book->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-hapus"
                                            onclick="return confirm('Yakin hapus buku premium ini?')">
                                        <i class="ti ti-trash"></i>
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="adm-empty-row">
                            Tidak ada data buku
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
  @endif

  {{-- TABLE --}}
  <div class="adm-card">
    <table class="adm-table">
      <thead>
        <tr>
          <th>Judul & Penulis</th>
          <th>Status</th>
          <th>Poin</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        @forelse($books as $book)
        <tr>

          {{-- TITLE --}}
          <td>
            <div class="book-info">
              <span class="book-title-cell">{{ $book->title }}</span>
              <span class="book-author-cell">{{ $book->author }}</span>
            </div>
          </td>

          {{-- STATUS --}}
          <td>
            @if($book->is_premium)
              <span class="badge-premium">
                <i class="ti ti-crown"></i> Premium
              </span>
            @else
              <span class="badge-biasa">Biasa</span>
            @endif
          </td>

          {{-- POINT --}}
          <td>
            @if($book->is_premium)
              <span class="poin-val">
                <i class="ti ti-star"></i>
                {{ number_format($book->premium_point) }}
              </span>
            @else
              <span class="poin-dash">—</span>
            @endif
          </td>

          {{-- ACTION --}}
          <td>
            <div class="aksi-row">

              {{-- SET PREMIUM --}}
              @if(!$book->is_premium)
                <form action="{{ route('admin.premium.set', $book->id) }}"
                      method="POST"
                      style="display:flex; gap:8px; align-items:center;">
                  @csrf

                  <input type="number"
                         name="premium_point"
                         class="inp-poin"
                         placeholder="Poin"
                         min="1"
                         required>

                  <button type="submit" class="btn-set">
                    <i class="ti ti-crown"></i> Jadikan Premium
                  </button>
                </form>
              @else
                <span class="txt-premium">
                  <i class="ti ti-check"></i> Sudah Premium
                </span>
              @endif

            </div>
          </td>

        </tr>
        @empty
        <tr>
          <td colspan="4" style="text-align:center; padding:20px;">
            Tidak ada data buku
          </td>
        </tr>
        @endforelse
      </tbody>

    </table>
  </div>

</div>
@endsection