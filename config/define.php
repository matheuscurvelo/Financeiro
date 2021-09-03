<?php
   session_start();
   date_default_timezone_set('America/Sao_Paulo');
   //$getError = [];
   //$getSuccess = [];

   //nessa constante aqui voce define a pasta raiz. Varia da forma de como voce esta apontando seu projeto
   define('DIR_ROOT',$_SERVER['DOCUMENT_ROOT'].'/financeiro');

   //aqui voce coloca as chaves criptograficas
   define('KEY', 'mmcs');
   define('KEY_IV', 'mmcs_iv');

   define('PAGETITLE','App Financeiro');//TÍTULO DAS PÁGINAS

   //Painel de Controle
   //define('LOGINUSER','adm');//NOME DE USUÁRIO
   //define('LOGINPWD','95c4cbb27bfb80479196e210df831836'); //SENHA DO USUÁRIO HASH em MD5: OcPI7%r0-tne

   //SQL   
   define('SQLDRIVER', 'mysql'); //DRIVER DB
   define('SQLSERVIDOR', 'cng5VTJDZVdCSTd4ZWQ0NTNwWlozQT09');//SERVIDOR
   define('SQLINSTANCIA','SQLEXPRESS');//INSTANCIA
   define('SQLPORTA','1433');//PORTA
   define('SQLDB','NEcvYUVKRTJMb1pvSUpHZ3FNcHArUT09');//BANCO DE DADOS
   define('SQLUSER','djZkOXloUkVSTitpRk5zVkxKV1NEQT09');//USUARIO
   define('SQLPWD','djZkOXloUkVSTitpRk5zVkxKV1NEQT09');//SENHA

   //info login
   define('TBLLOGIN','tb_users');//tabela de login
   define('COLLOGIN','login');//coluna de login, pode ser um email tambem
   define('PWDCRYPT', FALSE); //SENHA CRIPTOGRAFADA: TRUE OU FALSE
   
   
   //PHPMailer
   define('EMAILASSUNTO','xxxxxxxxxxxxxx');//ASSUNTO DO EMAIL
   define('EMAILREMETENTE','');//EMAIL DO REMETENTE
   define('EMAILREMETENTENOME','');//NOME DO REMETENTE
   define('EMAILHOSTSMTP','');//HOST SMTP
   define('EMAILPORTASMTP',587);//PORTA SMTP
   define('EMAILUSUARIO','xxxxxxxxxxxxr');//USUÁRIO SMTP
   define('EMAILSENHA','xxxxx');//SENHA SMTP

    
?>