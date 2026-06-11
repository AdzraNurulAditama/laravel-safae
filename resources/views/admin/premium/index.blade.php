@extends('layouts.layoutsAdmin')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">
        Kelola Buku Premium
    </h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>Penulis</th>
                        <th>Judul Buku</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th>Harga Poin</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($requests as $request)

                    <tr>

                        <td>
                            {{ $request->user->username }}
                        </td>

                        <td>
                            {{ $request->book->title }}
                        </td>

                        <td>

                            @if($request->status == 'pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                            @elseif($request->status == 'approved')

                                <span class="badge bg-success">
                                    Approved
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Rejected
                                </span>

                            @endif

                        </td>

                        <td>

                            @if($request->status == 'pending')

                                <form action="{{ route('admin.premium.approve',$request->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    <button class="btn btn-success btn-sm">

                                        Approve

                                    </button>

                                </form>

                                <form action="{{ route('admin.premium.reject',$request->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    <button class="btn btn-danger btn-sm">

                                        Reject

                                    </button>

                                </form>

                            @else

                                -

                            @endif

                        </td>

                    </tr>

                    <td>

@if($request->status == 'pending')

<form
action="{{ route('admin.premium.approve',$request->id) }}"
method="POST">

    @csrf

    <input
        type="number"
        name="premium_point"
        class="form-control mb-2"
        placeholder="500">

    <button
        class="btn btn-success btn-sm">

        Approve

    </button>

</form>

@endif

</td>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            Belum ada pengajuan premium

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection