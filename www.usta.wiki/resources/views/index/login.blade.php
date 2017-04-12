<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>登录 - iSchool</title>

    <link rel="icon" href="{{asset('public/favicon.ico')}}" />
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">

    <script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <img src="{{ asset('public/img/logo.png') }}" alt="">

        </div>
        <h3 class="m-t-lg">Welcome to iSchool</h3>

        <form class="m-t" role="form" action="index.html">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
        </form>
        <p class="m-t">
            iSchool &copy; <?php echo date('Y'); ?> . All rights received by jtahstu . 勉强运行<script>document.write(getDay());</script>天 ,
            <script src="http://count.knowsky.com/count1/count.asp?id=84783&sx=1&ys=9" language="JavaScript" charset="gb2312"></script>
            &nbsp;人次访问
        </p>
    </div>
</div>


</body>

</html>
