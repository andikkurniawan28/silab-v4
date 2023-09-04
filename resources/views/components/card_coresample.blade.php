<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-{{ $color }} shadow h-100 py-2 bg-danger">
        <div class="card-body bg-danger">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        {{ $title }}
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">
                        {{ number_format($data, 2) }}<sub>(%R)</sub>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">
                        {{ $rit }} Rit
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-percent fa-2x text-warning"></i>
                </div>
            </div>
        </div>
    </div>
</div>
