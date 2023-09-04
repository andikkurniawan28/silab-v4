@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("cari Data") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("cari Data") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("cari_data.process") }}" method="post">
                @csrf
                <p>
                    <label>{{ ucfirst("identitas") }}</label>
                    <select class="form-control" name="identity">
                        <option>SPTA</option>
                        <option>Antrian</option>
                        <option>Register</option>
                        <option>Nopol</option>
                        <option>Petani</option>
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("data") }}</label>
                    <input type="text" step="any" class="form-control" value="" name="data" autofocus required>
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
