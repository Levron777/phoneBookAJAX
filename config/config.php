<?php
$title = "PhoneBook";

define('SERVER', "localhost");
define('USER', "z99945qo_3003");
define('PASSWORD', "123Qwe");
define('DATABASE', "z99945qo_3003");
define('CHARSET', "utf8");

$dsn = 'mysql:host=' . SERVER . ';dbname=' . DATABASE . ';charset=' . CHARSET;
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
