@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/reward.css') }}">
<div class="reward-wrapper">
<div class="reward-layout">

{{-- KIRI: USER POINT CARD --}}
@if($currentUser)
<div class="user-point-card">
  <div class="user-card-top">
    @if(Auth::user()->foto_profil)
      <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}"
        class="rounded-circle" width="52" height="52" style="object-fit:cover; flex-shrink:0;">
    @else
      <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}&background=B5D4F4&color=042C53"
        class="rounded-circle" width="52" height="52" style="flex-shrink:0;">
    @endif
    <div>
      <h4>{{ $currentUser->username }}</h4>
      <div class="user-level">{{ $level }} Member</div>
    </div>
  </div>
  <div class="uc-divider"></div>
  <div class="poin-row">
    <div class="poin-icon-box">⭐</div>
    <div>
      <div class="point-total">{{ number_format($currentUser->points) }}</div>
      <div class="point-label">total poin</div>
    </div>
  </div>
  <div class="reward-action">
    <a href="{{ route('premium.books') }}" class="btn-tukar">
      🎁 Tukarkan poin
    </a>
    <a href="{{ route('reward.detail') }}" class="btn-detail">
      📊 Detail reward
    </a>
  </div>
</div>
@endif

{{-- KANAN: LEADERBOARD --}}
<div class="leaderboard-card">
  <div class="lb-header">
    <span class="icon-trophy">🏆</span>
    Leaderboard
  </div>
  <div class="top-three">
    @foreach($ranking->take(3) as $index => $user)
    <div class="top-card rank-{{ $index + 1 }}">
      <div class="badge-medal">{{ $index + 1 }}</div>
      @if($user->foto_profil)
        <img src="{{ asset('storage/' . $user->foto_profil) }}"
          class="tc-avatar" style="object-fit:cover;">
      @else
        <div class="tc-avatar">
          {{ strtoupper(substr($user->username, 0, 2)) }}
        </div>
      @endif
      <div class="tc-name">{{ $user->username }}</div>
      <div class="tc-pts">{{ number_format($user->points) }} pts</div>
    </div>
    @endforeach
  </div>
  <div class="rank-list">
    @foreach($ranking->skip(3) as $index => $user)
    <div class="rank-item">
      <span class="rank-number">{{ $index + 4 }}</span>
      @if($user->foto_profil)
        <img src="{{ asset('storage/' . $user->foto_profil) }}"
          class="avatar-sm" style="object-fit:cover;">
      @else
        <div class="avatar-sm">
          {{ strtoupper(substr($user->username, 0, 2)) }}
        </div>
      @endif
      <strong>{{ $user->username }}</strong>
      <span class="points">{{ number_format($user->points) }} pts</span>
    </div>
    @endforeach
  </div>
</div>

</div>
</div>
@endsection