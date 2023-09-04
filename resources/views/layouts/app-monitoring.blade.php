<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ ENV("APP_NAME") }}</title>
	<link rel="icon" type="image/png" href="/monitoring/assets/img/QC.png"/>
    <link rel="stylesheet" href="/monitoring/assets/style/monitoring_style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
    <style>
        table {
            border-collapse: collapse;
            width: 95%;
        }

        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: rgb(19, 110, 170);
            color: white;
        }
        tr:hover {background-color: #D6E4FB;}
    </style>
</head>
<body>
    <section>

        <nav>
            <a href="{{ route("home") }}" class="logo" >{{ ENV("APP_NAME") }}</a>
            <ul>
                @foreach($config["station"] as $station)
                    <li><a href="{{ route("monitoring.perStation", $station->id) }}">{{ $station->name }}</a></li>
                @endforeach
            </ul>
        </nav>

        @yield("content")

        <footer>
            <p class="copyright" style="font-size:15px">Developed by Andik Kurniawan</h1>
        </footer>

    </section>

    <div class="social">
        <a href="{{ route("select_date_monitoring") }}"><i class="fa fa-calendar"></i></a>
     </div>
</body>

</html>
