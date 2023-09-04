@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("analisa SO2/BJB") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa SO2/BJB") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("analisa_sulphur.create") }}">
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
                            <th>{{ strtoupper("so2") }}</td>
                            <th>{{ strtoupper("bjb") }}</td>
                            <th>Analis</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analisa_sulphur as $analisa_sulphur)
                        <tr>
                            <td>{{ $analisa_sulphur->id }}</td>
                            <td>{{ $analisa_sulphur->created_at }}</td>
                            <td>{{ $analisa_sulphur->sample_id }}</td>
                            <td>{{ $analisa_sulphur->sample->material->name ?? "" }}</td>
                            <td>{{ $analisa_sulphur->so2 }}</td>
                            <td>{{ $analisa_sulphur->bjb }}</td>
                            <td>{{ $analisa_sulphur->user->name }}</td>
                            <td>
                                <form action="{{ route("analisa_sulphur.destroy", $analisa_sulphur->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("analisa_sulphur.edit", $analisa_sulphur->id) }}">
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
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("analisa_sulphur.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
        </div>
    </div>
</div>



@endsection

