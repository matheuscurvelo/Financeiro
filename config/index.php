<?php
require_once "../config/define.php";
echo DIR_ROOT;
require_once DIR_ROOT."/classes/Criptografia.php";

$cript = new Criptografia();

$arr = [
    'host' => $cript->encrypt('x'),
    'dbname' => $cript->encrypt('x'),
    'user' => $cript->encrypt('x'),
    'password' => $cript->encrypt('x'),
]; 

echo "<pre>";

print_r($arr);
