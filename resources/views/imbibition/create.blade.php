@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("imbibition.index") }}">{{ ucfirst("imbibisi") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("imbibisi") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst("imbibisi") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("imbibition.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <p>
                    <label>{{ ucfirst("waktu") }}</label>
                    <select name="created_at" class="form-control">
                        @for($i=0; $i<24; $i++)
                            @php $timestamp = date("Y-m-d H:i:s", strtotime(session("time_start") . "+{$i} hours")); @endphp
                            <option value="{{ $timestamp }}">{{ $timestamp }}</option>
                        @endfor
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("totalizer") }}</label>
                    <input type="number" step="any" class="form-control" name="totalizer_imb" autofocus required>
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

