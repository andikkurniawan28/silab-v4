@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("flow_nm") }}">{{ ucfirst("flow NM") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("flow NM") }}</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst('flow NM') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("flow_nm.store") }}" method="post">
                @csrf

                <p>
                    <label>{{ ucfirst("timestamp") }}</label>
                    <select name="created_at" class="form-control">
                        @for($i=0; $i<24; $i++)
                            @php $timestamp = date("Y-m-d H:i:s", strtotime(session("time_start") . "+{$i} hours")); @endphp
                            <option value="{{ $timestamp }}">{{ $timestamp }}</option>
                        @endfor
                    </select>
                </p>

                <p>
                    <label>{{ ucfirst("tebu") }}</label>
                    <input type="number" step="any"  name="{{ "tebu" }}" class="form-control" id="{{ "tebu" }}">
                </p>

                <p>
                    <label>{{ ucfirst("totalizer_nm") }}</label>
                    <input type="number" step="any"  name="{{ "totalizer_nm" }}" class="form-control" id="{{ "totalizer_nm" }}">
                </p>

                <p>
                    <label>{{ ucfirst("setting flow control") }}</label>
                    <input type="number" step="any"  name="{{ "sfc" }}" class="form-control" id="{{ "sfc" }}">
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

