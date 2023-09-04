@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("analisa_ari.index") }}">{{ ucfirst("analisa ARI") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("analisa ARI") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("analisa ARI") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_ari.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                {{-- <p>
                    <label>{{ strtoupper("id") }}</label>
                    <input type="number" step="any" class="form-control" name="analisa_posbrix_id" autofocus required>
                </p> --}}
                <p>
                    <label>{{ strtoupper("rfid") }}</label>
                    <input type="text" step="any" class="form-control" name="rfid" maxlength="10" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("brix") }}</label>
                    <input type="number" step="any" class="form-control" name="brix" min="5" max="23" required>
                </p>
                <p>
                    <label>{{ ucfirst("pol") }}</label>
                    <input type="number" step="any" class="form-control" name="pol" min="5" max="23" required>
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

