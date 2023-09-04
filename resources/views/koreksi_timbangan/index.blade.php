@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("koreksi Timbangan") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("koreksi Timbangan") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("koreksi_timbangan.process") }}" method="post">
                @csrf
                <p>
                    <label>{{ ucfirst("tanngal") }}</label>
                    <input type="date" step="any" class="form-control" value="" name="date" autofocus required>
                </p>
                <p>
                    <label>Apa yang akan dikoreksi ?</label>
                    <select name="table" class="form-control">
                        <option value="rawsugarinputs">Raw Sugar Diolah</option>
                        <option value="rawsugaroutputs">Raw Sugar Output</option>
                        <option value="mollases">Tetes</option>
                    </select>
                </p>
                <p>
                    <label>{{ ucfirst("dikoreksi menjadi berapa ? (Ton)") }}</label>
                    <input type="text" step="any" class="form-control" value="" name="value" required>
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
