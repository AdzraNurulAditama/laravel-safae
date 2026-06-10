@extends('layouts.app')

@section('title', $promotion->title)

@section('content')
<div class="container py-5">

    <div class="card shadow-lg border-0">
        @if($promotion->image)
            <img src="{{ asset($promotion->image) }}"
                 class="card-img-top"
                 style="max-height:450px; object-fit:cover;">
        @endif

        <div class="card-body">

            <h2 class="fw-bold mb-3">
                {{ $promotion->title }}
            </h2>

            @if($promotion->event_date)
                <p class="text-muted">
                    <i class="fas fa-calendar-alt"></i>
                    {{ \Carbon\Carbon::parse($promotion->event_date)->format('d F Y') }}
                </p>
            @endif

            <hr>

            <p>
                {!! nl2br(e($promotion->content)) !!}
            </p>

            <a href="{{ url()->previous() }}"
               class="btn btn-secondary mt-3">
                Kembali
            </a>

        </div>
    </div>

</div>
@endsection