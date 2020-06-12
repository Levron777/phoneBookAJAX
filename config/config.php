<?php
$title = "PhoneBook";

define('SERVER', "localhost");
define('USER', "root");
define('PASSWORD', "root");
define('DATABASE', "php");
define('CHARSET', "utf8");

$dsn = 'mysql:host=' . SERVER . ';dbname=' . DATABASE . ';charset=' . CHARSET;
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $db = new PDO($dsn, USER, PASSWORD, $opt);
} catch (PDOException $e) {
    die($e->getMessage());
}