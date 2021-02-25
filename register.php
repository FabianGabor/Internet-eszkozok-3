<?php
/*
 * Fábián Gábor
 * CXNU8T
 * https://github.com/FabianGabor/Internet-eszkozok-2
 */
?>

<form action="controller/register.php" method="post">
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
                    <input type="radio" name="nem" value="férfi" id="nemFerfi"><label for="nemFerfi">Férfi</label>
                    <input type="radio" name="nem" value="nő" id="nemNo"><label for="nemNo">Nő</label>
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