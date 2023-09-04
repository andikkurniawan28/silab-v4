@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("analisa ARI") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa ARI") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("analisa_ari.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
            <div class="table-responsive"><br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>{{ strtoupper("spta") }}</td>
                            <th>{{ ucfirst("antrian") }}</td>
                            <th>{{ ucfirst("register") }}</td>
                            <th>{{ ucfirst("brix") }}</td>
                            <th>{{ ucfirst("pol") }}</td>
                            <th>{{ ucfirst("rendemen") }}</td>
                            <th>{{ ucfirst("analis") }}</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analisa_ari as $analisa_ari)
                        <tr>
                            <td>{{ $analisa_ari->id }}</td>
                            <td>{{ $analisa_ari->created_at }}</td>
                            <td>{{ $analisa_ari->analisa_posbrix->spta }}</td>
                            <td>{{ $analisa_ari->analisa_posbrix->barcode_antrian }}</td>
                            <td>{{ $analisa_ari->analisa_posbrix->register }}</td>
                            <td>{{ $analisa_ari->pbrix }}</td>
                            <td>{{ $analisa_ari->ppol }}</td>
                            <td>{{ $analisa_ari->rendemen }}</td>
                            <td>{{ $analisa_ari->user->name }}</td>
                            <td>
                                <form action="{{ route("analisa_ari.destroy", $analisa_ari->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("analisa_ari.edit", $analisa_ari->id) }}">
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

