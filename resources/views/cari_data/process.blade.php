@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("cari_data") }}">Cari Data</a></li>
          <li class="breadcrumb-item active" aria-current="page">Hasil {{ ucfirst("cari Data") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Hasil {{ ucfirst("cari Data") }}</h5>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ strtoupper("id") }}</td>
                            <th>{{ ucfirst("masuk") }}</td>
                            <th>{{ strtoupper("spta") }}</td>
                            <th>{{ ucfirst("brix") }}</td>
                            <th>{{ ucfirst("varietas") }}</td>
                            <th>{{ ucfirst("kawalan") }}</td>
                            <th>{{ ucfirst("status") }}</td>
                            <th>{{ ucfirst("antrian") }}</td>
                            <th>{{ ucfirst("register") }}</td>
                            <th>{{ ucfirst("nopol") }}</td>
                            <th>{{ ucfirst("petani") }}</td>
                            <th>{{ ucfirst("dicore") }}</td>
                            <th>{{ ucfirst("core") }}</td>
                            <th>{{ ucfirst("dianalisa") }}</td>
                            <th>{{ strtoupper("ari") }}</td>
                            <th>{{ ucfirst("dinilai") }}</td>
                            <th>{{ ucfirst("score") }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->spta }}</td>
                            <td>{{ $data->brix }}</td>
                            <td>{{ $data->variety->name ?? "-" }}</td>
                            <td>{{ $data->kawalan->name ?? "-" }}</td>
                            <td>{{ $data->status->name ?? "-" }}</td>
                            <td>{{ $data->barcode_antrian ?? "-" }}</td>
                            <td>{{ $data->register ?? "-" }}</td>
                            <td>{{ $data->nopol ?? "-" }}</td>
                            <td>{{ $data->petani ?? "-" }}</td>
                            <td>{{ $data->analisa_core->created_at ?? "-" }}</td>
                            <td>{{ $data->analisa_core->rendemen ?? "-" }}</td>
                            <td>{{ $data->analisa_ari->created_at ?? "-" }}</td>
                            <td>{{ $data->analisa_ari->rendemen ?? "-" }}</td>
                            <td>{{ $data->scoring->created_at ?? "-" }}</td>
                            <td>{{ $data->scoring->score ?? "-" }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
