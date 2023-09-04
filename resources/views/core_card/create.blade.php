@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("core_card.index") }}">{{ ucfirst("kartu Core") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("kartu Core") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("kartu Core") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("core_card.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <p>
                    <label>{{ strtoupper("rfid") }}</label>
                    <input type="text" step="any" class="form-control" name="rfid" maxlength="10" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("lokasi") }}</label>
                    <select name="core_id" class="form-control">
                        @foreach ($core as $core)
                            <option value="{{ $core->id }}">{{ $core->name }}</option>
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

