@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-3">
        {{ $promotion->title }}
    </h2>

    @if($promotion->image)
        <img src="{{ asset($promotion->image) }}"
             class="img-fluid rounded mb-4">
    @endif

    <p class="text-muted">
        {{ $promotion->event_date }}
    </p>

    <div class="card shadow-sm">
        <div class="card-body">

            {!! nl2br(e($promotion->content)) !!}

        </div>
    </div>

</div>

@endsection