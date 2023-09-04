@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("imbibition.index") }}">{{ ucfirst("imbibisi") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("imbibisi") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("imbibisi") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("imbibition.update", $imbibition->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("totalizer") }}</label>
                    <input type="number" step="any" class="form-control" name="totalizer_imb" value="{{ $imbibition->totalizer_imb }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("flow") }}</label>
                    <input type="number" step="any" class="form-control" name="flow_imb" value="{{ $imbibition->flow_imb }}" required>
                </p>
                <p>
                    <label>{{ strtoupper("imb%tebu") }}</label>
                    <input type="number" step="any" class="form-control" name="imb_persen_tebu" value="{{ $imbibition->imb_persen_tebu }}">
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

