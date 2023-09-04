@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("keliling.index") }}">{{ ucfirst("keliling proses") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("keliling proses") }}</li>
        </ol>
    </nav>

    @include("layouts.alert")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Edit {{ ucfirst("keliling proses") }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route("keliling.update", $keliling->id) }}" method="post">
                @csrf
                @method("PUT")

                <p>
                    <label>{{ ucfirst("waktu") }}</label>
                    <input type="text" step="any"  name="{{ "created_at" }}" class="form-control" id="{{ "created_at" }}" value="{{ $keliling->created_at }}" readonly>
                </p>

                @for($i=1; $i<=9; $i++)
                <p>
                    <label>{{ ucfirst("hampa_udara_evap{$i}") }}</label>
                    <input type="number" step="any"  name="{{ "hampa_udara_evap{$i}" }}" class="form-control" id="{{ "hampa_udara_evap{$i}" }}"
                    value="@php $var = "hampa_udara_evap$i"; echo $keliling->$var; @endphp">
                </p>
                @endfor

                @for($i=1; $i<=18; $i++)
                <p>
                    <label>{{ ucfirst("hampa_udara_pan_masakan{$i}") }}</label>
                    <input type="number" step="any"  name="{{ "hampa_udara_pan_masakan{$i}" }}" class="form-control" id="{{ "hampa_udara_pan_masakan{$i}" }}"
                    value="@php $var = "hampa_udara_pan_masakan$i"; echo $keliling->$var; @endphp">
                </p>
                @endfor

                <p>
                    <label>{{ ucfirst("pompa_vakum_evap") }}</label>
                    <input type="number" step="any"  name="{{ "pompa_vakum_evap" }}" class="form-control" id="{{ "pompa_vakum_evap" }}" value="{{ $keliling->pompa_vakum_evap }}">
                </p>

                <p>
                    <label>{{ ucfirst("pompa_vakum_masakan") }}</label>
                    <input type="number" step="any"  name="{{ "pompa_vakum_masakan" }}" class="form-control" id="{{ "pompa_vakum_masakan" }}" value="{{ $keliling->pompa_vakum_masakan }}">
                </p>

                @for($i=1; $i<=3; $i++)
                <p>
                    <label>{{ ucfirst("suhu_pemanas{$i}") }}</label>
                    <input type="number" step="any"  name="{{ "suhu_pemanas{$i}" }}" class="form-control" id="{{ "suhu_pemanas{$i}" }}"
                    value="@php $var = "suhu_pemanas$i"; echo $keliling->$var; @endphp">
                </p>
                @endfor

                <p>
                    <label>{{ ucfirst("suhu_ne_stc") }}</label>
                    <input type="number" step="any"  name="{{ "suhu_ne_stc" }}" class="form-control" id="{{ "suhu_ne_stc" }}" value="{{ $keliling->suhu_ne_stc }}">
                </p>

                <p>
                    <label>{{ ucfirst("suhu_air_terjun") }}</label>
                    <input type="number" step="any"  name="{{ "suhu_air_terjun" }}" class="form-control" id="{{ "suhu_air_terjun" }}" value="{{ $keliling->suhu_air_terjun }}">
                </p>

                <p>
                    <label>{{ ucfirst("suhu_air_injeksi") }}</label>
                    <input type="number" step="any"  name="{{ "suhu_air_injeksi" }}" class="form-control" id="{{ "suhu_air_injeksi" }}" value="{{ $keliling->suhu_air_injeksi }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_clear_liquor") }}</label>
                    <input type="number" step="any"  name="{{ "volume_clear_liquor" }}" class="form-control" id="{{ "volume_clear_liquor" }}" value="{{ $keliling->volume_clear_liquor }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_nk_sebelum_sulfitasi") }}</label>
                    <input type="number" step="any"  name="{{ "volume_nk_sebelum_sulfitasi" }}" class="form-control" id="{{ "volume_nk_sebelum_sulfitasi" }}" value="{{ $keliling->volume_nk_sebelum_sulfitasi }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_nk_setelah_sulfitasi_atas") }}</label>
                    <input type="number" step="any"  name="{{ "volume_nk_setelah_sulfitasi_atas" }}" class="form-control" id="{{ "volume_nk_setelah_sulfitasi_atas" }}" value="{{ $keliling->volume_nk_setelah_sulfitasi_atas }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_nk_setelah_sulfitasi_bawah") }}</label>
                    <input type="number" step="any"  name="{{ "volume_nk_setelah_sulfitasi_bawah" }}" class="form-control" id="{{ "volume_nk_setelah_sulfitasi_bawah" }}" value="{{ $keliling->volume_nk_setelah_sulfitasi_bawah }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_r1_mol_atas") }}</label>
                    <input type="number" step="any"  name="{{ "volume_r1_mol_atas" }}" class="form-control" id="{{ "volume_r1_mol_atas" }}" value="{{ $keliling->volume_r1_mol_atas }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_r1_mol_bawah") }}</label>
                    <input type="number" step="any"  name="{{ "volume_r1_mol_bawah" }}" class="form-control" id="{{ "volume_r1_mol_bawah" }}" value="{{ $keliling->volume_r1_mol_bawah }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_r2_mol_atas") }}</label>
                    <input type="number" step="any"  name="{{ "volume_r2_mol_atas" }}" class="form-control" id="{{ "volume_r2_mol_atas" }}" value="{{ $keliling->volume_r2_mol_atas }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_r2_mol_bawah") }}</label>
                    <input type="number" step="any"  name="{{ "volume_r2_mol_bawah" }}" class="form-control" id="{{ "volume_r2_mol_bawah" }}" value="{{ $keliling->volume_r2_mol_bawah }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_stroop_a_atas") }}</label>
                    <input type="number" step="any"  name="{{ "volume_stroop_a_atas" }}" class="form-control" id="{{ "volume_stroop_a_atas" }}" value="{{ $keliling->volume_stroop_a_atas }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_stroop_a_bawah") }}</label>
                    <input type="number" step="any"  name="{{ "volume_stroop_a_bawah" }}" class="form-control" id="{{ "volume_stroop_a_bawah" }}" value="{{ $keliling->volume_stroop_a_bawah }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_stroop_c_atas") }}</label>
                    <input type="number" step="any"  name="{{ "volume_stroop_c_atas" }}" class="form-control" id="{{ "volume_stroop_c_atas" }}" value="{{ $keliling->volume_stroop_c_atas }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_stroop_c_bawah") }}</label>
                    <input type="number" step="any"  name="{{ "volume_stroop_c_bawah" }}" class="form-control" id="{{ "volume_stroop_c_bawah" }}" value="{{ $keliling->volume_stroop_c_atas }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_klare_d_atas") }}</label>
                    <input type="number" step="any"  name="{{ "volume_klare_d_atas" }}" class="form-control" id="{{ "volume_klare_d_atas" }}" value="{{ $keliling->volume_klare_d_atas }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_klare_d_bawah") }}</label>
                    <input type="number" step="any"  name="{{ "volume_klare_d_bawah" }}" class="form-control" id="{{ "volume_klare_d_bawah" }}" value="{{ $keliling->volume_klare_d_bawah }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_einwuurf_c") }}</label>
                    <input type="number" step="any"  name="{{ "volume_einwuurf_c" }}" class="form-control" id="{{ "volume_einwuurf_c" }}" value="{{ $keliling->volume_einwuurf_c }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_einwuurf_d") }}</label>
                    <input type="number" step="any"  name="{{ "volume_einwuurf_d" }}" class="form-control" id="{{ "volume_einwuurf_d" }}" value="{{ $keliling->volume_einwuurf_d }}">
                </p>

                @for($i=1; $i<=11; $i++)
                <p>
                    <label>{{ ucfirst("volume_palung{$i}") }}</label>
                    <input type="number" step="any"  name="{{ "volume_palung{$i}" }}" class="form-control" id="{{ "volume_palung{$i}" }}"
                    value="@php $var = "volume_palung$i"; echo $keliling->$var; @endphp">
                </p>
                @endfor

                <p>
                    <label>{{ ucfirst("volume_cvp_c") }}</label>
                    <input type="number" step="any"  name="{{ "volume_cvp_c" }}" class="form-control" id="{{ "volume_cvp_c" }}"  value="{{ $keliling->volume_cvp_c }}">
                </p>

                <p>
                    <label>{{ ucfirst("volume_cvp_d") }}</label>
                    <input type="number" step="any"  name="{{ "volume_cvp_d" }}" class="form-control" id="{{ "volume_cvp_d" }}"  value="{{ $keliling->volume_cvp_d }}">
                </p>

                <p>
                    <label>{{ ucfirst("tekanan_uap_tinggi") }}</label>
                    <input type="number" step="any"  name="{{ "tekanan_uap_tinggi" }}" class="form-control" id="{{ "tekanan_uap_tinggi" }}" value="{{ $keliling->tekanan_uap_tinggi }}">
                </p>

                <p>
                    <label>{{ ucfirst("tekanan_uap_rendah") }}</label>
                    <input type="number" step="any"  name="{{ "tekanan_uap_rendah" }}" class="form-control" id="{{ "tekanan_uap_rendah" }}" value="{{ $keliling->tekanan_uap_rendah }}">
                </p>

                <p>
                    <label>{{ ucfirst("tekanan_uap_bekas") }}</label>
                    <input type="number" step="any"  name="{{ "tekanan_uap_bekas" }}" class="form-control" id="{{ "tekanan_uap_bekas" }}" value="{{ $keliling->tekanan_uap_bekas }}">
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

