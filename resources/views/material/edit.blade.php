@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("material.index") }}">{{ ucfirst("material") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("material") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('material') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("material.update", $material->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $material->name }}" required autofocus>
                </p>
                <p>
                    <label>Stasiun</label>
                    <select class="form-control" name="station_id">
                        @foreach($config["station"] as $station)
                            <option value="{{ $station->id }}"
                            @if($station->id == $material->station_id)
                                {{ "selected" }}
                            @endif
                            >{{ $station->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>Metode</label>
                    <select class="form-control" name="method_id">
                        @foreach($config["method"] as $method)
                            <option value="{{ $method->id }}"
                                @if($method->id == $material->method_id)
                                    {{ "selected" }}
                                @endif
                                >{{ $method->name }}</option>
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

