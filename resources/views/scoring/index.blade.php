@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("scoring") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("scoring") }}</h5>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("scoring.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
            <div class="table-responsive"><br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>{{ ucfirst("waktu") }}</td>
                            <th>{{ ucfirst("antrian") }}</td>
                            <th>{{ ucfirst("meja") }}</td>
                            <th>{{ ucfirst("prosentase") }}</td>
                            <th>{{ ucfirst("analis") }}</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scoring as $scoring)
                        <tr>
                            <td>{{ $scoring->id }}</td>
                            <td>{{ $scoring->created_at }}</td>
                            <td>{{ $scoring->analisa_posbrix->barcode_antrian }}</td>
                            <td>{{ $scoring->meja_tebu }}</td>
                            <td>
                                <li>{{ ucfirst("daduk") }} : {{ $scoring->daduk ?? 0 }}%</li>
                                <li>{{ ucfirst("akar") }} : {{ $scoring->akar ?? 0 }}%</li>
                                <li>{{ ucfirst("tali_pucuk") }} : {{ $scoring->tali_pucuk ?? 0 }}%</li>
                                <li>{{ ucfirst("sogolan") }} : {{ $scoring->sogolan ?? 0 }}%</li>
                                <li>{{ ucfirst("pucuk") }} : {{ $scoring->pucuk ?? 0 }}%</li>
                                <li>{{ ucfirst("tebu_muda") }} : {{ $scoring->tebu_muda ?? 0 }}%</li>
                                <li>{{ ucfirst("lelesan") }} : {{ $scoring->lelesan ?? 0 }}%</li>
                                <li>{{ ucfirst("terbakar") }} : {{ $scoring->terbakar ?? 0 }}%</li>
                            </td>
                            <td>{{ $scoring->user->name }}</td>
                            <td>
                                <form action="{{ route("scoring.destroy", $scoring->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("scoring.edit", $scoring->id) }}">
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

