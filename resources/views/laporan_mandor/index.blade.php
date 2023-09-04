
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
                    <div class="col-10 table-responsive">
                        <table border='1' cellpadding='0' width='100%'>
                            <thead>
                                <tr>
                                    <th rowspan='2'><img class='rounded mx-auto d-block' src='/admin/img/ka.jpg' width="100" height="100"></img></th>
                                    <th colspan='3' class='text-center'>
                                        <H6><STRONG>PT. KEBON AGUNG UNIT PABRIK GULA KEBON AGUNG</STRONG></H6>
                                        <p><SMALL>FORMULIR</SMALL></p>
                                        <H4><STRONG>LAPORAN MANDOR OFF-FARM</STRONG></H4>
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

			<div class="col-5 table-responsive">

                <h3 class="page-header">Stasiun Gilingan</h3>

				<table width='100%' border='1' cellpadding='5'>
				  <thead>
					<tr>
						<th bgcolor='pink'>Uraian</th>
						<th bgcolor='pink'>Brix</th>
						<th bgcolor='pink'>Pol</th>
						<th bgcolor='pink'>HK</th>
						<th bgcolor='pink'>pH</th>
						<th bgcolor='pink'>%R</th>
					</tr>
				  </thead>
				  <tbody>
                        @for($i=2; $i<=6; $i++)
                        <tr>
                            <td>{{ $data[$i]["name"] }}</td>
                            <td>{{ $data[$i]["data"]["pbrix"] }}</td>
                            <td>{{ $data[$i]["data"]["ppol"] }}</td>
                            <td>{{ $data[$i]["data"]["hk"] }}</td>
                            <td>{{ $data[$i]["data"]["ph"] }}</td>
                            <td>{{ $data[$i]["data"]["rendemen"] }}</td>
                        </tr>
                        @endfor
					</tbody>
				</table>

                <br>

                <h3 class="page-header">Stasiun Pemurnian</h3>

				<table width='100%' border='1' cellpadding='5'>
				  <thead>
					<tr>
						<th bgcolor='pink'>Uraian</th>
						<th bgcolor='pink'>Brix</th>
						<th bgcolor='pink'>Pol</th>
						<th bgcolor='pink'>HK</th>
						<th bgcolor='pink'>IU</th>
						<th bgcolor='pink'>CAO</th>
						<th bgcolor='pink'>pH</th>
						<th bgcolor='pink'>Turb</th>
						<th bgcolor='pink'>Blotong</th>
						<th bgcolor='pink'>Air</th>
					</tr>
				  </thead>
				  <tbody>
                        @for($x=0; $x<count($stasiun["pemurnian"]); $x++)
						<tr>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["name"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["pbrix"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["ppol"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["hk"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["icumsa"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["cao"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["ph"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["turbidity"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["pol"] }}</td>
                            <td>{{ $data[$stasiun["pemurnian"][$x]->id-1]["data"]["ka_blotong"] }}</td>
					    </tr>
                        @endfor
				  </tbody>
				</table>

                <br>

				<h3 class="page-header">Stroop</h3>

				<table width='100%' border='1' cellpadding='6'>
				  <thead>
				  	<tr>
						<th bgcolor='pink'>Uraian</th>
						<th bgcolor='pink'>Brix</th>
						<th bgcolor='pink'>Pol</th>
						<th bgcolor='pink'>HK</th>
						<th bgcolor='pink'>IU</th>
				 	</tr>
				  	</thead>

				  	<tbody>
                        @for($x=0; $x<count($stasiun["stroop"]); $x++)
						<tr>
                            <td>{{ $data[$stasiun["stroop"][$x]->id-1]["name"] }}</td>
                            <td>{{ $data[$stasiun["stroop"][$x]->id-1]["data"]["pbrix"] }}</td>
                            <td>{{ $data[$stasiun["stroop"][$x]->id-1]["data"]["ppol"] }}</td>
                            <td>{{ $data[$stasiun["stroop"][$x]->id-1]["data"]["hk"] }}</td>
                            <td>{{ $data[$stasiun["stroop"][$x]->id-1]["data"]["icumsa"] }}</td>
					    </tr>
                        @endfor
					</tbody>
				</table>

                <br>

                <h3 class="page-header">Stasiun Ketel</h3>

				<table width='100%' border='1' cellpadding='6'>
				  <thead>
				  	<tr>
						<th bgcolor='pink'>Uraian</th>
						<th bgcolor='pink'>TDS</th>
						<th bgcolor='pink'>pH</th>
						<th bgcolor='pink'>Hardness</th>
						<th bgcolor='pink'>Phospat</th>
				 	</tr>
				  	</thead>
				  	<tbody>
                        @for($x=0; $x<count($stasiun["ketel"]); $x++)
                            <tr>
                                <td>{{ $data[$stasiun["ketel"][$x]->id-1]["name"] }}</td>
                                <td>{{ $data[$stasiun["ketel"][$x]->id-1]["data"]["tds"] }}</td>
                                <td>{{ $data[$stasiun["ketel"][$x]->id-1]["data"]["ph_ketel"] }}</td>
                                <td>{{ $data[$stasiun["ketel"][$x]->id-1]["data"]["kesadahan"] }}</td>
                                <td>{{ $data[$stasiun["ketel"][$x]->id-1]["data"]["phospat"] }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>

                <br>

                <h3 class="page-header">Tangki Tetes</h3>

				<table width='100%' border='1' cellpadding='6'>
				  <thead>
				  	<tr>
						<th bgcolor='pink'>Uraian</th>
						<th bgcolor='pink'>Brix</th>
						<th bgcolor='pink'>TSAI</th>
						<th bgcolor='pink'>Optical Density</th>
				 	</tr>
				  	</thead>
				  	<tbody>
                        @for($x=0; $x<count($stasiun["tetes"]); $x++)
                            <tr>
                                <td>{{ $data[$stasiun["tetes"][$x]->id-1]["name"] }}</td>
                                <td>{{ $data[$stasiun["tetes"][$x]->id-1]["data"]["pbrix"] }}</td>
                                <td>{{ $data[$stasiun["tetes"][$x]->id-1]["data"]["tsai"] }}</td>
                                <td>{{ $data[$stasiun["tetes"][$x]->id-1]["data"]["optical_density"] }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>

			</div>

			<div class="col-5 table-responsive">

                <h3 class="page-header">Ampas Gilingan</h3>

                <table width='100%' border='1' cellpadding='5'>
                <thead>
                    <tr>
                        <th bgcolor='pink'>Uraian</th>
                        <th bgcolor='pink'>Pol</th>
                        <th bgcolor='pink'>ZK</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=7; $i<=11; $i++)
                    <tr>
                        <td>{{ $data[$i]["name"] }}</td>
                        <td>{{ $data[$i]["data"]["pol_ampas"] }}</td>
                        <td>{{ $data[$i]["data"]["zk_ampas"] }}</td>
                    </tr>
                    @endfor
                </tbody>
                </table>

                <br>

				<h3 class="page-header">Stasiun DRK</h3>

				<table width='100%' border='1' cellpadding='5'>
				  <thead>
					<tr>
						<th bgcolor='pink'>Uraian</th>
						<th bgcolor='pink'>Brix</th>
						<th bgcolor='pink'>Pol</th>
						<th bgcolor='pink'>HK</th>
						<th bgcolor='pink'>IU</th>
						<th bgcolor='pink'>CaO</th>
						<th bgcolor='pink'>pH</th>
						<th bgcolor='pink'>Turb</th>
						<th bgcolor='pink'>Cake</th>
						<th bgcolor='pink'>Air</th>
					</tr>
				  </thead>
				  <tbody>
					@for($x=0; $x<count($stasiun["drk"]); $x++)
						<tr>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["name"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["pbrix"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["ppol"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["hk"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["icumsa"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["cao"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["ph"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["turbidity"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["pol"] }}</td>
                            <td>{{ $data[$stasiun["drk"][$x]->id-1]["data"]["moisture"] }}</td>
					    </tr>
                    @endfor
				  </tbody>
				</table>

                <br>

                <h3 class="page-header">Stasiun Penguapan</h3>

                    <table width='100%' border='1' cellpadding='5'>
                    <thead>
                        <tr>
                            <th bgcolor='pink'>Uraian</th>
                            <th bgcolor='pink'>Brix</th>
                            <th bgcolor='pink'>Pol</th>
                            <th bgcolor='pink'>HK</th>
                            <th bgcolor='pink'>IU</th>
                            <th bgcolor='pink'>CaO</th>
                            <th bgcolor='pink'>pH</th>
                            <th bgcolor='pink'>Turb</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($x=0; $x<count($stasiun["penguapan"]); $x++)
						<tr>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["name"] }}</td>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["data"]["pbrix"] }}</td>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["data"]["ppol"] }}</td>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["data"]["hk"] }}</td>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["data"]["icumsa"] }}</td>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["data"]["cao"] }}</td>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["data"]["ph"] }}</td>
                            <td>{{ $data[$stasiun["penguapan"][$x]->id-1]["data"]["turbidity"] }}</td>
					    </tr>
                        @endfor
                        </tbody>
                    </table>

                    <br>

                    <h3 class="page-header">Stasiun Masakan</h3>

                    <table width='100%' border='1' cellpadding='5'>
                        <thead>
                            <tr>
                                <th bgcolor='pink'>Uraian</th>
                                <th bgcolor='pink'>Jumlah</th>
                                <th bgcolor='pink'>Volume</th>
                                <th bgcolor='pink'>Brix</th>
                                <th bgcolor='pink'>Pol</th>
                                <th bgcolor='pink'>HK</th>
                                <th bgcolor='pink'>IU</th>
                            </tr>
                        </thead>

                        <tbody>
                            @for($x=0; $x<count($stasiun["masakan"]); $x++)
                            <tr>
                                <td>{{ $data[$stasiun["masakan"][$x]->id-1]["name"] }}</td>
                                <td>{{ $data[$stasiun["masakan"][$x]->id-1]["data"]["jumlah"] }}</td>
                                <td>{{ $data[$stasiun["masakan"][$x]->id-1]["data"]["volume"] }}</td>
                                <td>{{ $data[$stasiun["masakan"][$x]->id-1]["data"]["pbrix"] }}</td>
                                <td>{{ $data[$stasiun["masakan"][$x]->id-1]["data"]["ppol"] }}</td>
                                <td>{{ $data[$stasiun["masakan"][$x]->id-1]["data"]["hk"] }}</td>
                                <td>{{ $data[$stasiun["masakan"][$x]->id-1]["data"]["icumsa"] }}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>

				<br>

				<h3 class="page-header">Gula in Proses</h3>

				<table width='100%' border='1' cellpadding='5'>
				    <thead>
                        <tr>
                            <th bgcolor='pink'>Uraian</th>
                            <th bgcolor='pink'>IU</th>
                            <th bgcolor='pink'>Kadar Air</th>
                            <th bgcolor='pink'>Brix</th>
                            <th bgcolor='pink'>Pol</th>
                            <th bgcolor='pink'>HK</th>
                            <th bgcolor='pink'>BJB</th>
                            <th bgcolor='pink'>SO<sub>2</sub></th>
                        </tr>
				    </thead>
				    <tbody>
                        @for($x=0; $x<count($stasiun["gula"]); $x++)
                            <tr>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["name"] }}</td>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["data"]["icumsa"] }}</td>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["data"]["moisture"] }}</td>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["data"]["pbrix"] }}</td>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["data"]["ppol"] }}</td>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["data"]["hk"] }}</td>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["data"]["bjb"] }}</td>
                                <td>{{ $data[$stasiun["gula"][$x]->id-1]["data"]["so2"] }}</td>
                            </tr>
                        @endfor
				    </tbody>
				</table>

			  </div>
			  <!-- /.col -->
			</div>

			<div class="row d-flex justify-content-center text-dark">
			  <!-- accepted payments column -->
			  <div class="col-5">
                    <br><br>
					<p class='text-center'>Mengetahui,</p>
					<br></br><br></br>
					<br></br>
					<p class='text-center'><strong><u>--------</u></strong></p>
					<p class='text-center'>Chemiker Jaga</p>
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
