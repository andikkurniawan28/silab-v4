@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("core.index") }}">{{ ucfirst("Titik Core") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("Titik Core") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst('Titik Core') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("core.store") }}" method="post">
                @csrf
                <p>
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" id="name" required autofocus>
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

