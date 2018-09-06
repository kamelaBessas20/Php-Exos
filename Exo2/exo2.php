#!C:\xampp\php\php.exe
<?php

print "Donnez le nom d'une extension: \n";
$val = trim(fgets(STDIN));
var_dump(ini_get_all($val, in_array('-v', $argv)));