@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("analisa ketel") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa ketel") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("analisa_ketel.create") }}">
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
                            <th>TDS</td>
                            <th>pH</td>
                            <th>Kesadahan</td>
                            <th>Phospat</td>
                            <th>Analis</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analisa_ketel as $analisa_ketel)
                        <tr>
                            <td>{{ $analisa_ketel->id }}</td>
                            <td>{{ $analisa_ketel->created_at }}</td>
                            <td>{{ $analisa_ketel->sample_id }}</td>
                            <td>{{ $analisa_ketel->sample->material->name ?? "" }}</td>
                            <td>{{ $analisa_ketel->tds }}</td>
                            <td>{{ $analisa_ketel->ph }}</td>
                            <td>{{ $analisa_ketel->kesadahan }}</td>
                            <td>{{ $analisa_ketel->phospat }}</td>
                            <td>{{ $analisa_ketel->user->name }}</td>
                            <td>
                                <form action="{{ route("analisa_ketel.destroy", $analisa_ketel->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("analisa_ketel.edit", $analisa_ketel->id) }}">
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

