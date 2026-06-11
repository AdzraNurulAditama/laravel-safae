@extends('layouts.app')

@section('title', 'Buku Premium')

@section('content')

<link rel="stylesheet" href="{{ asset('css/buku-premium.css') }}">

<div class="bp-wrap">

  {{-- SUCCESS --}}
  @if(session('success'))
  <div class="bp-alert success">
    <i class="ti ti-circle-check"></i>
    {{ session('success') }}
  </div>
  @endif

  {{-- ERROR --}}
  @if(session('error'))
  <div class="bp-alert danger">
    <i class="ti ti-alert-circle"></i>
    {{ session('error') }}
  </div>
  @endif

  {{-- TOP BAR --}}
  <div class="bp-topbar">
    <div class="bp-title">
      <i class="ti ti-crown"></i>
      Buku Premium
    </div>

    <div class="bp-poin-badge">
      <i class="ti ti-star"></i>
      Poin kamu:
      <strong>{{ number_format(auth()->user()->points ?? 0) }} Poin</strong>
    </div>
  </div>

  {{-- EMPTY STATE --}}
  @if($books->count() == 0)
    <div class="bp-empty">
      <div class="bp-empty-icon"><i class="ti ti-books"></i></div>
      <div class="bp-empty-title">Belum ada buku premium</div>
      <p class="bp-empty-desc">Buku premium akan muncul di sini setelah disetujui.</p>
    </div>
  @else

  {{-- GRID --}}
  <div class="bp-grid">

    @foreach($books as $book)

      @php
        $sudahDitukar = \App\Models\PenukaranPoint::where('user_id', auth()->id())
                          ->where('book_id', $book->id)
                          ->exists();
      @endphp

      <div class="bp-card">

        {{-- COVER IMAGE (FIX UTAMA DI SINI) --}}
        <div class="bp-cover">

          @if($book->cover_image)

            {{-- FIX: support images/, covers/, atau storage/ --}}
            <img src="
              {{
                str_starts_with($book->cover_image, 'http')
                ? $book->cover_image
                : (
                    str_starts_with($book->cover_image, 'storage/')
                    ? asset($book->cover_image)
                    : asset('storage/' . $book->cover_image)
                  )
              }}
              "
              alt="{{ $book->title }}">

          @else
            <div class="bp-cover-placeholder">
              <i class="ti ti-book"></i>
            </div>
          @endif

          <div class="bp-badge-premium">
            <i class="ti ti-crown"></i> Premium
          </div>

          @if($sudahDitukar)
            <div class="bp-badge-owned">
              <i class="ti ti-check"></i> Dimiliki
            </div>
          @endif

        </div>

        {{-- BODY --}}
        <div class="bp-body">
          <div class="bp-book-title">{{ $book->title }}</div>
          <div class="bp-author">{{ $book->author }}</div>

          <div class="bp-desc">
            {{ \Illuminate\Support\Str::limit($book->description, 90) }}
          </div>

          <div class="bp-poin-row">
            <i class="ti ti-star"></i>
            <span class="bp-poin-val">
              {{ number_format($book->premium_point ?? 0) }} Poin
            </span>
          </div>
        </div>

        {{-- FOOTER --}}
        <div class="bp-footer">

          @if($sudahDitukar)

            <a href="{{ route('book.show', $book->id) }}" class="btn-baca">
              <i class="ti ti-book-2"></i> Baca buku
            </a>

          @else

            <form action="{{ route('premium.tukar', $book->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn-tukar">
                <i class="ti ti-exchange"></i> Tukarkan poin
              </button>
            </form>

          @endif

        </div>

      </div>

    @endforeach

  </div>
  @endif

</div>

@endsection