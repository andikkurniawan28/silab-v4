<div class="col-xl-3 col-lg-3 col-md-12 card-sm-12 mb-4">
    <div class="card border-left-{{ $color }} shadow h-100 py-2 bg-gradient-dark">
        <div class="card-body bg-gradient-dark">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-md font-weight-bold text-white text-uppercase mb-1">
                        {{ $title }}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-dark">
                            <tr>
                                <th>Ploeg</th>
                                <th>Rerata</th>
                                <th>Jumlah</th>
                            </tr>
                            <tr>
                                <td>Pagi</td>
                                @if($rendemen["pagi"]["rendemen"] === NULL)
                                    <td>-</td>
                                @else
                                    <td>{{ number_format($rendemen["pagi"]["rendemen"], 2) }}</td>
                                @endif
                                @if($rendemen["pagi"]["jumlah"] === 0)
                                    <td>-</td>
                                @else
                                    <td>{{ $rendemen["pagi"]["jumlah"] }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Sore</td>
                                @if($rendemen["sore"]["rendemen"] === NULL)
                                    <td>-</td>
                                @else
                                    <td>{{ number_format($rendemen["sore"]["rendemen"], 2) }}</td>
                                @endif
                                @if($rendemen["sore"]["jumlah"] === 0)
                                    <td>-</td>
                                @else
                                    <td>{{ $rendemen["sore"]["jumlah"] }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Malam</td>
                                @if($rendemen["malam"]["rendemen"] === NULL)
                                    <td>-</td>
                                @else
                                    <td>{{ number_format($rendemen["malam"]["rendemen"], 2) }}</td>
                                @endif
                                @if($rendemen["malam"]["jumlah"] === 0)
                                    <td>-</td>
                                @else
                                    <td>{{ $rendemen["malam"]["jumlah"] }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>{{ ucfirst("harian") }}</td>
                                @if($rendemen["harian"]["rendemen"] === NULL)
                                    <td>-</td>
                                @else
                                    <td>{{ number_format($rendemen["harian"]["rendemen"], 2) }}</td>
                                @endif
                                @if($rendemen["harian"]["jumlah"] === 0)
                                    <td>-</td>
                                @else
                                    <td>{{ $rendemen["harian"]["jumlah"] }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
