@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route("user.index") }}">{{ ucfirst("pengguna") }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah {{ ucfirst("pengguna") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tambah {{ ucfirst('pengguna') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("user.store") }}" method="post">
                @csrf
                <input type="hidden" name="is_active" value="1">
                <p>
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" id="name" required autofocus>
                </p>
                <p>
                    <label>Hak akses</label>
                    <select name="role_id" class="form-control">
                        @foreach ($role as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                </p>
                <p>
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </p>
                <p>
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </p>
            </form>
        </div>
    </div>

</div>
@endsection

