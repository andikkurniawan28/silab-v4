@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("ari_sampling.index") }}">{{ ucfirst("ARI Sampling") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("ARI Sampling") }} {{ $timbang->name }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("ARI Sampling") }} {{ $timbang->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("ari_sampling.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <input type="hidden" name="timbang_id" value="{{ $timbang->id }}">
                {{-- <p>
                    <label>{{ strtoupper("spta") }}</label>
                    <input type="text" step="any" class="form-control" name="data" maxlength="8" autofocus required>
                </p>
                <p>
                    <label>{{ strtoupper("rfid") }}</label>
                    <input type="text" step="any" class="form-control" name="data" maxlength="10" autofocus required>
                </p> --}}
                <p>
                    <label>{{ ucfirst("barcode antrian") }}</label>
                    <input type="text" step="any" class="form-control" name="data" maxlength="10" autofocus required>
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

