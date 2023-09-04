@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("sample.index") }}">{{ ucfirst("sampel") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("sampel") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('sampel') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("sample.update", $sample->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>{{ ucfirst("material") }}</label>
                    <select class="form-control" name="material_id">
                        @foreach($config["material"] as $material)
                            <option value="{{ $material->id }}"
                            @if($material->id == $sample->material_id)
                                {{ "selected" }}
                            @endif
                            >{{ $material->name }}</option>
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

