@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("ari_sampling.index") }}">{{ ucfirst("ARI Sampling") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("ARI Sampling") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("ARI Sampling") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("ari_sampling.update", $ari_sampling->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ strtoupper("rfid") }}</label>
                    <input type="text" step="any" class="form-control" name="rfid" maxlength="10" value="{{ $ari_sampling->rfid }}" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("lokasi") }}</label>
                    <select name="timbang_id" class="form-control">
                        @foreach ($timbang as $timbang)
                            <option value="{{ $timbang->id }}"
                            @if($ari_sampling->timbang_id == $timbang->id)
                                {{ "selected" }}
                            @endif
                            >{{ $timbang->name }}</option>
                        @endforeach
                    </select>
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

