@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("kartu Core") }}</li>
        </ol>
    </nav>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('kartu Core') }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ strtoupper("#") }}</td>
                            <th>{{ ucfirst("timestamp") }}</td>
                            <th>{{ ucfirst("untuk") }}</td>
                            <th>{{ strtoupper("rfid") }}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kartu as $kartu)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kartu->created_at }}</td>
                            <td>{{ $kartu->core->name ?? "" }}</td>
                            <td>{{ $kartu->rfid }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @foreach($core as $core)
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("aplikasi_persiapan_core_sample", $core->id) }}" target="_blank">
                @include('components.icon', ['icon' => 'map '])
                Buat Kartu untuk Core {{ $core->name }}
            </a>
            @endforeach
        </div>
    </div>
</div>



@endsection

