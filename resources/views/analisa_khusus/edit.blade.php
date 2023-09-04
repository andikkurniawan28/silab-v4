@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("analisa_khusus.index") }}">{{ ucfirst("analisa khusus") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("analisa khusus") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("analisa khusus") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_khusus.update", $analisa_khusus->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("barcode") }}</label>
                    <input type="number" step="any" class="form-control" name="sample_id" value="{{ $analisa_khusus->sample_id }}" autofocus required>
                </p>
                <p>
                    <label>{{ strtoupper("tsai") }}</label>
                    <input type="number" step="any" class="form-control" name="tsai" value="{{ $analisa_khusus->tsai }}">
                </p>
                <p>
                    <label>{{ strtoupper("od") }}</label>
                    <input type="number" step="any" class="form-control" name="optical_density" value="{{ $analisa_khusus->optical_density }}">
                </p>
                <p>
                    <label>{{ ucfirst("succrose") }}</label>
                    <input type="number" step="any" class="form-control" name="succrose" value="{{ $analisa_khusus->succrose }}">
                </p>
                <p>
                    <label>{{ ucfirst("glucose") }}</label>
                    <input type="number" step="any" class="form-control" name="glucose" value="{{ $analisa_khusus->glucose }}">
                </p>
                <p>
                    <label>{{ ucfirst("fructose") }}</label>
                    <input type="number" step="any" class="form-control" name="fructose" value="{{ $analisa_khusus->fructose }}">
                </p>
                <p>
                    <label>{{ ucfirst("gured") }}</label>
                    <input type="number" step="any" class="form-control" name="gula_reduksi" value="{{ $analisa_khusus->gula_reduksi }}">
                </p>
                <p>
                    <label>{{ ucfirst("kapur") }}</label>
                    <input type="number" step="any" class="form-control" name="kadar_kapur" value="{{ $analisa_khusus->kadar_kapur }}">
                </p>
                <p>
                    <label>{{ ucfirst("phospat") }}</label>
                    <input type="number" step="any" class="form-control" name="kadar_phospat" value="{{ $analisa_khusus->kadar_phospat }}">
                </p>
                <p>
                    <label>{{ strtoupper("pi") }}</label>
                    <input type="number" step="any" class="form-control" name="preparation_index" value="{{ $analisa_khusus->preparation_index }}">
                </p>
                <p>
                    <label>{{ ucfirst("sabut") }}</label>
                    <input type="number" step="any" class="form-control" name="kadar_sabut" value="{{ $analisa_khusus->kadar_sabut }}">
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

