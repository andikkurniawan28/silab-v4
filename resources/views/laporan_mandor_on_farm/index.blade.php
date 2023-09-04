
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

        <title>{{ ENV("APP_NAME") }}</title>

        <link rel="icon" type="image/png" href="/admin/img/QC.png"/>
        <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	</head>

	<body>


        <div class="wrapper">

            <section class="invoice">

                <br></br>

                <div class="row d-flex justify-content-center text-dark text-dark">
                    <div class="col-12 table-responsive">
                        <table border='1' cellpadding='0' width='100%'>
                            <thead>
                                <tr>
                                    <th rowspan='2'><img class='rounded mx-auto d-block' src='/admin/img/ka.jpg' width="100" height="100"></img></th>
                                    <th colspan='3' class='text-center'>
                                        <H6><STRONG>PT. KEBON AGUNG UNIT PABRIK GULA KEBON AGUNG</STRONG></H6>
                                        <p><SMALL>FORMULIR</SMALL></p>
                                        <H4><STRONG>LAPORAN MANDOR ON-FARM</STRONG></H4>
                                    </th>
                                    <th rowspan='2'><img class='rounded mx-auto d-block' src='/admin/img/QC.png' width="100" height="100"></img></th>
                                </tr>
                                <tr>
                                    <th class='text-center'>No Dok : KBA/FRM/QC/005-00</th>
                                    <th class='text-center'>Tanggal : {{ date("d-m-Y", strtotime(session("date"))) }}</th>
                                    <th class='text-center'>
                                        Shift
                                        @switch($shift)
                                            @case(1)
                                                {{ "Pagi" }}
                                                @break
                                            @case(2)
                                                {{ "Sore" }}
                                                @break
                                            @case(3)
                                                {{ "Malam" }}
                                                @break
                                            @case(4)
                                                {{ "Harian" }}
                                                @break

                                            @default

                                        @endswitch
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            <br>

			<div class='row d-flex justify-content-center text-dark'>

			    <div class="col-3 table-responsive">

                    <h3 class="page-header">Posbrix</h3>
                    <table width='100%' border='1' cellpadding='5' class="text-center">
                        <thead>
                            <tr>
                                <th bgcolor='pink'>No</th>
                                <th bgcolor='pink'>Jam</th>
                                <th bgcolor='pink'>SPTA</th>
                                <th bgcolor='pink'>Brix</th>
                                {{-- <th bgcolor='pink'>Varietas</th>
                                <th bgcolor='pink'>Kawalan</th>
                                <th bgcolor='pink'>Status</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        @for($i=0; $i<count($data["posbrix"]); $i++)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ date("H:i", strtotime($data["posbrix"][$i]->created_at)) }}</td>
                                <td>{{ $data["posbrix"][$i]->spta }}</td>
                                <td>{{ $data["posbrix"][$i]->brix }}</td>
                                {{-- <td>{{ $data["posbrix"][$i]->variety->name }}</td>
                                <td>{{ $data["posbrix"][$i]->kawalan->name }}</td>
                                <td>{{ $data["posbrix"][$i]->status->name }}</td> --}}
                            </tr>
                        @endfor
                        </tbody>
                    </table>
			    </div>

                <div class="col-3 table-responsive">

                    <h3 class="page-header">Core Sample</h3>
                    <table width='100%' border='1' cellpadding='5' class="text-center">
                        <thead>
                            <tr>
                                <th bgcolor='pink'>No</th>
                                <th bgcolor='pink'>Jam</th>
                                <th bgcolor='pink'>SPTA</th>
                                {{-- <th bgcolor='pink'>Antrian</th>
                                <th bgcolor='pink'>Brix</th>
                                <th bgcolor='pink'>Pol</th> --}}
                                <th bgcolor='pink'>R</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["core_sample"] as $core_sample)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date("H:i", strtotime($core_sample["created_at"])) }}</td>
                                    <td>{{ $core_sample["spta"] }}</td>
                                    {{-- <td>{{ $core_sample["barcode_antrian"] }}</td>
                                    <td>{{ $core_sample["brix"] }}</td>
                                    <td>{{ $core_sample["pol"] }}</td> --}}
                                    <td>{{ $core_sample["rendemen"] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

			    </div>

                <div class="col-3 table-responsive">

                    <h3 class="page-header">Analisa Rendemen</h3>
                    <table width='100%' border='1' cellpadding='5' class="text-center">
                        <thead>
                            <tr>
                                <th bgcolor='pink'>No</th>
                                <th bgcolor='pink'>Jam</th>
                                {{-- <th bgcolor='pink'>SPTA</th> --}}
                                <th bgcolor='pink'>Antrian</th>
                                {{-- <th bgcolor='pink'>Brix</th>
                                <th bgcolor='pink'>Pol</th> --}}
                                <th bgcolor='pink'>R</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["ari"] as $ari)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date("H:i", strtotime($ari["created_at"])) }}</td>
                                    {{-- <td>{{ $ari["spta"] }}</td> --}}
                                    <td>{{ $ari["barcode_antrian"] }}</td>
                                    {{-- <td>{{ $ari["brix"] }}</td>
                                    <td>{{ $ari["pol"] }}</td> --}}
                                    <td>{{ $ari["rendemen"] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

			    </div>

                <div class="col-3 table-responsive">

                    <h3 class="page-header">Penilaian MBS</h3>
                    <table width='100%' border='1' cellpadding='5' class="text-center">
                        <thead>
                            <tr>
                                <th bgcolor='pink'>No</th>
                                <th bgcolor='pink'>Jam</th>
                                <th bgcolor='pink'>Antrian</th>
                                <th bgcolor='pink'>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["scoring"] as $scoring)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date("H:i", strtotime($scoring["created_at"])) }}</td>
                                    <td>{{ $scoring["barcode_antrian"] }}</td>
                                    <td>{{ $scoring["score"] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

			</div>

			<div class="row d-flex justify-content-center text-dark">
			  <!-- accepted payments column -->
			  <div class="col-5">
                    <br><br>
					<p class='text-center'>Mengetahui,</p>
					<br></br><br></br>
					<br></br>
					<p class='text-center'><strong><u>--------</u></strong></p>
					<p class='text-center'>Koordinator</p>
			  </div>
			  <div class="col-5">
                    <br><br>
					<p class='text-center'>Kebonagung, {{ date("d-m-Y", strtotime(session("date"))) }}</p>
					<br></br><br></br>
					<br></br>
					<p class='text-center'><strong><u>{{ Auth()->user()->name }}</u></strong></p>
					<p class='text-center'>Mandor QC</p>
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->

		  </section>
		  <!-- /.content -->
		</div>
		<!-- ./wrapper -->

		{{-- <script type="text/javascript">
		  window.addEventListener("load", window.print());
		</script> --}}

	</body>
</html>
