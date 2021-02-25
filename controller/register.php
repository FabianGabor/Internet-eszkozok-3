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
        //header("Location: index.php");
        print $msg;
        return false;
    }
}

if ($_POST['jelszo'] != $_POST['jelszo_ujra']) {
    $msg = "Jelszavak nem egyeznek";
    print $msg;
    return false;
}

// XSS SQL
foreach ($_POST as $key => $value) {
    $$key = htmlspecialchars($dbcon->real_escape_string($value));
}
$jelszo = hash('sha3-512', $jelszo);

$table = "felhasznalok";
$cols = "vezeteknev, keresztnev, szuletes, email, jelszo, nem, leiras";
$vals = "'$vezeteknev','$keresztnev', '$szuletes', '$email', '$jelszo', '$nem', '$leiras'";
$sql = "INSERT INTO $table ($cols) VALUES ($vals)";

/*
$sql = "INSERT INTO felhasznalok (vezeteknev, keresztnev, email, jelszo) VALUES ('{$vezeteknev}', '{$keresztnev}', '{$email}', '{$jelszo}')";
*/

if ($dbcon->query($sql)) {
    print "Sikeres mentés adatbázisba!" . "<br>";
} else {
    var_dump($dbcon->error_list);
}