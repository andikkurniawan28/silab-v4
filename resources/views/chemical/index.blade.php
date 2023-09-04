@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("penggunaan bahan kimia") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('penggunaan bahan kimia') }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("chemical.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
            <div class="table-responsive"><br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ strtoupper("id") }}</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>{{ ucfirst("kapur") }}</td>
                            <th>{{ ucfirst("belerang") }}</td>
                            <th>{{ ucfirst("floculant") }}</td>
                            <th>{{ ucfirst("naOH") }}</td>
                            <th>{{ ucfirst("b894") }}</td>
                            <th>{{ ucfirst("b895") }}</td>
                            <th>{{ ucfirst("b210") }}</td>
                            <th>{{ ucfirst("blotong") }}</td>
                            <th>{{ ucfirst("phospat") }}</td>
                            <th>{{ ucfirst("petugas") }}</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chemical as $chemical)
                        <tr>
                            <td>{{ $chemical->id }}</td>
                            <td>{{ $chemical->created_at }}</td>
                            <td>{{ $chemical->kapur }}</td>
                            <td>{{ $chemical->belerang }}</td>
                            <td>{{ $chemical->floculant }}</td>
                            <td>{{ $chemical->naoh }}</td>
                            <td>{{ $chemical->b894 }}</td>
                            <td>{{ $chemical->b895 }}</td>
                            <td>{{ $chemical->b210 }}</td>
                            <td>{{ $chemical->blotong }}</td>
                            <td>{{ $chemical->phospat }}</td>
                            <td>{{ $chemical->user->name ?? "" }}</td>
                            <td>
                                <form action="{{ route("chemical.destroy", $chemical->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("chemical.edit", $chemical->id) }}">
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

