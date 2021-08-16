<?php

require_once "../config/define.php";
require_once DIR_ROOT."/Classes/Crud.php";
require_once DIR_ROOT."/Classes/User.php";

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        session_destroy();
        header('Location: ../views/login.php');
        break;
    case 'POST':

        if (isset($_POST['senha_again'])) { //para criação de usuario
            # code...
        }elseif (isset($_POST['email_recuperacao'])) { //para alteração de senha
            # code...
        }else{ //para logar
             $user = User::login(strtolower($_POST[COLLOGIN]),$_POST['senha']);
            
            if (is_string($user)) {
                $_SESSION['erro'] = $user;
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }else{
                header("Location: ../views/financeiro.php");
            } 
        }

        break;
}

?>