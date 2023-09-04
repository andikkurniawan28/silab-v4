@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("scoring.index") }}">{{ ucfirst("scoring") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("scoring") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("scoring") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("scoring.update", $scoring->id) }}" method="post">
                @csrf
                @method("PATCH")
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <p>
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <label>{{ strtoupper("analisa_posbrix_id") }}</label>
                            <input type="text" step="any" class="form-control" name="analisa_posbrix_id" maxlength="10" value="{{ $scoring->analisa_posbrix_id }}" readonly>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>{{ ucfirst("meja_tebu") }}</label>
                            <input type="number" step="any" class="form-control" name="meja_tebu" min="1" max="5" value="{{ $scoring->meja_tebu }}" required>
                        </div>
                    </div>
                </p>
                <p>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("daduk") }}</label>
                            <input type="number" step="any" class="form-control" name="daduk" min="0" max="50" value="{{ $scoring->daduk }}" >
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("akar") }}</label>
                            <input type="number" step="any" class="form-control" name="akar" min="0" max="50" value="{{ $scoring->akar }}" >
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("tali_pucuk") }}</label>
                            <input type="number" step="any" class="form-control" name="tali_pucuk" min="0" max="50" value="{{ $scoring->tali_pucuk }}" >
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("sogolan") }}</label>
                            <input type="number" step="any" class="form-control" name="sogolan" min="0" max="50" value="{{ $scoring->sogolan }}" >
                        </div>
                    </div>
                </p>
                <p>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("pucuk") }}</label>
                            <input type="number" step="any" class="form-control" name="pucuk" min="0" max="50" value="{{ $scoring->pucuk }}" >
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("tebu_muda") }}</label>
                            <input type="number" step="any" class="form-control" name="tebu_muda" min="0" max="50" value="{{ $scoring->tebu_muda }}" >
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("lelesan") }}</label>
                            <input type="number" step="any" class="form-control" name="lelesan" min="0" max="50" value="{{ $scoring->lelesan }}" >
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <label>{{ ucfirst("terbakar") }}</label>
                            <input type="number" step="any" class="form-control" name="terbakar" min="0" max="50" value="{{ $scoring->terbakar }}" >
                        </div>
                    </div>
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

