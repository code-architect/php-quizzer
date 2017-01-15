<?php include '../admin/includes/all.php'; ?>

<?php
    $number = (int) $_GET['n'];

    // get the question
    $query = "select * from tempo_eng ";
    $result = $mysqli->query($query);
    $result = $result->fetch_all();

echo "<pre>";
print_r($result);
echo "</pre>";
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
                    ok
                </p>
                <form method="post" action="process.php">
                    <ul class="choices">
                        <li><input name="choice" type="radio" id="choice_1" value="1" />Question 1</li>
                        <li><input name="choice" type="radio" id="choice_1" value="2" />Question 2</li>
                        <li><input name="choice" type="radio" id="choice_1" value="3" />Question 3</li>
                    </ul>
                    <img src="../media/images/english_image/example.jpg" height="100" width="100" style="margin-left:25px;margin-bottom:5px;"/>

                    <input type="submit" value="Submit" id="submit"/>
                </form>

                <div class="current">Question No. 1</div><br>
                <div class="currentMarks">1/3</div>
                <h3 id="quizTime">Time left 30s</h3>

            </div>
        </main>



    </body>
</html>