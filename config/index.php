<?php
require_once "../config/define.php";
echo DIR_ROOT;
require_once DIR_ROOT."/classes/Criptografia.php";

$cript = new Criptografia();

$arr = [
    'host' => $cript->encrypt('localhost'),
    'dbname' => $cript->encrypt('db_teste'),
    'user' => $cript->encrypt('root'),
    'password' => $cript->encrypt('root'),
]; 

echo "<pre>";

print_r($arr);
