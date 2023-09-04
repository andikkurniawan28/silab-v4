@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("analisa_umum.index") }}">{{ ucfirst("analisa umum") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("analisa umum") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("analisa umum") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_umum.update", $analisa_umum->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("barcode") }}</label>
                    <input type="number" step="any" class="form-control" name="sample_id" value="{{ $analisa_umum->sample_id }}" autofocus required>
                </p>
                <p>
                    <label>{{ strtoupper("cao") }}</label>
                    <input type="number" step="any" class="form-control" name="cao" value="{{ $analisa_umum->cao }}">
                </p>
                <p>
                    <label>{{ strtolower("ph") }}</label>
                    <input type="number" step="any" class="form-control" name="ph" value="{{ $analisa_umum->ph }}">
                </p>
                <p>
                    <label>{{ ucfirst("turbidity") }}</label>
                    <input type="number" step="any" class="form-control" name="turbidity" value="{{ $analisa_umum->turbidity }}">
                </p>
                <p>
                    <label>{{ ucfirst("suhu") }}</label>
                    <input type="number" step="any" class="form-control" name="suhu" value="{{ $analisa_umum->suhu }}">
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

