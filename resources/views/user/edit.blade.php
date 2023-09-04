@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("user.index") }}">{{ ucfirst("pengguna") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("pengguna") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst('pengguna') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("user.update", $user->id) }}" method="post">
                @csrf
                @method("PUT")
                <p>
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required autofocus>
                </p>
                <p>
                    <label>Hak akses</label>
                    <select name="role_id" class="form-control">
                        @foreach ($role as $role)
                            <option value="{{ $role->id }}"
                                @if($user->role_id == $role->id)
                                    {{ "selected" }}
                                @endif
                            >{{ $role->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
                </p>
                <p>
                    <label>Status</label>
                    <input type="text" name="is_active" class="form-control" id="is_active" value="{{ $user->is_active }}" required>
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

