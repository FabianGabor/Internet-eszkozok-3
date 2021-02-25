<?php
require_once('../config/db.php');

if (isset($_POST['vezeteknev'])) {
    if (
        empty($_POST['email'])          ||
        empty($_POST['jelszo'])         ||
        empty($_POST['jelszo_ujra'])    ||
        !isset($_POST['gdpr'])
    ) {
        $msg = 'Nincsenek kitöltve a kötelező mezők';
        return false;
    }
}

if ($_POST['jelszo'] != $_POST['jelszo_ujra']) {
    $msg = "Jelszavak nem egyeznek";
    return false;
}

print "<br> register.php Ping:" . $dbcon->ping() . '<br>';

// XSS SQL
foreach ($_POST as $key => $value) {
    $$key = htmlspecialchars($dbcon->real_escape_string($value));
}

/*
$table = "felhasznalok";
$cols = "vezeteknev, keresztnev, email, jelszo";
$vals = "'{$vezeteknev}','{$keresztnev}','{$email}', '{$jelszo}'";
//$sql = 'INSERT INTO . $table . (. $cols .) . " VALUES ("{$vezeteknev}", "{$keresztnev}", "{$email}", "{$jelszo}")";
$sql = "INSERT INTO '$table.$cols'";
print "<br>";
print $sql;

//$mysqli->query($sql);
*/

$sql = "INSERT INTO felhasznalok (vezeteknev, keresztnev, email, jelszo) VALUES ('{$vezeteknev}', '{$keresztnev}', '{$email}', '{$jelszo}')";

if ($dbcon->query($sql)) {
    print "Sikeres!";
}
print $dbcon->error;