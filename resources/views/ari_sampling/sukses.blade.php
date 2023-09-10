<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="refresh" content="3;URL='{{ route("on_farm.ari_sampling", $timbang_id) }}'">
<head>
    @include('layouts.head')
</head>

<body class="bg-light-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 bg-success">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <br><br>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 text-white mb-4">Sukses</h1>
                                        <h1 class="h1 text-white mb-4">{{ $message }}</h1>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.script')
</body>
</html>
