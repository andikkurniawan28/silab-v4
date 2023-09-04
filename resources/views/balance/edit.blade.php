@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("balance.index") }}">{{ ucfirst("neraca NM") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("neraca NM") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("neraca NM") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("balance.update", $balance->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("tebu") }}</label>
                    <input type="number" step="any" class="form-control" name="tebu" value="{{ $balance->tebu }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("totalizer") }}</label>
                    <input type="number" step="any" class="form-control" name="totalizer_nm" value="{{ $balance->totalizer_nm }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("flow") }}</label>
                    <input type="number" step="any" class="form-control" name="flow_nm" value="{{ $balance->flow_nm }}" required>
                </p>
                <p>
                    <label>{{ strtoupper("sfc") }}</label>
                    <input type="number" step="any" class="form-control" name="sfc" value="{{ $balance->sfc }}" required>
                </p>
                <p>
                    <label>{{ strtoupper("nm%tebu") }}</label>
                    <input type="number" step="any" class="form-control" name="nm_persen_tebu" value="{{ $balance->nm_persen_tebu }}">
                </p>
                <p>
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </p>
            </form>
        </div>
    </div>

</div>
@endsection

