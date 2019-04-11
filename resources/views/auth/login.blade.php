<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$appName}} | Log In Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('plugins/iCheck/square/blue.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .login-box, .register-box{width: 400px!important;}
    .overlay{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 10;
      background-color: white; /*dim the background*/
    }
    #loading{
      position: absolute;
      font-size: 30px;
      left: 50%;
      top: 50%;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}"><b>{{$appName}}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Admin Login</p>

      @if(session()->has('error'))
        <div class="alert alert-danger">
        {{session()->get('error')}}
        </div>
      @endif

      <form action="{{url('/login')}}" method="post" id="login">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Email">
          <span class="text-danger">{{errors('email')}}</span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <span class="text-danger">{{errors('password')}}</span>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>

    </div>
  </div>
  <?php $email = (isset($_GET['email']))?$_GET['email']:''; ?>
  <?php $password = (isset($_GET['password']))?$_GET['password']:''; ?>
  <?php if ($email && $password) {?>
    <div class="overlay"><div id="loading">LOADING...</div></div>
  <?php }?>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- iCheck -->
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script>
  var email = '{{$email}}';
  var password = '{{$password}}';

  $(function () {
    if(email && password){
      document.body.style.background = "white";
      $("#email").val(email);
      $("#password").val(password);
      $("#login").submit();
    }
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    });

  })
</script>
</body>
</html>
