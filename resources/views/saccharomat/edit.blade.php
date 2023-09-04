@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("saccharomat.index") }}">{{ ucfirst("saccharomat") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("saccharomat") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('saccharomat') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("saccharomat.update", $saccharomat->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("barcode") }}</label>
                    <input type="number" step="any" class="form-control" name="sample_id"  value="{{ $saccharomat->sample_id }}" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("brix") }}</label>
                    <input type="number" step="any" class="form-control" name="pbrix" value="{{ $saccharomat->pbrix }}">
                </p>
                <p>
                    <label>{{ ucfirst("pol") }}</label>
                    <input type="number" step="any" class="form-control" name="ppol" value="{{ $saccharomat->ppol }}">
                </p>
                <p>
                    <label>{{ ucfirst("pol baca") }}</label>
                    <input type="number" step="any" class="form-control" name="pol" value="{{ $saccharomat->pol }}">
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

