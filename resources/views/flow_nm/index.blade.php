@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("flow NM") }}</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('flow NM') }}</h5>
            <br>
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("flow_nm.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Tebu</td>
                            <th>Totalizer NM</td>
                            <th>Flow NM</td>
                            <th>NM%Tebu</td>
                            <th>SFC</td>
                            <th>Totalizer Imb</td>
                            <th>Imbibisi</td>
                            <th>Imb%Tebu</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flow_nm as $flow_nm)
                        <tr>
                            <td>{{ $flow_nm->id }}</td>
                            <td>{{ $flow_nm->created_at }}</td>
                            <td>{{ $flow_nm->tebu }}</td>
                            <td>{{ $flow_nm->totalizer_nm }}</td>
                            <td>{{ $flow_nm->flow_nm }}</td>
                            <td>{{ $flow_nm->nm_persen_tebu }}</td>
                            <td>{{ $flow_nm->sfc }}</td>
                            <td>{{ $flow_nm->totalizer_imb }}</td>
                            <td>{{ $flow_nm->flow_imb }}</td>
                            <td>{{ $flow_nm->imb_persen_tebu }}</td>
                            <td>
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("flow_nm.edit", $flow_nm->id) }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </a>
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

