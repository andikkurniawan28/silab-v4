@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">{{ 'Cetak Ronsel' }}</h4>
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

                    <button type="button" class="btn btn-warning text-dark btn-sm" data-toggle="modal" data-target="#create{{ $material->id }}">
                        @include('components.icon', ['icon' => 'print '])
                            Cetak
                    </button>

                    <br>
                </div>
            </div>
        </div>

        <div class="modal fade" id="create{{ $material->id }}" tabindex="-1" material="dialog" aria-labelledby="create{{ $material->id }}Label" aria-hidden="true">
            <div class="modal-dialog" material="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="create{{ $material->id }}Label">Cetak Ronsel {{ $material->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('cetak_ronsel.store') }}" class="text-dark">
                        @csrf
                        @method('POST')

                        <input type="hidden" name="material_id" value="{{ $material->id }}" readonly>
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

                        @include('components.input',[
                            'label' => 'Hl',
                            'name' => 'volume',
                            'type' => 'number',
                            'value' => '',
                            'modifier' => 'required',
                        ])

                        @include('components.input',[
                            'label' => 'Pan',
                            'name' => 'pan',
                            'type' => 'number',
                            'value' => '',
                            'modifier' => 'required',
                        ])

                        @include('components.input',[
                            'label' => 'Palung',
                            'name' => 'palung',
                            'type' => 'number',
                            'value' => '',
                            'modifier' => 'required',
                        ])

                        @include('components.input',[
                            'label' => 'Jam Masak',
                            'name' => 'start',
                            'type' => 'time',
                            'value' => '',
                            'modifier' => 'required',
                        ])

                        @include('components.input',[
                            'label' => 'Jam Turun',
                            'name' => 'finish',
                            'type' => 'time',
                            'value' => '',
                            'modifier' => 'required',
                        ])

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"  onclick="this.form.submit(); this.disabled=true;">Save
                            @include('components.icon', ['icon' => 'create'])
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @endforeach

    </div>

</div>
@endsection

