<?php
require_once "../config/define.php";
$title = 'Login';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo PAGETITLE . ' ' . (isset($title) ? "| $title" : null); ?></title>

    <link rel="shortcut icon" href="../favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/plugins/adminlte/css/adminlte.min.css">
</head>

<body class="hold-transition login-page dark-mode">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>App</b>Financeiro</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Esqueceu sua senha? Enviaremos um email com link para alterar a senha</p>

                <form action="../app/login.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="email" name="email_recuperacao">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Requisitar nova senha</button>
                        </div>
                        <div class="col-12 mt-3">
                            <p class="mb-0">
                                <a href="login.php">Login</a>
                            </p>
                            <p class="mb-0">
                                <a href="login-register.php" class="text-center">Registrar novo usuário</a>
                            </p>
                        </div>
                    </div>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/plugins/adminlte/js/adminlte.min.js"></script>
</body>

</html>