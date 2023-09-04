@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("chemical.index") }}">{{ ucfirst("penggunaan bahan kimia") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("penggunaan bahan kimia") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst('penggunaan bahan kimia') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("chemical.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <p>
                    <div class="row">
                        <div class="col-md-2">
                            <label>{{ ucfirst("kapur") }}</label>
                            <input type="text" name="kapur" class="form-control" id="kapur" autofocus>
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("belerang") }}</label>
                            <input type="text" name="belerang" class="form-control" id="belerang">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("floculant") }}</label>
                            <input type="text" name="floculant" class="form-control" id="floculant">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("naOH") }}</label>
                            <input type="text" name="naoh" class="form-control" id="naoh">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("b894") }}</label>
                            <input type="text" name="b894" class="form-control" id="b894">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("b895") }}</label>
                            <input type="text" name="b895" class="form-control" id="b895">
                        </div>
                    </div>
                </p>
                <p>
                    <div class="row">
                        <div class="col-md-2">
                            <label>{{ ucfirst("b210") }}</label>
                            <input type="text" name="b210" class="form-control" id="b210">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("blotong") }}</label>
                            <input type="text" name="blotong" class="form-control" id="blotong">
                        </div>
                        <div class="col-md-2">
                            <label>{{ ucfirst("phospat") }}</label>
                            <input type="text" name="phospat" class="form-control" id="phospat">
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

