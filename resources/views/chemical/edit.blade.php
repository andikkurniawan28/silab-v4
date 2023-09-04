@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("chemical.index") }}">{{ ucfirst("penggunaan bahan kimia") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("penggunaan bahan kimia") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('penggunaan bahan kimia') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("chemical.update", $chemical->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <div class="row">
                        <div class="col-md-2">
                            <label>{{ ucfirst("kapur") }}</label>
                            <input type="text" name="kapur" class="form-control" id="kapur" value="{{ $chemical->kapur }}" autofocus>
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("belerang") }}</label>
                            <input type="text" name="belerang" class="form-control" id="belerang" value="{{ $chemical->belerang }}">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("floculant") }}</label>
                            <input type="text" name="floculant" class="form-control" id="floculant" value="{{ $chemical->floculant }}">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("naOH") }}</label>
                            <input type="text" name="naoh" class="form-control" id="naoh" value="{{ $chemical->naoh }}">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("b894") }}</label>
                            <input type="text" name="b894" class="form-control" id="b894" value="{{ $chemical->b894 }}">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("b895") }}</label>
                            <input type="text" name="b895" class="form-control" id="b895" value="{{ $chemical->b895 }}">
                        </div>
                    </div>
                </p>
                <p>
                    <div class="row">
                        <div class="col-md-2">
                            <label>{{ ucfirst("b210") }}</label>
                            <input type="text" name="b210" class="form-control" id="b210" value="{{ $chemical->b210 }}">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("blotong") }}</label>
                            <input type="text" name="blotong" class="form-control" id="blotong" value="{{ $chemical->blotong }}">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("phospat") }}</label>
                            <input type="text" name="phospat" class="form-control" id="phospat" value="{{ $chemical->phospat }}">
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

