<?php

if (isset($_POST['vezeteknev'])) {
    if (
        empty($_POST['email'])          ||
        empty($_POST['jelszo'])         ||
        empty($_POST['jelszo_ujra'])    ||
        empty($_POST['gdpr'])

    ) {
        $msg = 'Nincsenek kitöltve a kötelező mezők';
        return false;
    }
}

if ($_POST['jelszo'] != $_POST['jelszo_ujra']) {
    $msg = "Jelszavak nem egyeznek";
    return false;
}