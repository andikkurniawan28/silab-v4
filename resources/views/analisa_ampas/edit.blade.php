@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("analisa_ampas.index") }}">{{ ucfirst("analisa ampas") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("analisa ampas") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("analisa ampas") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_ampas.update", $analisa_ampas->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("barcode") }}</label>
                    <input type="number" step="any" class="form-control" name="sample_id" value="{{ $analisa_ampas->sample_id }}" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("zat kering") }}</label>
                    <input type="number" step="any" class="form-control" name="zat_kering" value="{{ $analisa_ampas->zat_kering }}" required>
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

