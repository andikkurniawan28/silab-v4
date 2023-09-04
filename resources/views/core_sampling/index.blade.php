@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("core Sampling") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("core Sampling") }}</h5>
        </div>
        <div class="card-body">
            @foreach ($core as $core)
                <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("on_farm.core_sampling", $core->id) }}">
                    @include('components.icon', ['icon' => 'plus '])
                    {{ $core->name }}
                </a>
            @endforeach
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ strtoupper("id") }}</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>{{ strtoupper("spta") }}</td>
                            <th>{{ ucfirst("antrian") }}</td>
                            <th>{{ ucfirst("lokasi") }}</td>
                            <th>{{ strtoupper("rfid") }}</td>
                            <th>{{ ucfirst("petugas") }}</td>
                            <th>{{ ucfirst("action") }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($core_sampling as $core_sampling)
                        <tr>
                            <td>{{ $core_sampling->id }}</td>
                            <td>{{ $core_sampling->created_at }}</td>
                            <td>{{ $core_sampling->analisa_posbrix->spta ?? "" }}</td>
                            <td>{{ $core_sampling->analisa_posbrix->barcode_antrian ?? "" }}</td>
                            <td>{{ $core_sampling->core->name ?? "" }}</td>
                            <td>{{ $core_sampling->rfid }}</td>
                            <td>{{ $core_sampling->user->name ?? "" }}</td>
                            <td>
                                <form action="{{ route("core_sampling.destroy", $core_sampling->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("core_sampling.edit", $core_sampling->id) }}">
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

