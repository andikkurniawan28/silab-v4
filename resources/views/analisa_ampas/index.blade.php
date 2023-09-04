@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("analisa ampas") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa ampas") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("analisa_ampas.create") }}">
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
                            <th>Zat kering</td>
                            <th>Kadar air</td>
                            <th>Pol</td>
                            <th>Analis</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analisa_ampas as $analisa_ampas)
                        <tr>
                            <td>{{ $analisa_ampas->id }}</td>
                            <td>{{ $analisa_ampas->created_at }}</td>
                            <td>{{ $analisa_ampas->sample_id }}</td>
                            <td>{{ $analisa_ampas->sample->material->name ?? "" }}</td>
                            <td>{{ $analisa_ampas->zat_kering }}</td>
                            <td>{{ $analisa_ampas->kadar_air }}</td>
                            <td>{{ $analisa_ampas->pol }}</td>
                            <td>{{ $analisa_ampas->user->name }}</td>
                            <td>
                                <form action="{{ route("analisa_ampas.destroy", $analisa_ampas->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("analisa_ampas.edit", $analisa_ampas->id) }}">
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

