@extends("layouts.app")

@section("content")
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="m-0 font-weight-bold text-primary">{{ ucfirst("dashboard") }}</h4>
    </div>
    @include("layouts.alert")
    <div class="row">

        @include("components.card_on_farm",[
            "color" => "primary",
            "title" => "Posbrix",
            "data" => $data["onfarm"]["posbrix"],
        ])

        @include("components.card_on_farm",[
            "color" => "secondary",
            "title" => "ARI Core Sample",
            "data" => $data["onfarm"]["core"],
        ])

        @include("components.card_on_farm",[
            "color" => "success",
            "title" => "ARI Gilingan Mini",
            "data" => $data["onfarm"]["ari"],
        ])

        @include("components.card_rendemen_npp",[
            "color" => "danger",
            "title" => "Rendemen NPP",
            "rendemen" => $data["offfarm"]["npp"],
        ])

        @include("components.card_timbangan",[
            "color" => "info",
            "title" => "RS Diolah",
            "data" => $data["offfarm"]["rs_in"],
        ])

        @include("components.card_timbangan",[
            "color" => "warning",
            "title" => "RS Output",
            "data" => $data["offfarm"]["rs_out"],
        ])

        @include("components.card_timbangan",[
            "color" => "dark",
            "title" => "Produksi Tetes",
            "data" => $data["offfarm"]["tetes"],
        ])

    </div>
</div>
@endsection
