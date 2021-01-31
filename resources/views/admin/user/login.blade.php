<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard HTML Template</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/css/select2.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('css/admin/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/main.css?v=').time() }}" rel="stylesheet">
</head>
<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="index.html"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
            Login Form
        </h4>
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="">Email</label><input class="form-control" placeholder="Enter your Email" name="email" type="email">
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password</label><input class="form-control" placeholder="Enter your password" name="password" type="password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>
            <div class="buttons-w">
                <button class="btn btn-primary" type="submit">Log me in</button>
<!--                <div class="form-check-inline">
                    <label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label>
                </div>-->
            </div>
        </form>
    </div>
</div>
</body>
</html>
