@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Monitoring {{ $title }}</h4>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          @foreach ($config["station"] as $station)
            <li class="breadcrumb-item"><a href="{{ route("monitoring.perStation", $station->id) }}">{{ $station->name }}</a></li>
          @endforeach
          @php $on_farm_station = ["Posbrix", "Core", "ARI", "Scoring"]; @endphp
          @for($i=0; $i<count($on_farm_station); $i++)
            <li class="breadcrumb-item"><a href="{{ route("monitoring.onfarm", $i) }}">{{ $on_farm_station[$i] }}</a></li>
          @endfor
        </ol>
    </nav>

    @include("layouts.alert")

    <!-- Content Row -->
    <div class="row">
        @for($i=0; $i<count($data); $i++)
        <div class="col-lg-6 mb-4">
            <a href="{{ route("monitoring.perMaterial", $data[$i]["id"]) }}">
            <div class="card bg-gradient-dark text-white text-sm shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        <h5 class="m-0 font-weight-bold text-white">{{ $data[$i]["name"] }}</h5>
                    </div>
                    <div class="table-responsive">
                        <br>
                        <table width="100%" class="table table-sm table-hover text-white text-left table-dark">
                            <thead>
                                <tr>
                                    <th>Jam</th>
                                    @include("monitoring.th.".$data[$i]["method_id"])
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data[$i]["analysis"] as $analysis)
                                <tr>
                                    <td>{{ date("H:i", strtotime($analysis->created_at)) }}</td>
                                    @include("monitoring.td.".$data[$i]["method_id"])
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </a>
        </div>
        @endfor
    </div>

</div>
@endsection

