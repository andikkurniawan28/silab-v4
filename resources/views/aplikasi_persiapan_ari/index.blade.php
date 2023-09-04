
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

<h1>Aplikasi Persiapan ARI</h1>
<form action="{{ route("aplikasi_persiapan_ari.process") }}" method="POST">
    @csrf
    <p>Jumlah Kartu : <b>{{ $kartu }}</b> Kartu</p>
    <input type="text" maxlength="10" name="rfid" id="rfid" required autofocus>
</form>
