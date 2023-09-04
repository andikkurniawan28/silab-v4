@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("analisa_posbrix.index") }}">{{ ucfirst("analisa Posbrix") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("analisa Posbrix") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("analisa Posbrix") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("analisa_posbrix.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <p>
                    <label>{{ strtoupper("spta") }}</label>
                    <input type="text" step="any" class="form-control" name="spta" maxlength="8" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("brix") }}</label>
                    <input type="number" step="any" class="form-control" name="brix" min="5" max="23" required>
                </p>
                <p>
                    <label>{{ ucfirst("lokasi") }}</label>
                    <select name="posbrix_id" class="form-control">
                        @foreach ($posbrix as $posbrix)
                            <option value="{{ $posbrix->id }}">{{ $posbrix->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("kawalan") }}</label>
                    <select name="kawalan_id" class="form-control">
                        @foreach ($kawalan as $kawalan)
                            <option value="{{ $kawalan->id }}">{{ $kawalan->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("varietas") }}</label>
                    <select name="variety_id" class="form-control">
                        @foreach ($variety as $variety)
                            <option value="{{ $variety->id }}">{{ $variety->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("status") }}</label>
                    <select name="status_id" class="form-control">
                        @foreach ($status as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
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

