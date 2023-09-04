@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("core_sampling.index") }}">{{ ucfirst("core Sampling") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("core Sampling") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("core Sampling") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("core_sampling.update", $core_sampling->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ strtoupper("rfid") }}</label>
                    <input type="text" step="any" class="form-control" name="rfid" maxlength="10" value="{{ $core_sampling->rfid }}" autofocus required>
                </p>
                <p>
                    <label>{{ ucfirst("lokasi") }}</label>
                    <select name="core_id" class="form-control">
                        @foreach ($core as $core)
                            <option value="{{ $core->id }}"
                            @if($core_sampling->core_id == $core->id)
                                {{ "selected" }}
                            @endif
                            >{{ $core->name }}</option>
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

