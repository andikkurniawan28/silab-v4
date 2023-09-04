<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/trangkil/assets/style/login_style.css">
	<link rel="icon" type="image/png" href="/trangkil/assets/img/QC.png"/>
    <title>{{ ENV("APP_NAME") }}</title>
</head>
<body>
    <div class="alert alert-warning" role="alert"></div>
    <div class="container">
        <form action="{{ route("select_date.process") }}" method="POST" class="login-email">
            @csrf
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">{{ ENV("APP_NAME") }}</p>
            <input type="hidden" name="url" value="{{ session("url_requested") }}" readonly>
            <div class="input-group">
                <input type="date" placeholder="Tanggal" name="date" value="{{ date("Y-m-d") }}" required autofocus>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Pilih Tanggal</button>
            </div>
        </form>
        <div class="footer" align="center">
            &copy; Andik Kurniawan
        </div>
    </div>
</body>
</html>
