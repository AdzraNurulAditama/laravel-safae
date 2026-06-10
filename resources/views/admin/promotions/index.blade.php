@extends('layouts.layoutsAdmin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3>Kelola Promosi</h3>

        <a href="{{ route('admin.promotions.create') }}"
           class="btn btn-primary">
            Tambah Promosi
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($promotions as $promo)
            <tr>
                <td>{{ $promo->title }}</td>
                <td>{{ $promo->event_date }}</td>
                <td>

                    <a href="{{ route('admin.promotions.edit',$promo->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.promotions.destroy',$promo->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection