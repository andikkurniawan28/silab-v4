@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("analisa_ari.index") }}">{{ ucfirst("analisa ARI") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("analisa ARI") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("analisa ARI") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_ari.update", $analisa_ari->id) }}" method="post">
                @csrf
                @method("PUT")
                <input type="hidden" name="pbrix" value="{{ $analisa_ari->pbrix }}" readonly>
                <p>
                    <label>{{ ucfirst("rendemen") }}</label>
                    <input type="number" step="any" class="form-control" name="rendemen" value="{{ $analisa_ari->rendemen }}" min="4" max="23" required>
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

