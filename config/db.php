<?php
$host = 'localhost';
$db = 'internet_eszkozok';
$user = 'internet_eszkozok';
$password = 'uh0Rg2mVdzeZ6aIz!';

$dbcon = new mysqli($host, $user, $password, $db);

if ($dbcon->connect_error) {
    print 'Sikertelen adatbázis kapcsolódás';
    die ('Sikertelen adatbázis kapcsolódás') . $dbcon->connect_error;
} else {
    print 'Sikeres adatbázis kapcsolódás. Ping: ' . $dbcon->ping();
}