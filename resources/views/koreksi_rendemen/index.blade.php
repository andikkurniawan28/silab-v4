@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("koreksi Rendemen") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("koreksi Rendemen") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("koreksi_rendemen.process") }}" method="post">
                @csrf
                <p>
                    <label>{{ ucfirst("tanngal") }}</label>
                    <input type="date" step="any" class="form-control" value="" name="date" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("koreksi") }}</label>
                    <input type="text" step="any" class="form-control" value="" name="data" required>
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
