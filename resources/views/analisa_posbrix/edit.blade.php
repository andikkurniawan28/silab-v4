@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("analisa_posbrix.index") }}">{{ ucfirst("analisa Posbrix") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("analisa Posbrix") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("analisa Posbrix") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_posbrix.update", $analisa_posbrix->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ strtoupper("spta") }}</label>
                    <input type="text" step="any" class="form-control" name="spta" value="{{ $analisa_posbrix->spta }}" maxlength="8" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("brix") }}</label>
                    <input type="number" step="any" class="form-control" name="brix" value="{{ $analisa_posbrix->brix }}" min="5" max="23">
                </p>
                <p>
                    <label>{{ ucfirst("lokasi") }}</label>
                    <select name="posbrix_id" class="form-control">
                        @foreach ($posbrix as $posbrix)
                            <option value="{{ $posbrix->id }}"
                            @if($analisa_posbrix->posbrix_id == $posbrix->id)
                            {{ "selected" }}
                            @endif>
                            {{ $posbrix->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("kawalan") }}</label>
                    <select name="kawalan_id" class="form-control">
                        @foreach ($kawalan as $kawalan)
                            <option value="{{ $kawalan->id }}"
                            @if($analisa_posbrix->kawalan_id == $kawalan->id)
                            {{ "selected" }}
                            @endif>
                            {{ $kawalan->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("varietas") }}</label>
                    <select name="variety_id" class="form-control">
                        @foreach ($variety as $variety)
                            <option value="{{ $variety->id }}"
                            @if($analisa_posbrix->variety_id == $variety->id)
                            {{ "selected" }}
                            @endif>
                            {{ $variety->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("status") }}</label>
                    <select name="status_id" class="form-control">
                        @foreach ($status as $status)
                            <option value="{{ $status->id }}"
                            @if($analisa_posbrix->status_id == $status->id)
                            {{ "selected" }}
                            @endif>
                            {{ $status->name }}</option>
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

