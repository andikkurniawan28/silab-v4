@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("analisa khusus") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa khusus") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("analisa_khusus.create") }}">
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
                            <th>{{ strtoupper("tsai") }}</td>
                            <th>{{ strtoupper("od") }}</td>
                            <th>{{ ucfirst("succr") }}</td>
                            <th>{{ ucfirst("glucc") }}</td>
                            <th>{{ ucfirst("fruct") }}</td>
                            <th>{{ ucfirst("gured") }}</td>
                            <th>{{ ucfirst("kapur") }}</td>
                            <th>{{ ucfirst("phosp") }}</td>
                            <th>{{ strtoupper("pi") }}</td>
                            <th>{{ ucfirst("sabut") }}</td>
                            <th>Analis</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analisa_khusus as $analisa_khusus)
                        <tr>
                            <td>{{ $analisa_khusus->id }}</td>
                            <td>{{ $analisa_khusus->created_at }}</td>
                            <td>{{ $analisa_khusus->sample_id }}</td>
                            <td>{{ $analisa_khusus->sample->material->name ?? "" }}</td>
                            <td>{{ $analisa_khusus->tsai }}</td>
                            <td>{{ $analisa_khusus->optical_density }}</td>
                            <td>{{ $analisa_khusus->succrose }}</td>
                            <td>{{ $analisa_khusus->glucose }}</td>
                            <td>{{ $analisa_khusus->fructose }}</td>
                            <td>{{ $analisa_khusus->gula_reduksi }}</td>
                            <td>{{ $analisa_khusus->kadar_kapur }}</td>
                            <td>{{ $analisa_khusus->kadar_phospat }}</td>
                            <td>{{ $analisa_khusus->preparation_index }}</td>
                            <td>{{ $analisa_khusus->kadar_sabut }}</td>
                            <td>{{ $analisa_khusus->user->name }}</td>
                            <td>
                                <form action="{{ route("analisa_khusus.destroy", $analisa_khusus->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("analisa_khusus.edit", $analisa_khusus->id) }}">
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

