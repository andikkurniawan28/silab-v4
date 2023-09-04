@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if($message = Session::get('error'))
        @include('components.alert', ['message'=>$message, 'color'=>'danger'])
    @elseif($message = Session::get('success'))
        @include('components.alert', ['message'=>$message, 'color'=>'success'])
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst('timbangan tetes') }}</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </button>
            <div class="table-responsive"><br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Bruto</td>
                            <th>Tarra</td>
                            <th>Netto</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mollases as $mollase)
                        <tr>
                            <td>{{ $mollase->id }}</td>
                            <td>{{ $mollase->created_at }}</td>
                            <td>{{ $mollase->bruto }}</td>
                            <td>{{ $mollase->tarra }}</td>
                            <td>{{ $mollase->netto }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit{{ $mollase->id }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{ $mollase->id }}">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
                                </button>
                            </td>
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

<div class="modal fade" id="create" tabindex="-1" mollase="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog" mollase="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLabel">Tambah {{ ucfirst('timbangan tetes') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('mollases.store') }}" class="text-dark">
                @csrf
                @method('POST')

                @include('components.input',[
                    'label' => 'Tanggal',
                    'name' => 'date',
                    'type' => 'date',
                    'value' => '',
                    'modifier' => 'required',
                ])

                <div class="form-group row">
                    <label for="{{ "jam" }}" class="col-sm-2 col-form-label">{{ ucfirst("jam") }}</label>
                    <div class="col-sm-10">
                        <select name="jam" class="form-control">
                            @for($i=0; $i<=23; $i++)
                                <option value="{{ $i }}">{{ $i }}:00 - {{ $i+1 }}:00</option>
                            @endfor
                        </select>
                    </div>
                </div>

                @include('components.input',[
                    'label' => 'Netto',
                    'name' => 'netto',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Tarra',
                    'name' => 'tarra',
                    'type' => 'number',
                    'value' => '',
                    'modifier' => 'required',
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include('components.icon', ['icon' => 'save'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($mollases as $mollase)
<div class="modal fade" id="edit{{ $mollase->id }}" tabindex="-1" mollase="dialog" aria-labelledby="edit{{ $mollase->id }}Label" aria-hidden="true">
    <div class="modal-dialog" mollase="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit{{ $mollase->id }}Label">Edit {{ ucfirst('timbangan tetes') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('mollases.update', $mollase->id) }}" class="text-dark">
                @csrf
                @method('PUT')

                @include('components.input',[
                    'label' => 'Timestamp',
                    'name' => 'created_at',
                    'type' => 'text',
                    'value' => $mollase->created_at,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Netto',
                    'name' => 'netto',
                    'type' => 'number',
                    'value' => $mollase->netto,
                    'modifier' => 'required',
                ])

                @include('components.input',[
                    'label' => 'Tarra',
                    'name' => 'tarra',
                    'type' => 'number',
                    'value' => $mollase->tarra,
                    'modifier' => 'required',
                ])

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save
                    @include('components.icon', ['icon' => 'edit'])
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($mollases as $mollase)
<div class="modal fade" id="delete{{ $mollase->id }}" tabindex="-1" mollase="dialog" aria-labelledby="delete{{ $mollase->id }}Label" aria-hidden="true">
    <div class="modal-dialog" mollase="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete{{ $mollase->id }}Label">Hapus {{ ucfirst('timbangan tetes') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('mollases.destroy', $mollase->id) }}" class="text-dark">
                @csrf
                @method('DELETE')
                <p>Apakah Anda yakin ?</p>

                @include('components.input',[
                    'label' => 'Netto',
                    'name' => 'netto',
                    'type' => 'text',
                    'value' => $mollase->netto,
                    'modifier' => 'readonly',
                ])
                <input type="hidden" name="mollase_id" value="{{ $mollase->mollase_id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes
                    @include('components.icon', ['icon' => 'trash'])
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

