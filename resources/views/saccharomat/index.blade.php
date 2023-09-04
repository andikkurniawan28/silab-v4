@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("saccharomat") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("saccharomat") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("saccharomat.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
            <div class="table-responsive"><br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>Barcode</td>
                            <th>Material</td>
                            <th>%Brix</td>
                            <th>%Pol</td>
                            <th>Pol</td>
                            <th>HK</td>
                            <th>R</td>
                            <th>Analis</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saccharomat as $saccharomat)
                        <tr>
                            <td>{{ $saccharomat->id }}</td>
                            <td>{{ $saccharomat->created_at }}</td>
                            <td>{{ $saccharomat->sample_id }}</td>
                            <td>{{ $saccharomat->sample->material->name ?? "" }}</td>
                            <td>{{ $saccharomat->pbrix }}</td>
                            <td>{{ $saccharomat->ppol }}</td>
                            <td>{{ $saccharomat->pol }}</td>
                            <td>{{ $saccharomat->hk }}</td>
                            <td>{{ $saccharomat->rendemen }}</td>
                            <td>{{ $saccharomat->user->name }}</td>
                            <td>
                                <form action="{{ route("saccharomat.destroy", $saccharomat->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("saccharomat.edit", $saccharomat->id) }}">
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

