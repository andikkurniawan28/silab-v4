@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("faktor") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("faktor") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("faktor.store") }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <input type="hidden" name="id" value="{{ $faktor->id }}">
                <p>
                    <label>{{ strtoupper("faktor_rendemen_npp") }}</label>
                    <input type="number" step="any" class="form-control" name="faktor_rendemen_npp" value="{{ $faktor->faktor_rendemen_npp }}" autofocus required>
                </p>
                <p>
                    <label>{{ strtoupper("faktor_mellase_npp") }}</label>
                    <input type="number" step="any" class="form-control" name="faktor_mellase_npp" value="{{ $faktor->faktor_mellase_npp }}" required>
                </p>
                <p>
                    <label>{{ strtoupper("faktor_analisa_ampas") }}</label>
                    <input type="number" step="any" class="form-control" name="faktor_analisa_ampas" value="{{ $faktor->faktor_analisa_ampas }}" required>
                </p>
                <p>
                    <label>{{ strtoupper("faktor_pol_saccharomat") }}</label>
                    <input type="number" step="any" class="form-control" name="faktor_pol_saccharomat" value="{{ $faktor->faktor_pol_saccharomat }}" required>
                </p>
                <p>
                    <label>{{ ucfirst("diperbarui oleh") }}</label>
                    <input type="text" step="any" class="form-control" value="{{ $faktor->user->name }}" readonly>
                </p>
                <p>
                    <label>{{ ucfirst("diperbarui pada") }}</label>
                    <input type="text" step="any" class="form-control" value="{{ $faktor->updated_at }}" readonly>
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

