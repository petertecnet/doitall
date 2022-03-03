<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Doitall | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page bg-dafult">
<div class="login-box" style="width:50%">
  
  <!-- /.login-logo -->
  <div class="card" >
    <div class="card-body login-card-body" style="background-image: url(/img/background3.png) ;   background-repeat: no-repeat;">
    <div class="login-logo">
  <a href="/" class="brand-link">
      <img src="/img/logo.png" alt="Doitall Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Doitall</span>
    </a>
  </div> 
                        <p class="login-box-msg">Digite seu email e senha.</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="form-group row">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('cpf') is-invalid @enderror"
                                        name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirme a senha') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group float-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Finalizar cadastro') }}
                                    </button>
                                    <a type="link" href="/login" class="btn btn-secondary">
                                        {{ __('Já tenho cadastro') }}
                                    </a>

                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.login-card-body -->
            
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <script>
    function responsavel(val) {
        var role = val.value
        if (role == 0) {
            
            document.getElementById("responsavelFinanceirodiv").style.display = "block";
            document.getElementById("responsavelFinanceiro").required = true;
            document.getElementById("responsavelFinanceiro").removeAttribute("disabled");
        } else {
            
            document.getElementById("responsavelFinanceirodiv").style.display = "none";
            document.getElementById("responsavelFinanceiro").removeAttribute("required");
            document.getElementById("responsavelFinanceiro").disabled = true;
        }
    };
    </script>
    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>

</body>

</html>