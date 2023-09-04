@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Monitoring {{ ucfirst($name) }}</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst($name) }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-white table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ strtoupper("id") }}</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            @if($station_id == 0)
                                <th>{{ strtoupper("spta") }}</th>
                                <th>{{ ucfirst("brix") }}</th>
                                <th>{{ ucfirst("varietas") }}</th>
                                <th>{{ ucfirst("kawalan") }}</th>
                                <th>{{ ucfirst("status") }}</th>
                            @elseif($station_id == 1 or $station_id == 2)
                                <th>{{ strtoupper("spta") }}</th>
                                <th>{{ ucfirst("antrian") }}</th>
                                <th>{{ ucfirst("register") }}</th>
                                <th>{{ ucfirst("petani") }}</th>
                                <th>{{ strtoupper("kud") }}</th>
                                <th>{{ ucfirst("pos") }}</th>
                                <th>{{ ucfirst("wilayah") }}</th>
                                <th>{{ ucfirst("brix") }}</th>
                                <th>{{ ucfirst("pol") }}</th>
                                <th>{{ ucfirst("rendemen") }}</th>
                            @elseif($station_id == 3)
                                <th>{{ strtoupper("spta") }}</th>
                                <th>{{ ucfirst("antrian") }}</th>
                                <th>{{ ucfirst("prosentase") }}</th>
                                <th>{{ ucfirst("rendemen") }}</th>
                                <th>{{ ucfirst("rafaksi") }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->created_at }}</td>
                            @if($station_id == 0)
                                <td>{{ $data->spta ?? "" }}</td>
                                <td>{{ $data->brix ?? "" }}</td>
                                <td>{{ $data->variety->name ?? "" }}</td>
                                <td>{{ $data->kawalan->name ?? "" }}</td>
                                <td>{{ $data->status->name ?? "" }}</td>
                            @elseif($station_id == 1 || $station_id == 2)
                                <td>{{ $data->analisa_posbrix->spta ?? "" }}</td>
                                <td>{{ $data->analisa_posbrix->barcode_antrian ?? "" }}</td>
                                <td>{{ $data->analisa_posbrix->register ?? "" }}</td>
                                <td>{{ $data->analisa_posbrix->petani ?? "" }}</td>
                                <td>{{ $data->analisa_posbrix->kud->name ?? "" }}</td>
                                <td>{{ $data->analisa_posbrix->pospantau->name ?? "" }}</td>
                                <td>{{ $data->analisa_posbrix->wilayah->name ?? "" }}</td>
                                <td>{{ $data->pbrix ?? "" }}</td>
                                <td>{{ $data->ppol ?? "" }}</td>
                                <td>{{ $data->rendemen ?? "" }}</td>
                            @elseif($station_id == 3)
                                <td>{{ $data->analisa_posbrix->spta ?? "" }}</td>
                                <td>{{ $data->analisa_posbrix->barcode_antrian ?? "" }}</td>
                                <td>
                                    <li>{{ ucfirst("daduk") }} : {{ $data->daduk ?? 0 }}%</li>
                                    <li>{{ ucfirst("akar") }} : {{ $data->akar ?? 0 }}%</li>
                                    <li>{{ ucfirst("tali_pucuk") }} : {{ $data->tali_pucuk ?? 0 }}%</li>
                                    <li>{{ ucfirst("sogolan") }} : {{ $data->sogolan ?? 0 }}%</li>
                                    <li>{{ ucfirst("pucuk") }} : {{ $data->pucuk ?? 0 }}%</li>
                                    <li>{{ ucfirst("tebu_muda") }} : {{ $data->tebu_muda ?? 0 }}%</li>
                                    <li>{{ ucfirst("lelesan") }} : {{ $data->lelesan ?? 0 }}%</li>
                                    <li>{{ ucfirst("terbakar") }} : {{ $data->terbakar ?? 0 }}%</li>
                                </td>
                                <td>
                                    <li>Rendemen Core : {{ $data->analisa_posbrix->analisa_core->rendemen ?? "Not Found" }}</li>
                                    <li>Rendemen Gilingan Mini : {{ $data->analisa_posbrix->analisa_ari->rendemen ?? "Not Found" }}</li>
                                    <li>Rendemen ARI : {{ $data->rendemen_ari }}</li>
                                    <li>&Delta; thd NPP : {{ $data->delta_thd_npp }}</li>
                                </td>
                                <td>
                                    <li>Rafaksi MBS : {{ $data->rafaksi_mbs }}%</li>
                                    <li>Rafaksi ARI : {{ $data->rafaksi_ari }}%</li>
                                    <li>Score : {{ $data->score }}%</li>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>



@endsection

