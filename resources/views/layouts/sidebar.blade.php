<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("home") }}">
        <div class="sidebar-brand-icon">
            {{-- <img src="/admin/img/QC.png" width="50" height="50" alt="Logo QC"> --}}
            <i class="fas fa-fire"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SILAB</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route("home") }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Home</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route("dashboard") }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>{{ ucfirst("dashboard") }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-eye"></i>
            <span>Monitoring</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark">Off Farm :</h6>
                @foreach($config["station"] as $station)
                    <a class="collapse-item" href="{{ route("monitoring.perStation", $station->id) }}">{{ $station->name }}</a>
                @endforeach
                <h6 class="collapse-header text-dark">On Farm :</h6>
                @php
                    $on_farm_station = ["Posbrix", "Core Sample", "ARI", "Scoring"];
                @endphp
                @for($i=0; $i<count($on_farm_station); $i++)
                    <a class="collapse-item" href="{{ route("monitoring.onfarm", $i) }}">{{ $on_farm_station[$i] }}</a>
                @endfor
            </div>
        </div>
    </li>

    @if(Auth()->user()->role_id <= 8)

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Off-farm
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities7" aria-expanded="true" aria-controls="collapseUtilities7">
            <i class="fas fa-fw fa-barcode"></i>
            <span>Barcode</span>
        </a>
        <div id="collapseUtilities7" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark">Stasiun :</h6>
                <a class="collapse-item" href="{{ route("cetak_ronsel") }}">{{ "Ronsel" }}</a>
                @foreach($config["station"] as $station)
                    <a class="collapse-item" href="{{ route("cetak_barcode", $station->id) }}">{{ $station->name }}</a>
                @endforeach
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities5" aria-expanded="true" aria-controls="collapseUtilities5">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data</span>
        </a>
        <div id="collapseUtilities5" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark">Menu :</h6>
                @if(Auth()->user()->role_id <= 6)
                <a class="collapse-item" href="{{ route("station.index") }}">{{ ucfirst("stasiun") }}</a>
                <a class="collapse-item" href="{{ route("method.index") }}">{{ ucfirst("metode") }}</a>
                <a class="collapse-item" href="{{ route("material.index") }}">{{ ucfirst("material") }}</a>
                <a class="collapse-item" href="{{ route("faktor.index") }}">{{ ucfirst("faktor") }}</a>
                <a class="collapse-item" href="{{ route("koreksi_timbangan") }}">{{ ucfirst("koreksi Timbangan") }}</a>
                <a class="collapse-item" href="{{ route("mollases.index") }}">Timbangan {{ ucfirst("tetes") }}</a>
                <a class="collapse-item" href="{{ route("rawsugarinputs.index") }}">Timbangan {{ ucfirst("RS In") }}</a>
                <a class="collapse-item" href="{{ route("rawsugaroutputs.index") }}">Timbangan {{ ucfirst("RS Out") }}</a>
                @endif
                <a class="collapse-item" href="{{ route("sample.index") }}">{{ ucfirst("sampel") }}</a>
                <a class="collapse-item" href="{{ route("saccharomat.index") }}">{{ ucfirst("saccharomat") }}</a>
                <a class="collapse-item" href="{{ route("coloromat.index") }}">{{ ucfirst("coloromat") }}</a>
                <a class="collapse-item" href="{{ route("moisture.index") }}">{{ ucfirst("moisture") }}</a>
                <a class="collapse-item" href="{{ route("analisa_ampas.index") }}">{{ ucfirst("analisa ampas") }}</a>
                <a class="collapse-item" href="{{ route("analisa_blotong.index") }}">{{ ucfirst("analisa blotong") }}</a>
                <a class="collapse-item" href="{{ route("analisa_ketel.index") }}">{{ ucfirst("analisa ketel") }}</a>
                <a class="collapse-item" href="{{ route("analisa_umum.index") }}">{{ ucfirst("analisa umum") }}</a>
                <a class="collapse-item" href="{{ route("analisa_khusus.index") }}">{{ ucfirst("analisa khusus") }}</a>
                <a class="collapse-item" href="{{ route("analisa_sulphur.index") }}">{{ ucfirst("analisa SO2/BJB") }}</a>
                <a class="collapse-item" href="{{ route("analisa_lain.index") }}">{{ ucfirst("analisa lain2") }}</a>
                <a class="collapse-item" href="{{ route("balance.index") }}">{{ ucfirst("neraca NM") }}</a>
                <a class="collapse-item" href="{{ route("imbibition.index") }}">{{ ucfirst("imbibisi") }}</a>
                <a class="collapse-item" href="{{ route("keliling.index") }}">{{ ucfirst("keliling proses") }}</a>
                <a class="collapse-item" href="{{ route("chemical.index") }}">{{ ucfirst("penggunaan bahan kimia") }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities9" aria-expanded="true" aria-controls="collapseUtilities9">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities9" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark">Menu :</h6>
                    <a class="collapse-item" href="{{ route("report_off_farm") }}" target="_blank">Laporan {{ ucfirst("harian") }}</a>
                    @php $shift = ["Pagi", "Sore", "Malam", "Harian"] @endphp
                    @for($i=0; $i<count($shift); $i++)
                        <a class="collapse-item" href="{{ route("laporan_mandor", $i+1) }}" target="_blank">{{ ucfirst("mandor") }} {{ $shift[$i] }}</a>
                    @endfor
            </div>
        </div>
    </li>

    @endif


    @if(Auth()->user()->role_id <= 10 && Auth()->user()->role_id != 7 && Auth()->user()->role_id != 8)

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        On-farm
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities6" aria-expanded="true" aria-controls="collapseUtilities6">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data</span>
        </a>
        <div id="collapseUtilities6" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark">Menu :</h6>
                @if(Auth()->user()->role_id <= 6)
                <a class="collapse-item" href="{{ route("koreksi_rendemen") }}">{{ ucfirst("koreksi Rendemen") }}</a>
                <a class="collapse-item" href="{{ route("rendemen_npp_acuan.index") }}">{{ ucfirst("rendemen NPP Acuan") }}</a>
                <a class="collapse-item" href="{{ route("rafaksi_value.index") }}">{{ ucfirst("nilai Rafaksi") }}</a>
                <a class="collapse-item" href="{{ route("kud.index") }}">{{ ucfirst("KUD") }}</a>
                <a class="collapse-item" href="{{ route("pospantau.index") }}">{{ ucfirst("Pos Pantau") }}</a>
                <a class="collapse-item" href="{{ route("wilayah.index") }}">{{ ucfirst("wilayah") }}</a>
                <a class="collapse-item" href="{{ route("posbrix.index") }}">{{ ucfirst("Titik Posbrix") }}</a>
                <a class="collapse-item" href="{{ route("core.index") }}">{{ ucfirst("Titik Core") }}</a>
                <a class="collapse-item" href="{{ route("timbang.index") }}">{{ ucfirst("Titik Timbang") }}</a>
                <a class="collapse-item" href="{{ route("kawalan.index") }}">{{ ucfirst("kawalan") }}</a>
                <a class="collapse-item" href="{{ route("variety.index") }}">{{ ucfirst("varietas") }}</a>
                <a class="collapse-item" href="{{ route("status.index") }}">{{ ucfirst("status") }}</a>
                @endif
                <a class="collapse-item" href="{{ route("analisa_posbrix.index") }}">{{ ucfirst("analisa Posbrix") }}</a>
                <a class="collapse-item" href="{{ route("core_card.index") }}">{{ ucfirst("kartu Core") }}</a>
                <a class="collapse-item" href="{{ route("core_sampling.index") }}">{{ ucfirst("core Sampling") }}</a>
                <a class="collapse-item" href="{{ route("analisa_core.index") }}">{{ ucfirst("analisa Core") }}</a>
                <a class="collapse-item" href="{{ route("ari_card.index") }}">{{ ucfirst("kartu ARI") }}</a>
                <a class="collapse-item" href="{{ route("ari_sampling.index") }}">{{ ucfirst("ARI Sampling") }}</a>
                <a class="collapse-item" href="{{ route("analisa_ari.index") }}">{{ ucfirst("analisa ARI") }}</a>
                <a class="collapse-item" href="{{ route("scoring.index") }}">{{ ucfirst("scoring") }}</a>
                <a class="collapse-item" href="{{ route("cari_data") }}">{{ ucfirst("cari Data") }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities8" aria-expanded="true" aria-controls="collapseUtilities8">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities8" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark">Menu :</h6>
                    @php $shift = ["Pagi", "Sore", "Malam", "Harian"] @endphp
                    @for($i=0; $i<count($shift); $i++)
                        <a class="collapse-item" href="{{ route("laporan_mandor_on_farm", $i+1) }}" target="_blank">{{ ucfirst("mandor") }} {{ $shift[$i] }}</a>
                    @endfor
            </div>
        </div>
    </li>

    @endif

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
