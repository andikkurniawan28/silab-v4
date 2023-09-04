@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("analisa Posbrix") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("analisa Posbrix") }}</h5>
        </div>
        <div class="card-body">
            @foreach($posbrix as $posbrix)
                <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("on_farm.analisa_posbrix", $posbrix->id) }}">
                    @include('components.icon', ['icon' => 'plus '])
                    {{ $posbrix->name }}
                </a>
            @endforeach
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>{{ strtoupper("spta") }}</td>
                            <th>{{ ucfirst("brix") }}</td>
                            {{-- <th>{{ ucfirst("lokasi") }}</td> --}}
                            <th>{{ ucfirst("kawalan") }}</td>
                            <th>{{ ucfirst("varietas") }}</td>
                            <th>{{ ucfirst("status") }}</td>
                            <th>{{ ucfirst("analis") }}</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analisa_posbrix as $analisa_posbrix)
                        <tr>
                            <td>{{ $analisa_posbrix->id }}</td>
                            <td>{{ $analisa_posbrix->created_at }}</td>
                            <td>{{ $analisa_posbrix->spta }}</td>
                            <td>{{ $analisa_posbrix->brix }}</td>
                            {{-- <td>{{ $analisa_posbrix->posbrix->name ?? "" }}</td> --}}
                            <td>{{ $analisa_posbrix->kawalan->name ?? "" }}</td>
                            <td>{{ $analisa_posbrix->variety->name ?? "" }}</td>
                            <td>{{ $analisa_posbrix->status->name ?? "" }}</td>
                            <td>{{ $analisa_posbrix->user->name }}</td>
                            <td>
                                <form action="{{ route("analisa_posbrix.destroy", $analisa_posbrix->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("analisa_posbrix.edit", $analisa_posbrix->id) }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
                                </button>
                                </form>
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



@endsection

