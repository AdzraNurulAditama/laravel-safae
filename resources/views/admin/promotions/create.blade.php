@extends('layouts.app')

@section('content')
<div class="container">

<h3>Tambah Promosi</h3>

<form action="{{ route('admin.promotions.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Judul</label>
        <input type="text"
               name="title"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Gambar</label>
        <input type="file"
               name="image"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi Singkat</label>
        <textarea name="short_description"
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Isi Berita</label>
        <textarea name="content"
                  rows="8"
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Tanggal Event</label>
        <input type="date"
               name="event_date"
               class="form-control">
    </div>

    <button class="btn btn-success">
        Simpan
    </button>

</form>

</div>
@endsection