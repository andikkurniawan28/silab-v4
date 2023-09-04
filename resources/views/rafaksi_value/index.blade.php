@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("nilai Rafaksi") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("nilai Rafaksi") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("rafaksi_value.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <input type="hidden" name="id" value="{{ $rafaksi_value->id }}">
                <p>
                    <label>{{ ucfirst("daduk") }}</label>
                    <input type="number" step="any" class="form-control" name="daduk" value="{{ $rafaksi_value->daduk }}" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("akar") }}</label>
                    <input type="number" step="any" class="form-control" name="akar" value="{{ $rafaksi_value->akar }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("tali_pucuk") }}</label>
                    <input type="number" step="any" class="form-control" name="tali_pucuk" value="{{ $rafaksi_value->tali_pucuk }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("sogolan") }}</label>
                    <input type="number" step="any" class="form-control" name="sogolan" value="{{ $rafaksi_value->sogolan }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("pucuk") }}</label>
                    <input type="number" step="any" class="form-control" name="pucuk" value="{{ $rafaksi_value->pucuk }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("tebu_muda") }}</label>
                    <input type="number" step="any" class="form-control" name="tebu_muda" value="{{ $rafaksi_value->tebu_muda }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("lelesan") }}</label>
                    <input type="number" step="any" class="form-control" name="lelesan" value="{{ $rafaksi_value->lelesan }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("terbakar") }}</label>
                    <input type="number" step="any" class="form-control" name="terbakar" value="{{ $rafaksi_value->terbakar }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("diperbarui oleh") }}</label>
                    <input type="text" step="any" class="form-control" value="{{ $rafaksi_value->user->name }}" readonly>
                </p>
                <p>
                    <label>{{ ucfirst("diperbarui pada") }}</label>
                    <input type="text" step="any" class="form-control" value="{{ $rafaksi_value->updated_at }}" readonly>
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

