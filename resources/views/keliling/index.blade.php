@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ ucfirst("keliling proses") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">{{ ucfirst("keliling proses") }}</h5>
            <br>
            <a type="button" class="btn btn-outline-primary btn-sm"  href="{{ route("keliling.create") }}">
                @include('components.icon', ['icon' => 'plus '])
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Waktu</td>
                            <th>Data</td>
                            <th>Petugas</td>
                            <th>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keliling as $keliling)
                        <tr>
                            <td>{{ $keliling->id }}</td>
                            <td>{{ $keliling->created_at }}</td>
                            <td>
                                @for($i=1; $i<=9; $i++)
                                    <li>
                                        {{ "hampa_udara_evap{$i} : " }}
                                        @php
                                            $var = "hampa_udara_evap$i";
                                            echo $keliling->$var;
                                        @endphp
                                    </li>
                                @endfor
                                @for($i=1; $i<=18; $i++)
                                    <li>
                                        {{ "hampa_udara_pan_masakan{$i} : " }}
                                        @php
                                            $var = "hampa_udara_pan_masakan$i";
                                            echo $keliling->$var;
                                        @endphp
                                    </li>
                                @endfor
                                <li>{{ "pompa_vakum_evap : " }}{{ $keliling->pompa_vakum_evap }}</li>
                                <li>{{ "pompa_vakum_masakan : " }}{{ $keliling->pompa_vakum_masakan }}</li>
                                @for($i=1; $i<=3; $i++)
                                    <li>
                                        {{ "suhu_pemanas{$i} : " }}
                                        @php
                                            $var = "suhu_pemanas$i";
                                            echo $keliling->$var;
                                        @endphp
                                    </li>
                                @endfor
                                <li>{{ "suhu_ne_stc : " }}{{ $keliling->suhu_ne_stc }}</li>
                                <li>{{ "suhu_air_terjun : " }}{{ $keliling->suhu_air_terjun }}</li>
                                <li>{{ "suhu_air_injeksi : " }}{{ $keliling->suhu_air_injeksi }}</li>
                                <li>{{ "volume_clear_liquor : " }}{{ $keliling->volume_clear_liquor }}</li>
                                <li>{{ "volume_nk_sebelum_sulfitasi : " }}{{ $keliling->volume_nk_sebelum_sulfitasi }}</li>
                                <li>{{ "volume_nk_setelah_sulfitasi_atas : " }}{{ $keliling->volume_nk_setelah_sulfitasi_atas }}</li>
                                <li>{{ "volume_nk_setelah_sulfitasi_bawah : " }}{{ $keliling->volume_nk_setelah_sulfitasi_bawah }}</li>
                                <li>{{ "volume_r1_mol_atas : " }}{{ $keliling->volume_r1_mol_atas }}</li>
                                <li>{{ "volume_r1_mol_bawah : " }}{{ $keliling->volume_r1_mol_bawah }}</li>
                                <li>{{ "volume_r2_mol_atas : " }}{{ $keliling->volume_r2_mol_atas }}</li>
                                <li>{{ "volume_r2_mol_bawah : " }}{{ $keliling->volume_r2_mol_bawah }}</li>
                                <li>{{ "volume_stroop_a_atas : " }}{{ $keliling->volume_stroop_a_atas }}</li>
                                <li>{{ "volume_stroop_a_bawah : " }}{{ $keliling->volume_stroop_a_bawah }}</li>
                                <li>{{ "volume_stroop_c_atas : " }}{{ $keliling->volume_stroop_c_atas }}</li>
                                <li>{{ "volume_stroop_c_bawah : " }}{{ $keliling->volume_stroop_c_bawah }}</li>
                                <li>{{ "volume_klare_d_atas : " }}{{ $keliling->volume_klare_d_atas }}</li>
                                <li>{{ "volume_klare_d_bawah : " }}{{ $keliling->volume_klare_d_bawah }}</li>
                                <li>{{ "volume_einwuurf_c : " }}{{ $keliling->volume_einwuurf_c }}</li>
                                <li>{{ "volume_einwuurf_d : " }}{{ $keliling->volume_einwuurf_d }}</li>
                                <li>{{ "volume_cvp_c : " }}{{ $keliling->volume_cvp_c }}</li>
                                <li>{{ "volume_cvp_d : " }}{{ $keliling->volume_cvp_d }}</li>
                                @for($i=1; $i<=11; $i++)
                                    <li>
                                        {{ "volume_palung{$i} : " }}
                                        @php
                                            $var = "volume_palung$i";
                                            echo $keliling->$var;
                                        @endphp
                                    </li>
                                @endfor
                                <li>{{ "tekanan_uap_tinggi : " }}{{ $keliling->tekanan_uap_tinggi }}</li>
                                <li>{{ "tekanan_uap_rendah : " }}{{ $keliling->tekanan_uap_rendah }}</li>
                                <li>{{ "tekanan_uap_bekas : " }}{{ $keliling->tekanan_uap_bekas }}</li>
                            </td>
                            <td>{{ $keliling->user->name ?? "" }}</td>
                            <td>
                                <form action="{{ route("keliling.destroy", $keliling->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a type="button" class="btn btn-outline-success btn-sm" href="{{ route("keliling.edit", $keliling->id) }}">
                                    @include('components.icon', ['icon' => 'edit '])
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    @include('components.icon', ['icon' => 'trash '])
                                    Hapus
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>



@endsection

