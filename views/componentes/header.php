<?php require_once('../config/define.php') ?>
<!DOCTYPE html>

<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo PAGETITLE.' '.($title ? "| $title" : null); ?></title>

  <link rel="shortcut icon" href="../favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/jquery-ui/jquery-ui.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/plugins/adminlte/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed dark-mode">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
          <span class="brand-text font-weight-light">App Financeiro</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="banco.php" class="nav-link">Banco</a>
            </li>
            <li class="nav-item">
              <a href="financeiro.php" class="nav-link">Financeiro</a>
            </li>
          </ul>

        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-users"></i>
            </a>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link bg-light" style="border-radius: 50px;" data-toggle="dropdown" href="#">
              <i class="fas fa-user"></i> <?php echo "Nome";?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="../app/login.php" class="dropdown-item bg-danger">
                <i class="fas fa-power-off mr-2"></i> Logout
              </a>
            </div>
          </li>
          <li class="nav-item d-none">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->