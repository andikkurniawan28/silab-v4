<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>

	<link rel="icon" type="image/png" href="/admin_template/img/QC.png"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/admin_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body id="page-top">

    @for($i=0; $i<3; $i++)
        <table class="text-dark text-left table table-bordered">
            <tr>
                <th><h1>ID</h1></th>
                <th><h1>{{ $data->id }}</h1></th>
            </tr>
            <tr>
                <td><h1>Barcode</h1></td>
                <td>
                    <div class="mb-3">{!! DNS1D::getBarcodeHTML(strval($data->id), 'C128', 5, 150) !!}</div>
                </td>
            </tr>
            <tr>
                <td><h1>Material</h1></td>
                <td><h1>{{ $data->material->name }}</h1></td>
            </tr>
            <tr>
                <td><h1>Timestamp</h1></td>
                <td><h1>{{ $data->created_at }}</h1></td>
            </tr>
        </table>
        <br>
    @endfor

</body>

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
