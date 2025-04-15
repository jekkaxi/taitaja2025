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
        <div class="game">
            <div class="gamevas">
                <h2>
                    Aloite peli
                </h2>
                <form action="startgame.php" method="post">
                <label for="opettaja">Opettaja</label><br>
                <select name="opettaja" id="opettaja">
                    <?php
                    
                    $sql = "SELECT * FROM teachers";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['username'] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>
                </select><br><br>

                <label for="kategoria">Kategoria</label><br>
                <select name="kategoria" id="kategoria">
                    <?php
                    
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>
                </select><br><br>

                <label for="kysymykset">Valitse kysymysten määrä</label><br><br>

                <input type="radio" name="kysymykset" id="kysymykset1" value="6">
                <label for="lyhyt">Lyhyt (5)</label><br>

                <input type="radio" name="kysymykset" id="kysymykset2" value="11" checked="checked">
                <label for="lyhyt">Keskipitkä (10)</label><br>

                <input type="radio" name="kysymykset" id="kysymykset3" value="16">
                <label for="lyhyt">Pitkä (15)</label><br><br>
                <input type="hidden" name="kysymysnr" value=1>

                <a href="startgame.php"><button>Aloita peli</button></a>
                </form>
            </div>
            <div class="gameoik">
                <img src="kuvat/game.png" alt="Pelikuva">
            </div>
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