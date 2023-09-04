@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("analisa_sulphur.index") }}">{{ ucfirst("analisa SO2/BJB") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("analisa SO2/BJB") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("analisa SO2/BJB") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_sulphur.update", $analisa_sulphur->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("barcode") }}</label>
                    <input type="number" step="any" class="form-control" name="sample_id" value="{{ $analisa_sulphur->sample_id }}" autofocus required>
                </p>
                <p>
                    <label>{{ strtoupper("so2") }}</label>
                    <input type="number" step="any" class="form-control" name="so2" value="{{ $analisa_sulphur->so2 }}">
                </p>
                <p>
                    <label>{{ strtoupper("bjb") }}</label>
                    <input type="number" step="any" class="form-control" name="bjb" value="{{ $analisa_sulphur->bjb }}">
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

