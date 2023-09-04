
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

<h1>Aplikasi Persiapan Core Sample - {{ $name }}</h1>
<form action="{{ route("aplikasi_persiapan_core_sample.process") }}" method="POST">
    @csrf
    <p>Jumlah Kartu EK Timur : <b>{{ $kartu["ek_timur"] }}</b> Kartu</p>
    <p>Jumlah Kartu EK Barat : <b>{{ $kartu["ek_barat"] }}</b> Kartu</p>
    <p>Jumlah Kartu EB Gandeng : <b>{{ $kartu["eb"] }}</b> Kartu</p>
    <input type="hidden" name="core_id" id="core_id" value="{{ $core_id }}">
    <input type="text" maxlength="10" name="rfid" id="rfid" required autofocus>
</form>
