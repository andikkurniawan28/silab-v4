<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/trangkil/assets/style/login_style.css">
	<link rel="icon" type="image/png" href="/trangkil/assets/img/QC.png"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"/>

    <title>{{ ENV("APP_NAME") }}</title>
</head>
<body>
    <div class="alert alert-warning" role="alert"></div>
    <div class="container">
        <form action="{{ route("register.process") }}" method="POST" class="login-email">
            @csrf
            <input type="hidden" name="is_active" value="1">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">{{ ENV("APP_NAME") }}</p>
            <div class="input-group">
                <input type="text" placeholder="Nama" name="name" value="" required autofocus>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
                <select name="role_id" class="form-control">
                    @foreach ($role as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
        <div class="footer" align="center">
            &copy; Andik Kurniawan
        </div>
    </div>
</body>
</html>
