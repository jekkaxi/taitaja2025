<?php
include "connect.php";
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Taitaja TietoTesti</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
                <h1>
                    TAITAJA TIETOTESTI
                </h1>
                <a href="#">Kirjaudu sisään</a>
        </header>

        <?php
        //tulostaa PHP:lla mitä käyttäjä on valinuut viime sivulla
        echo $_POST['opettaja']; echo "<br>";
        echo $_POST['kategoria']; echo "<br>";
        echo $_POST['kysymykset'];
        ?>
        <div class="keskita">
            <p>
                kysymys 1/10
            </p>
            <p>
                pisteet: 3
            </p>

            <h1>Mitä CSS tekee verkkosivulla?</h1>

            <div class="vieressa">
                <input type="radio" name="vastaus" id="vastaus1" value="Lyhyt">
                <label for="lyhyt">Määrittää ulkoasun</label>

                <input type="radio" name="vastaus" id="vastaus2" value="Keskipitkä">
                <label for="lyhyt">Tallentaa tietoja</label>
            </div>
            <div class="vieressa">
                <input type="radio" name="vastaus" id="vastaus3" value="Keskipitkä">
                <label for="lyhyt">Lisää toiminnallisuutta</label>

                <input type="radio" name="vastaus" id="vastaus4" value="Pitkä">
                <label for="lyhyt">Hoitaa tietoturvaa</label>
            </div><br><br>
            <a href="#"><button>Vastaa</button></a><br><br>
        </div>
        <footer>
            <h2>
                Taitaja2025 -semifinaali
            </h2>
            <p>
                Jessica Kautto | Keski-Pohjanmaan ammattiopisto
            </p>
        </footer>
    </body>
</html>