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
        <div class="game">
            <div class="gamevas">
                <h2>
                    Aloite peli
                </h2>
                <label for="opettaja">Opettaja</label><br>
                <select name="opettaja" id="opettaja">
                    <option name="#" id="">Olevi Opettaja</option>
                    <option name="#" id=""></option>
                    <option name="#" id=""></option>
                </select><br><br>

                <label for="kategoria">Kategoria</label><br>
                <select name="kategoria" id="kategoria">
                    <option name="#" id="">Tietokoneet ja ohjelmointi</option>
                    <option name="#" id=""></option>
                    <option name="#" id=""></option>
                </select><br><br>

                <label for="kysymykset">Valitse kysymysten määrä</label><br>

                <input type="radio" name="kysymykset" id="kysymykset1">
                <label for="lyhyt">Lyhyt (5)</label><br>

                <input type="radio" name="kysymykset" id="kysymykset2">
                <label for="lyhyt">Keskipitkä (10)</label><br>

                <input type="radio" name="kysymykset" id="kysymykset3">
                <label for="lyhyt">Pitkä (15)</label><br><br>

                <button>Aloita peli</button>
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