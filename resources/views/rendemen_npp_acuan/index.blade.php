@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("rendemen NPP Acuan") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("rendemen NPP Acuan") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("rendemen_npp_acuan.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <input type="hidden" name="id" value="{{ $rendemen_npp_acuan->id }}">
                <p>
                    <label>{{ ucfirst("nilai terakhir") }}</label>
                    <input type="number" step="any" class="form-control" name="value" value="{{ $rendemen_npp_acuan->value }}" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("diperbarui oleh") }}</label>
                    <input type="text" step="any" class="form-control" value="{{ $rendemen_npp_acuan->user->name }}" readonly>
                </p>
                <p>
                    <label>{{ ucfirst("diperbarui pada") }}</label>
                    <input type="text" step="any" class="form-control" value="{{ $rendemen_npp_acuan->updated_at }}" readonly>
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

