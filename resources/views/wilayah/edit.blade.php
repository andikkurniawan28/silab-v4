@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("wilayah.index") }}">{{ ucfirst("Wilayah") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("Wilayah") }}</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('Wilayah') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("wilayah.update", $wilayah->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $wilayah->name }}" required autofocus>
                </p>
                <p>
                    <label>Code</label>
                    <input type="text" name="code" class="form-control" id="code" value="{{ $wilayah->code }}" required>
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

