@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">{{ 'Cetak Barcode' }}</h4>
    </div>

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <!-- Content Row -->
    <div class="row">

        @foreach ($materials as $material)
        <div class="col-lg-3 md-3 mb-4">
            <div class="card bg-dark text-white text-xs shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        {{ $material->name }}
                    </div>

                    <form action="{{ route('cetak_barcode_store') }}" method="POST" class="form-prevent">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="material_id" value="{{ $material->id }}">
                        <button type="submit" class="btn btn-warning btn-sm text-dark" onclick="this.form.submit(); this.disabled=true;">
                            Cetak
                            @include('components.icon', ['icon' => 'print'])
                        </button>
                    </form>

                    <br>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>
@endsection

