<?php include '../admin/includes/all.php'; ?>

<?php
    // the right ans number
    if(!isset($_SESSION['score']))
    {
        $_SESSION['score'] = 0;
    }

    // current question number
    if(!isset($_SESSION['current_qus_num']))
    {
        $_SESSION['current_qus_num'] = 0;
    }

    // total number of rows
    $query = "SELECT * FROM tempo_eng";
    $results = $mysqli->query($query);
    $total = $results->num_rows;


//-----------------------------------------------------------------------------//

    $number = (int) $_GET['n'];
    // get the question
    $query = "select * from tempo_eng where question_id = ".$number;
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    // get the answers
    $query2 = "select * from choices where question_number = ".$question['question_number'];
    $choices = $mysqli->query($query2) or die($mysqli->error.__LINE__);


?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Examination Page</title>
    <link rel="stylesheet" type="text/css" href="_css/style.css">
</head>
    <body>

        <header>
            <div class="container">
                <h1>Test</h1>
                Student Name: <?php echo $_SESSION['cName']; ?>
            </div>
        </header>

        <main>
            <div class="container">
                <p class="questions">
                   <?php echo $question['question']; ?>
                </p>
                <img src="../media/images/english_image/<?php echo $question['question_image']; ?>" height="100" width="100" style="margin-left:25px;margin-bottom:5px;"/>
                <form method="post" action="english_process.php">
                    <ul class="choices">
                       <?php while($row = $choices->fetch_assoc()) : ?>
                        <li><input name="choice" id="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['answer']; ?></li>
                       <?php endwhile; ?>
                    </ul>

                    <input type="submit" value="Submit" name="submit" id="submit"/>
                    <input type="hidden" name="number" value="<?php echo $number; ?>"/>
                    <input type="hidden" name="actual_number" value="<?php echo $question['question_number']; ?>"/>
                </form>

                <div class="current">Question No. <?php echo $_SESSION['current_qus_num']+1; ?></div><br>
                Total number of correct answer: <div class="currentMarks"><?php echo $_SESSION['score']; ?>/<?php echo $_SESSION['current_qus_num']; ?></div>
                <h3 id="quizTime">Time left 30s</h3>

            </div>
        </main>



    </body>
</html>