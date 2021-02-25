<?php
/*
 * Fábián Gábor
 * CXNU8T
 * https://github.com/FabianGabor/Internet-eszkozok-2
 */

/*
 * $ valtozo
 * $tomb = array();
 * $tomb = array(1,2,3);
 * $tomb[] = 'alma';
 * $tomb[5] = 'szilva';
 * $tomb = array('elso_index' => 'ertek', 'masodik_index' => 'ertek'); // asszociativ
 *
 * Szuperglobalis tombok:
 * $_POST, $_GET, $_SESSION, $_SERVER, $_COOKIE
 */
print_r(hash_algos());
$hiba = null;
if (isset($_POST['vezeteknev'])) {
    if (
        !empty($_POST['email']) &&
        !empty($_POST['jelszo']) &&
        !empty($_POST['jelszo_ujra']) &&
        isset($_POST['gdpr'])
    ) {
        var_dump($_POST);

        foreach ($_POST as $index=>$val) {
            if ($index == "jelszo" || $index == "jelszo_ujra")
                $val = hash('sha3-512', $val);
            file_put_contents('post.txt', $index . ":" . $val . "\n", FILE_APPEND);
        }
    }
    else {
        $hiba = "Kotelezo mezok!";
        echo $hiba;
    }
}

if (filesize('post.txt') > 0) {
    $file = file_get_contents('post.txt');
    echo $file;
}
?>

<form action="" method="post">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">

            <div class="medium-6 cell">
                <label for="Vezetéknév">Vezetéknév
                    <input type="text" name="vezeteknev" placeholder="Vezetéknév">
                </label>
            </div>

            <div class="medium-6 cell">
                <label>Keresztnév
                    <input type="text" name="keresztnev" placeholder="Keresztnév">
                </label>
            </div>

            <div class="medium-6 cell">
                <label>Születési idő
                    <input type="date" value="" name="szuletes" placeholder="Születési idő">
                </label>
            </div>

            <div class="medium-6 cell">
                <label>E-mail cím
                    <input required type="email" name="email" placeholder="E-mail cím">
                </label>
            </div>

            <div class="medium-6 cell">
                <label>Jelszó
                    <input required type="password" name="jelszo" placeholder="Jelszó">
                </label>
            </div>

            <div class="medium-6 cell">
                <label>Jelszó újra
                    <input required type="password" name="jelszo_ujra" placeholder="Jelszó újra">
                </label>
            </div>

            <div class="medium-6 cell">
                <fieldset class="large-12 cell">
                    <legend>Neme</legend>
                    <input type="radio" name="nem" value="ferfi" id="nemFerfi"><label for="nemFerfi">Férfi</label>
                    <input type="radio" name="nem" value="no" id="nemNo"><label for="nemNo">Nő</label>
                </fieldset>
            </div>

            <div class="medium-12 cell">
                <label>Rövid leírás
                    <textarea name="leiras" placeholder="Rövid leírás"></textarea>
                </label>
            </div>

            <div class="medium-12 cell">
                <label>
                    <input required type="checkbox" name="gdpr" placeholder="GDPR nyilatkozatot elolvastam, elfogadom">
                    GDPR nyilatkozatot elolvastam, elfogadom
                </label>
            </div>

            <div class="medium-12 cell">
                <button type="submit" class="success button" value="Elküld">Elküld</button>
            </div>

        </div>
    </div>
</form>