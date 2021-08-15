<?php
require_once "../config/define.php";
$title = 'Registrar';
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
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Cadastrando novo usuário</p>

                <form action="../app/novo_usuario.php" method="post">
                    <div class="form-group mb-3">
                        <select class="form-control" placeholder="Selecione " name="" id=""></select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="<?php echo (COLLOGIN == 'email') ? 'email' : 'text';?>" class="form-control" placeholder="<?php echo COLLOGIN;?>" name="<?php echo COLLOGIN;?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="senha" name="senha" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="redigitar senha" name="senha_again" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 bg-danger p-1 rounded">
                        <input type="password" class="form-control" placeholder="senha do administrador" name="senha_adm" required>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="login.php" class="text-center">Já sou usuário</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/plugins/adminlte/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[type="email"]').attr('disabled', true);    
        });
    </script>
</body>

</html>