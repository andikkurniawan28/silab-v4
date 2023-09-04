
@if($message = Session::get('error'))
    @include('components.alert', ['message'=>$message, 'color'=>'danger'])
@elseif($message = Session::get('success'))
    @include('components.alert', ['message'=>$message, 'color'=>'success'])
@endif

@if ($errors->any())
<div class="alert alert-danger text-xs">
    <p>Error :</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
</div>
@endif

<h1>Aplikasi Tap ARI - {{ $name }}</h1>
<form action="{{ route("aplikasi_tap_ari.process") }}" method="POST">
    @csrf
    <input type="hidden" maxlength="10" name="timbang_id" id="timbang_id" value="{{ $timbang_id }}">
    <input type="text" maxlength="10" name="rfid" id="rfid" required autofocus>
</form>
