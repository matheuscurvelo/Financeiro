<?php

require_once "../classes/Criptografia.php";

$cript = new Criptografia();

$arr = [
    'host' => $cript->encrypt('localhost'),
    'dbname' => $cript->encrypt('db_teste'),
    'charset' => $cript->encrypt('utf8'),
    'user' => $cript->encrypt('root'),
    'password' => $cript->encrypt('root'),
]; 

echo "<pre>";
print_r($arr);
