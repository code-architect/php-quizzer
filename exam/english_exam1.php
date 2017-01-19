<?php include '../admin/includes/all.php'; ?>
<?php print_r($_SESSION); ?>
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

//--------------------------------------------------------------------------------------------------------------------//


    $number = (int) $_GET['n'];
    // get the question
    $query = "select * from tempo_eng where question_id = ".$number;
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    // get the answers
    $query2 = "select * from eng_choices where question_number = ".$question['question_number'];
    $choices = $mysqli->query($query2) or die($mysqli->error.__LINE__);

    // select the right answer for javascript
    $query3 = "select id from eng_choices where question_number = ".$question['question_number']." and is_correct = 1";
    $showAnswer = $mysqli->query($query3) or die($mysqli->error.__LINE__);
    $showAns = $showAnswer->fetch_assoc();


//-----------------------------------------------------------------------------//
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Examination Page</title>
    <link rel="stylesheet" type="text/css" href="_css/style.css">
    <script type="text/javascript" src="../media/js/jquery.js" ></script>

    <link rel="stylesheet" type="text/css" href="../_css/modal.css"/>


    <!-- Javascript Code -->
    <script type="text/javascript">
        /**
         * Auto submit after time up
         */
        $(document).ready(function(){
            var time = 10;
            var getValue = Number(getUrlParameter('n'));
            var addValue = 1;
            getValue = getValue + addValue;

            var url = 'english_exam.php?n='+getValue;
            var finalUrl =  'english_final.php';

            function countdown(){
                setTimeout(countdown,1000);
                $('#quizTime').html(time);
                time--;

                if(time < 0){
                   if(getValue <= 3){
                       window.location = url;
                   }else{
                       window.location = finalUrl;
                   }
                   time = 0;
                }
            }
            countdown();
        });


        // fetching the GET value parameter
         function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };

        /**
         * check if radio button is clicked then enable submit button
         */
        $(document).ready(function(){
            $('#myform :radio').click(function() {
                if (!$("input[name='choice']:checked").val()) {
                    return false;
                }
                else {
                    document.getElementById("submit").disabled = false;
                    document.getElementById("submit").style.background = 'green';
                }
            });
        });

        //change color
        function myFunction()
        {
            var rightAns = <?php echo $showAns['id']; ?>;
            var radioValue = $("input[name='choice']:checked", '#myform').val();

            var danger = "<div class=\"alert\">"+
                         "<span class=\"closebtn\"></span>"+
                         "<strong>Success!</strong> Indicates a successful or positive action.</div>";

            var success =  "<div class=\"alert success\">"+
                           "<span class=\"closebtn\"></span>"+
                           "<strong>Success!</strong> Indicates a successful or positive action.</div>";

            if(rightAns == radioValue)
            {
                document.getElementById("ansIsCorrect").innerHTML = success;
            }else{
                document.getElementById("ansIsCorrect").innerHTML = danger;
            }
        }




    </script>
    <!-- Javascript Code Ends -->
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

                <form onsubmit="myFunction()" id="myform" method="post" action="english_process.php">
                    <ul class="choices">
                       <?php while($row = $choices->fetch_assoc()) : ?>
                        <li><input name="choice" id="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['answer']; ?></li>
                       <?php endwhile; ?>
                    </ul>

                    <input type="submit" value="Submit" name="submit" id="submit" disabled/>
                    <input type="hidden" name="number" value="<?php echo $number; ?>"/>
                    <input type="hidden" name="actual_number" value="<?php echo $question['question_number']; ?>"/>
                </form>

                <div id="ansIsCorrect"></div>

                <div class="current">Question No. <?php echo $_SESSION['current_qus_num']+1; ?></div><br>
                Total number of correct answer: <div class="currentMarks"><?php echo $_SESSION['score']; ?>/<?php echo $_SESSION['current_qus_num']; ?></div>
                <h3 id="quizTime"></h3>

            </div>
        </main>

    </body>
</html>