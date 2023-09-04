@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("analisa_ketel.index") }}">{{ ucfirst("analisa ketel") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("analisa ketel") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("analisa ketel") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_ketel.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <p>
                    <label>{{ ucfirst("barcode") }}</label>
                    <input type="number" step="any" class="form-control" name="sample_id" autofocus required>
                </p>
                <p>
                    <label>{{ strtoupper("tds") }}</label>
                    <input type="number" step="any" class="form-control" name="tds">
                </p>
                <p>
                    <label>{{ strtolower("ph") }}</label>
                    <input type="number" step="any" class="form-control" name="ph">
                </p>
                <p>
                    <label>{{ ucfirst("kesadahan") }}</label>
                    <input type="number" step="any" class="form-control" name="kesadahan">
                </p>
                <p>
                    <label>{{ ucfirst("phospat") }}</label>
                    <input type="number" step="any" class="form-control" name="phospat">
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

