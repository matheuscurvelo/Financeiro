<?php
require_once '../config/define.php';
require_once DIR_ROOT."/classes/Criptografia.php";

$cript = new Criptografia();

$arr = [
    'host' => $cript->encrypt('192.168.1.99'),
    'dbname' => $cript->encrypt('test'),
    'charset' => $cript->encrypt('utf8'),
    'user' => $cript->encrypt('root'),
    'password' => $cript->encrypt('#banco#001'),
]; 

echo "<pre>";
print_r($arr);
