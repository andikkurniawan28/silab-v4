@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("kartu Core") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("kartu Core") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("core_card.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
            <div class="table-responsive"><br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ strtoupper("id") }}</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>{{ ucfirst("lokasi") }}</td>
                            <th>{{ strtoupper("rfid") }}</td>
                            <th>{{ ucfirst("petugas") }}</td>
                            <th>{{ ucfirst("action") }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_card as $core_card)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $core_card->created_at }}</td>
                            <td>{{ $core_card->core->name ?? "" }}</td>
                            <td>{{ $core_card->rfid }}</td>
                            <td>{{ $core_card->user->name ?? "" }}</td>
                            <td>
                                <form action="{{ route("core_card.destroy", $core_card->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("core_card.edit", $core_card->id) }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>



@endsection

