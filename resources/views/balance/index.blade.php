@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("neraca NM") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("neraca NM") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("balance.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
            <div class="table-responsive"><br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>{{ ucfirst("tebu") }}</td>
                            <th>{{ ucfirst("totalizer") }}</td>
                            <th>{{ ucfirst("flow") }}</td>
                            <th>{{ strtoupper("sfc") }}</td>
                            <th>{{ strtoupper("nm%tebu") }}</td>
                            <th>{{ ucfirst("user") }}</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balance as $balance)
                        <tr>
                            <td>{{ $balance->id }}</td>
                            <td>{{ $balance->created_at }}</td>
                            <td>{{ $balance->tebu }}</td>
                            <td>{{ $balance->totalizer_nm }}</td>
                            <td>{{ $balance->flow_nm }}</td>
                            <td>{{ $balance->sfc }}</td>
                            <td>{{ $balance->nm_persen_tebu }}</td>
                            <td>{{ $balance->user->name ?? "" }}</td>
                            <td>
                                <form action="{{ route("balance.destroy", $balance->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("balance.edit", $balance->id) }}">
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

