<?php
// Yhteys tietokantaan
include "connect.php";
$teacher_id = $_POST['opettaja']; //pitäisi tulostaa valittu opettaja
$category_id = $_POST['kategoria'];
$number_of_questions = $_POST['kysymykset'];
// Hakee kysymykset valitusta kategoriasta  ja opettajalta 
$sql = "SELECT * FROM questions WHERE category_id = $category_id AND teacher_id = $teacher_id ORDER BY RAND() LIMIT $number_of_questions";
$result = $conn->query($sql);

// Kysymykset tallennetaan taulukkoon
$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
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
        <p id="kysymykset">Kysymys <span id="currentQuestion">1</span>/<?php echo $number_of_questions-1;?></p>    
        <p>Pisteet: <span id="score">0</span></p></center>
        
        <div id="otsikko-container" class="otsikko-container"></div>
        <div id="question-container" class="question-container"></div>
        
        <center><button id="next-button" onclick="nextQuestion()">Seuraava kysymys</button></center>
        <center><input hidden type="text" name="highscore" id="highscore" placeholder="Kirjoita nimesi tuloslistaan"></center>
    <br><br>
        <script>
        
            const questions = <?php echo json_encode($questions); ?>;
            let currentQuestion = 1;
            let score = 0;

            function showQuestion(index) {
                const question = questions[index];
                document.getElementById('question-container').innerHTML = `
                    <h1 class="pelih1">${question.question}</h1>
                    <table>
                <tr>
                        <td><input type="radio" name="answer" value="A"></td><td><p> ${question.option_a}</p></td>
                        <td><input type="radio" name="answer" value="B"></td><td><p> ${question.option_b}</p></td>
                        </tr>
                <tr>
                        <td><input type="radio" name="answer" value="C"></td><td><p> ${question.option_c}</p></td>
                        <td><input type="radio" name="answer" value="D"></td><td><p> ${question.option_d}</p></td>
                    </tr>
                    </table><center>
                `;
            }

            
            function nextQuestion() {
                // Tarkista valittu vastaus
                const selectedAnswer = document.querySelector('input[name="answer"]:checked');
                if (selectedAnswer) {
                    const correctAnswer = questions[currentQuestion].correct_option;
                    console.log("Odotettu vastaus:", questions[currentQuestion].correct_answer);
                    console.log("Valittu vastaus:", selectedAnswer.value);
                    if (selectedAnswer.value === correctAnswer) {
                        score++;
                        document.getElementById('score').textContent = score;
                    }
                }

                // Siirry seuraavaan kysymykseen
                currentQuestion++;
                document.getElementById('currentQuestion').textContent = currentQuestion;

                if (currentQuestion < questions.length) {
                    showQuestion(currentQuestion);
                } else {

                    document.getElementById('otsikko-container').innerHTML = '<center><h2>Tuloksesi</h2></center>';
                    document.getElementById('question-container').innerHTML = `<center><p>Pisteet: ${score}/<?php echo $number_of_questions-1;?></p></center>`;
                    document.getElementById('next-button').style.display = 'none'; // Piilota "Seuraava" nappi pelin lopussa
                    document.getElementById('kysymykset').style.display = 'none';
                    document.getElementById('highscore').style.display = 'block';
                }
            }

            // Näytetään ensimmäinen kysymys heti
            showQuestion(currentQuestion);

            // Näytä "Seuraava" nappi, kun vastaus on valittu
            document.querySelector('.answer-container').addEventListener('change', function() {
                document.getElementById('next-button').style.display = 'inline'; // Näytä "Seuraava" nappi aina, kun vastaus on valittu
            });
        </script>
        
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