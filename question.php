<?php
    require "./includes/data-collector.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        require "./includes/db.php";

        // SQL Statment formulieren: ALle Daten (ganze Tabellenzeile)
        // zur Frage mit der angegebenen $id auslesen
        $id = 9999;
        $question = fetchQuestionById($id, $dbConnection);
    ?>

    <!-- FORMULAR "Fragestellung" -->
    <div class="row">
        <div class="col-sm-8">
            <!-- Fragestellung -->
            <h7>Frage <?php echo ($currentQuestionIndex + 1); ?> von <?php echo $quiz["questionNum"]; ?></h7>
            <h3>Wieviele Beine hat eine Spinne</h3>
            <h3><?php echo $question["question_text"]; ?></h3>

            <form id="quiz-form" action="question.php" method="post" onsubmit="return navigate('next');">
                <?php
                    // Generiere Antwort-Radio-Buttons mit Beschriftung

                    // Single Choice: Hole den Namen der richtigen Antwortspalte in $correct, aus $question["correct"]
                    $correct = $question["correct"];

                    for ($a = 1; $a <= 5; $a++) {
                        // Setze für $answerColumnName den Namen der Tabellenspalte "answer-N" zusammen
                        $answerColumnName = "answer-" . $a;
                    
                        // Falls es überhaupt Antworttext in $question[$answerColumnName] gibt
                        // und der Antworttext nicht gleich '', dann ...
                        if (isset($question[$answerColumnName]) && $question[$answerColumnName] !== '') {
                            // ... hole den Antworttext aus $question.
                            $answerText = $question[$answerColumnName];

                            // Entscheide für $value, wieviele Punkte die Antwort ergibt:
                            // richtig -> 1 Punkt, falsch -> 0 Punkte
                            if ($correct === $answerColumnName) $value = 1;
                            else $value = 0;

                            echo "<div class='form-check'>
                                    <input class='form-check-input' type='radio' name='answer' id='$answerColumnName value='$value'>
                                    <label class='form-check-label' for='single-choice-0'>$answerText</label>
                                </div>";
                        }
                    }
                ?>

                <!--    
                        input type="hidden" 
                        questionNum, lastQuestionIndex: mit PHP gesetzt
                        indexStep: mit JavaScript setIntValue(fieldId, value) verändert
                -->
                <input type="hidden" id="questionNum" value="<?php echo $quiz["questionNum"]; ?>">
                <input type="hidden" id="lastQuestionIndex" name="lastQuestionIndex" value="<?php echo $currentQuestionIndex; ?>">
                <input type="hidden" id="indexStep" name="indexStep" value="1">

                <!-- Validierungswarnung -->
                <p id="validation-warning" class="warning"></p>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary" onclick="navigatePrevious();">Previous</button>
                <button type="submit" class="btn btn-primary">Next</button>
                <p class="spacer"></p>
            </form>
        </div>
    </div>

</body>
</html>