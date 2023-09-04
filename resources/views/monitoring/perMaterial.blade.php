@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("monitoring.perStation", $station_id) }}">Monitoring {{ $station_name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($title) }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst($title) }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-white table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ strtoupper("id") }}</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            @include("monitoring.th.".$method_id)
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $analysis)
                        <tr>
                            <td>{{ $analysis->id }}</td>
                            <td>{{ $analysis->created_at }}</td>
                            @include("monitoring.td.".$method_id)
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{--  --}}
        </div>
    </div>
</div>



@endsection
