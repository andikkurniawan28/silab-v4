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
                            @php $timeframe = [
                                "pagi",
                                "sore",
                                "malam",
                                "harian",
                            ];
                            @endphp
                            @for($i=0; $i<count($timeframe); $i++)
                            <tr>
                                <td>{{ ucfirst($timeframe[$i]) }}</td>
                                @if($data[$i]["value"] != 0)
                                    <td>{{ number_format($data[$i]["value"],2) }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                @if($data[$i]["rit"] != 0)
                                    <td>{{ $data[$i]["rit"] }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
