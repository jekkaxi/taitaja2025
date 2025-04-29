<?php
$category_id = $_POST['category_id'];
$teacher_id = $_POST['teacher_id'];
$number_of_questions = $_POST['number_of_questions']-1;
$score = $_POST['score'];
$username2 = $_POST['username2'];

include "connect.php";

$sql = "INSERT INTO highscores (category_id, teacher_id, number_of_questions, score, username2)
VALUES ('$category_id', '$teacher_id', '$number_of_questions', '$score', '$username2')";

if ($conn->query($sql) === TRUE) {
    //ECHO "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Taitaja TietoTesti</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>TAITAJA TIETOTESTI</h1> <a href="#">Kirjaudu sisään</a>
        </header>
        
        <div class="peli">
            <center>
                <h1>High Scores</h1>
            
            <?php
            $laskuri = 0;
            $sgl1 = "SELECT * FROM highsoces WHERE number_of_questions = 5 ORDER BY score DESC LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row

             echo "<table>";

                while($row = $result->fetch_assoc()) {
                    $laskuri++;
                    echo '<td>' . $laskuri . "</td><td>" . $row['username'] . '</td><td>' $row["score"] . '</td><td>' . 'Lyhyt' . '</td><tr>';

                }

                    echo "</table>";
                    echo "<br><br>"
            } else {
            echo "Ei vielä tuloksia lyhyessä kategoriassa<br><br>"
            }
            ?>

        <?php
            $laskuri = 0;
            $sgl1 = "SELECT * FROM highsoces WHERE number_of_questions = 10 ORDER BY score DESC LIMIT 5";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // output data of each row
        
            echo "<table>";
        
            while($row = $result->fetch_assoc()) {
                $laskuri++;
                echo '<td>' . $laskuri . "</td><td>" . $row['username'] . '</td><td>' $row["score"] . '</td><td>' . 'Lyhyt' . '</td><tr>';
        
            }
        
                echo "</table>";
                echo "<br><br>"
            } else {
                echo "Ei vielä tuloksia keskipitkässä kategoriassa<br><br>"
        }
        ?>

        <?php
            $laskuri = 0;
            $sgl1 = "SELECT * FROM highsoces WHERE number_of_questions = 15 ORDER BY score DESC LIMIT 5";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // output data of each row
        
                echo "<table>";
        
                while($row = $result->fetch_assoc()) {
                    $laskuri++;
                    echo '<td>' . $laskuri . "</td><td>" . $row['username'] . '</td><td>' $row["score"] . '</td><td>' . 'Lyhyt' . '</td><tr>';
        
                }
        
                    echo "</table>";
                    echo "<br><br>"
            } else {
            echo "Ei vielä tuloksia pitkässä kategoriassa<br><br>"
        }
        ?>
        <center>
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