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
                <a href="login.html">Kirjaudu sisään</a>
        </header>

        <?php
        //tulostaa PHP:lla mitä käyttäjä on valinuut viime sivulla
        //echo $_POST['opettaja']; echo "<br>";
        //echo $_POST['kategoria']; echo "<br>";
        //echo $_POST['kysymykset'];
        ?>
        <div class="keskita">
            <?php
            $kysymysnr = $_POST['kysymysnr'];
            ?>
            <p>
                kysymys <?php echo $kysymysnr;?>/10
            </p>
            <p>
                pisteet: 3
            </p>

            <h1>Mitä CSS tekee verkkosivulla?</h1>
            <table>
                <tr>
                    <td><input type="radio" name="vaihtoehto1" id="vastaus1"></td>
                    <td><p>Määrittää ulkoasun</p></td>

                    <td><input type="radio" name="vaihtoehto2" id="vastaus2"></td>
                    <td><p>Tallentaa tietoja</p></td>
                </tr>
                <tr>
                    <td><input type="radio" name="vaihtoehto3" id="vastaus3"></td>
                    <td><p>Lisää toiminnallisuutta</p></td>

                    <td><input type="radio" name="vaihtoehto4" id="vastaus4"></td>
                    <td><p>Hoitaa tietoturvaa</p></td>
                </tr><br><br>
            </table>
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