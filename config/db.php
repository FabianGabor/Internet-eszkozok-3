<?php
$host = 'localhost';
$db = 'internet_eszkozok';
$user = 'internet_eszkozok';
$password = 'uh0Rg2mVdzeZ6aIz!';

$dbcon = new mysqli($host, $user, $password, $db);

if ($dbcon->connect_error) {
    die ('Sikertelen adatbázis kapcsolódás') . $dbcon->connect_error;
}