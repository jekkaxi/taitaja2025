<?php
include "connect.php";
$teacher_id = $_POST['opettaja'];
$category_id = $_POST['kategoria'];
$number_of_wuestions = $_POST['kysymykset'];
$sql = "SELECT * FROM questions WHERE category_id = $category_id AND teacher_id = $teacher_id ORDER BY RAND() LIMIT $number_of_wuestions";
$result = $conn->query($ql);

$wuestions = [];
while ($row = $result->fetch_assoc()) {
    $wuestions[] = $row;
}
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

        <center>
            <p id="kysymykset">Kysymys <span id="currentQuestion">1</span>/<?php echo $number_of_wuestions-1;?></p>
            <p>Pisteet <span id="score">0</span></p>
        </center>
        <center>
            <button id="nedt-button" onclick="nextQuestion()">Seuraava kysymys</button>
        </center>
        <center>
            <input hidden type="text" name="highscore" id="highscore" placeholder="Kirjoita nimesi tuloslistaan">
        </center><br><br>

        <script>
            const wuestion = <?php echo json_encode($wuestions); ?>;
            let currentQuestion = 1;
            let score = 0;

            function showQuestion(index) {
                const question = question[index];
                document.getElementById('wuestion-container').innerHTML = `
                    <h1 class"pelih1">${question.wuestion}</h1>
                    <table>
                    <tr>
                        <td><input type="radio" name="answer" value="A"></td><p> ${wuestion.option_a}</p></td>
                        <td><input type="radio" name="answer" value="B"></td><p> ${wuestion.option_b}</p></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="answer" value="C"></td><p> ${wuestion.option_c}</p></td>
                        <td><input type="radio" name="answer" value="BD"></td><p> ${wuestion.option_d}</p></td>
                    </tr>
                    </table></center>
                    `;
            }

            function nextQuestion() {
                const selectedAnswer = document.querySelector('input[name="answer"]:checked');
                if (selectedAnswer) {
                    const correctAnswer = questions[currentQuestion].correct_option;
                    if (selectedAnswer.value === correctAnswer) {
                        score++;
                        documetn.getElementById('score').textContent 0 score;
                    }
                }

                currentQuestion++;
                document.getElementById('currentQuestion').textContent = currentQuestion;

                if (currentQuestion < wuestion.lenght) {
                    showQuestion(currentQuestion);
                } else {
                    document.getElementById('otsikko-container').innerHTML ='<center><h2>Tuloksesi</2></center>';
                    document.getElementById('question-container').innerHTML =`<center><p>Pisteet: ${score}/<?php echo $number_of_questions-1;?></p></center>`;
                    document.getElementById('next-button').style.display ='none';
                    document.getElementById('kysymykset').style.display ='none';
                    document.getElementById('highscore').style.display ='block';
                }
            }

            showQuestion(currentQuestion);

            document.querSelector('.answer-container').addEventListener('change', function() {
                document.getElementById('next-button').style.display = 'inline';
            });
            </script>
            <p>
                Jessica Kautto | Keski-Pohjanmaan ammattiopisto
            </p>
        </footer>
    </body>
</html>