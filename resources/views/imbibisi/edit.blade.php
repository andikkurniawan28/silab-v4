@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("imbibisi") }}">{{ ucfirst("imbibisi") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("imbibisi") }}</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('imbibisi') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("imbibisi.update", $imbibisi->id) }}" method="post">
                @csrf

                <p>
                    <label>{{ ucfirst("timestamp") }}</label>
                    <input type="text" step="any" name="{{ "created_at" }}" class="form-control" id="{{ "created_at" }}" value="{{ $imbibisi->created_at }}">
                </p>

                <p>
                    <label>{{ ucfirst("tebu") }}</label>
                    <input type="number" step="any"  name="{{ "tebu" }}" class="form-control" id="{{ "tebu" }}" value="{{ $imbibisi->tebu }}" readonly>
                </p>

                <p>
                    <label>{{ ucfirst("totalizer_imb") }}</label>
                    <input type="number" step="any"  name="{{ "totalizer_imb" }}" class="form-control" id="{{ "totalizer_imb" }}" value="{{ $imbibisi->totalizer_imb }}">
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

