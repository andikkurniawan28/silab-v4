@extends("layouts.app")

@section("content")
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Hallo, selamat datang {{ Auth()->user()->name }} &#128521</h4>
        {{-- <a href="{{ route("report_off_farm") }}" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
            <i class="fas fa-print fa-sm text-white-50"></i> Laporan Harian</a> --}}
    </div>
    {{-- <p>Tetap semangat jangan sambat &#128521</p> --}}
    @include("layouts.alert")
    <div class="row">

        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-4">
            <a href="{{ route("dashboard") }}">
                <div class="card bg-gradient-dark text-white shadow">
                <div class="card-header bg-gradient-dark">
                    <div class="text-sm font-weight-bold text-white text-uppercase mb-1">
                        {{ ucfirst("dashboard") }}
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-3x fa-tachometer-alt"></i>
                </div>
            </div>
            </a>
        </div>

        @if(Auth()->user()->role_id <= 8 || Auth()->user()->role_id == 11)
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-4">
            <a href="{{ route("cetak_ronsel") }}">
                <div class="card bg-gradient-dark text-white shadow">
                <div class="card-header bg-gradient-dark">
                    <div class="text-sm font-weight-bold text-white text-uppercase mb-1">
                        {{ ucfirst("cetak Ronsel") }}
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-3x fa-barcode"></i>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-4">
            <a href="{{ route("imbibition.index") }}">
                <div class="card bg-gradient-dark text-white shadow">
                <div class="card-header bg-gradient-dark">
                    <div class="text-sm font-weight-bold text-white text-uppercase mb-1">
                        {{ ucfirst("imbibisi") }}
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-3x fa-tint"></i>
                </div>
            </div>
            </a>
        </div>
        @endif

        @if(Auth()->user()->role_id <= 8)
        @foreach($config["station"] as $station)
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-4">
            <a href="{{ route("cetak_barcode", $station->id) }}">
                <div class="card bg-gradient-dark text-white shadow">
                <div class="card-header bg-gradient-dark">
                    <div class="text-sm font-weight-bold text-white text-uppercase mb-1">
                        Barcode {{ $station->name }}
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-3x fa-barcode"></i>
                </div>
            </div>
            </a>
        </div>
        @endforeach
        @endif

        @foreach($config["station"] as $station)
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-4">
            <a href="{{ route("monitoring.perStation", $station->id) }}">
                <div class="card bg-gradient-dark text-white shadow">
                <div class="card-header bg-gradient-dark">
                    <div class="text-sm font-weight-bold text-white text-uppercase mb-1">
                        Monitoring {{ $station->name }}
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-3x fa-eye"></i>
                </div>
            </div>
            </a>
        </div>
        @endforeach

        @php $on_farm_station = ["Posbrix", "Core", "ARI", "Scoring"]; @endphp
        @for($i=0; $i<count($on_farm_station); $i++)
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-4">
            <a href="{{ route("monitoring.onfarm", $i) }}">
                <div class="card bg-gradient-dark text-white shadow">
                <div class="card-header bg-gradient-dark">
                    <div class="text-sm font-weight-bold text-white text-uppercase mb-1">
                        Monitoring {{ $on_farm_station[$i] }}
                    </div>
                </div>
                <div class="card-body text-center">
                    <i class="fa fa-3x fa-eye"></i>
                </div>
            </div>
            </a>
        </div>
        @endfor

    </div>
</div>
@endsection
