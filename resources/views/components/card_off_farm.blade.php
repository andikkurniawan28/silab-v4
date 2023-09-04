<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-{{ $color }} shadow h-100 py-2 bg-white">
        <div class="card-body bg-white">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                        {{ $title }}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <tr>
                                <th>Material</th>
                                <th>Average</th>
                                <th>Value</th>
                                <th>Jumlah</th>
                            </tr>
                            <tr>
                                <td>NPP</td>
                                <td>Rendemen</td>
                                <td>{{ number_format($rendemen_npp, 2) }}</td>
                                <td>{{ $jumlah_npp }}</td>
                            </tr>
                            <tr>
                                <td>Ampas</td>
                                <td>Pol</td>
                                <td>{{ number_format($pol_ampas, 2) }}</td>
                                <td>{{ $jumlah_ampas }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
