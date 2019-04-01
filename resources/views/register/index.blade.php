
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>注册</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://v3.bootcss.com/examples/signin/signin.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div style="position: fixed;
    background-size: cover;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;background-image: url(img/bgm.jpg);z-index: -1; "></div>
<div class="container">
    <form class="form-signin" method="POST" action="/register">
        {{ csrf_field() }}
        <h2 class="form-signin-heading" style="color: #fff;margin-left: 29%;">Register</h2>
        <label for="name" class="sr-only" >名字</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="名字" style="margin-bottom: 10px;" required autofocus>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="email" name="email" value="{{ old('email') }}" id="inputEmail" class="form-control" style="margin-bottom: 10px;" placeholder="邮箱" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" value="{{ old('password') }}" id="inputPassword" class="form-control" placeholder="输入密码" required>
        <label class="sr-only">重复密码</label>
        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="重复输入密码" required>
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $value)
            <li>{{ $value }}</li>
            @endforeach
        </div>
        @endif
        <button class="btn btn-lg btn-primary btn-block" style="background-color: #4395FF;border-color: #4395FF;" type="submit">注册</button>
    </form>

</div> <!-- /container -->

</body>
</html>