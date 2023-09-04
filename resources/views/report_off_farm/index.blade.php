@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">Laporan Harian {{ "Off-Farm" }}</h4>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="row">
                    <div class="col-12 table-responsive">
                            <table width="30%" class="table table-striped table-sm table-bordered table-hover text-xs table-dark">
                                <tr>
                                    <th>Material</th>
                                    <th>Netto</th>
                                </tr>
                                <tr>
                                    <th>{{ ucfirst("tebu") }}</th>
                                    <th>{{ $timbangan["balance"]["tebu"] }}</th>
                                </tr>
                                <tr>
                                    <th>{{ ucfirst("flow_nm") }}</th>
                                    <th>{{ $timbangan["balance"]["flow_nm"] }}</th>
                                </tr>
                                <tr>
                                    <th>{{ ucfirst("flow_imb") }}</th>
                                    <th>{{ $timbangan["balance"]["flow_imb"] }}</th>
                                </tr>
                                <tr>
                                    <th>{{ ucfirst("tetes") }}</th>
                                    <th>{{ $timbangan["tetes"] }}</th>
                                </tr>
                                <tr>
                                    <th>{{ ucfirst("rs_in") }}</th>
                                    <th>{{ $timbangan["rs_in"] }}</th>
                                </tr>
                                <tr>
                                    <th>{{ ucfirst("rs_out") }}</th>
                                    <th>{{ $timbangan["rs_out"] }}</th>
                                </tr>
                            </table>

                            <table width="100%" class="table table-striped table-sm table-bordered table-hover text-xs table-dark">
                                <tr>
                                    <th>{{ ucfirst("no") }}</th>
                                    <th>{{ ucfirst("material") }}</th>
                                    <th>{{ ucfirst("jumlah") }}</th>
                                    {{-- <th>{{ ucfirst("turun") }}</th> --}}
                                    <th>{{ strtoupper("hl") }}</th>
                                    <th>%{{ ucfirst("brix") }}</th>
                                    <th>%{{ ucfirst("pol") }}</th>
                                    <th>{{ ucfirst("pol") }}</th>
                                    <th>{{ strtoupper("hk") }}</th>
                                    <th>{{ ucfirst("r") }}</th>
                                    <th>{{ strtoupper("iu") }}</th>
                                    <th>{{ ucfirst("moist") }}</th>
                                    <th>{{ ucfirst("air") }}</th>
                                    <th>{{ strtoupper("zk") }}</th>
                                    <th>{{ ucfirst("ampas") }}</th>
                                    <th>{{ ucfirst("suhu") }}</th>
                                    <th>{{ "pH" }}</th>
                                    <th>{{ ucfirst("CaO") }}</th>
                                    <th>{{ ucfirst("turb") }}</th>
                                    <th>{{ strtoupper("tds") }}</th>
                                    <th>{{ ucfirst("sdh") }}</th>
                                    <th>{{ ucfirst("phosp") }}</th>
                                    <th>{{ ucfirst("SO2") }}</th>
                                    <th>{{ strtoupper("bjb") }}</th>
                                    <th>{{ strtoupper("tsai") }}</th>
                                    <th>{{ ucfirst("kapur") }}</th>
                                    {{-- <th>{{ ucfirst("sabut") }}</th>
                                    <th>{{ strtoupper("pi") }}</th>
                                    <th>{{ ucfirst("succr") }}</th>
                                    <th>{{ ucfirst("glucc") }}</th>
                                    <th>{{ ucfirst("frucc") }}</th>
                                    <th>{{ strtoupper("od") }}</th>
                                    <th>{{ ucfirst("gured") }}</th> --}}
                                </tr>
                                @for($i=0; $i<count($data); $i++)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $data[$i]["name"] }}</td>
                                    <td>{{ $data[$i]["data"]["jumlah"] }}</td>
                                    {{-- <td>{{ $data[$i]["pan"] }}</td> --}}
                                    <td>{{ $data[$i]["data"]["volume"] }}</td>
                                    <td>{{ $data[$i]["data"]["pbrix"] }}</td>
                                    <td>{{ $data[$i]["data"]["ppol"] }}</td>
                                    <td>{{ $data[$i]["data"]["pol"] }}</td>
                                    <td>{{ $data[$i]["data"]["hk"] }}</td>
                                    <td>{{ $data[$i]["data"]["rendemen"] }}</td>
                                    <td>{{ $data[$i]["data"]["icumsa"] }}</td>
                                    <td>{{ $data[$i]["data"]["moisture"] }}</td>
                                    <td>{{ $data[$i]["data"]["kadar_air"] }}</td>
                                    <td>{{ $data[$i]["data"]["zat_kering"] }}</td>
                                    <td>{{ $data[$i]["data"]["pol_ampas"] }}</td>
                                    <td>{{ $data[$i]["data"]["suhu"] }}</td>
                                    <td>{{ $data[$i]["data"]["ph"] }}</td>
                                    <td>{{ $data[$i]["data"]["cao"] }}</td>
                                    <td>{{ $data[$i]["data"]["turbidity"] }}</td>
                                    <td>{{ $data[$i]["data"]["tds"] }}</td>
                                    <td>{{ $data[$i]["data"]["kesadahan"] }}</td>
                                    <td>{{ $data[$i]["data"]["phospat"] }}</td>
                                    <td>{{ $data[$i]["data"]["so2"] }}</td>
                                    <td>{{ $data[$i]["data"]["bjb"] }}</td>
                                    <td>{{ $data[$i]["data"]["tsai"] }}</td>
                                    <td>{{ $data[$i]["data"]["kapur"] }}</td>
                                    {{-- <td>{{ $data[$i]["sabut"] }}</td>
                                    <td>{{ $data[$i]["preparation_index"] }}</td>
                                    <td>{{ $data[$i]["succrose"] }}</td>
                                    <td>{{ $data[$i]["glucose"] }}</td>
                                    <td>{{ $data[$i]["fructose"] }}</td>
                                    <td>{{ $data[$i]["optical_density"] }}</td>
                                    <td>{{ $data[$i]["gula_reduksi"] }}</td> --}}
                                </tr>
                                @endfor
                            </table>
                    </div>
                </div>

    @endsection
