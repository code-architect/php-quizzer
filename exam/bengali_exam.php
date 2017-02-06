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
$query = "SELECT * FROM tempo_beng";
$results = $mysqli->query($query);
$total = $results->num_rows;

//--------------------------------------------------------------------------------------------------------------------//


$number = (int) $_GET['n'];
// get the question
$query = "select * from tempo_beng where question_id = ".$number;
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();

// get the answers
$query2 = "select * from beng_choices where question_number = ".$question['question_number'];
$choices = $mysqli->query($query2) or die($mysqli->error.__LINE__);

// select the right answer for javascript
$query3 = "select id from beng_choices where question_number = ".$question['question_number']." and is_correct = 1";
$showAnswer = $mysqli->query($query3) or die($mysqli->error.__LINE__);
$showAns = $showAnswer->fetch_assoc();


//-----------------------------------------------------------------------------//
?>

<html>
<head>
    <title>Examination Page</title>
    <link rel="stylesheet" type="text/css" href="_css/style.css">
    <script type="text/javascript" src="../media/js/jquery.js" ></script>

    <link rel="stylesheet" type="text/css" href="../_css/modal.css"/>
    <meta charset="UTF-8" />

    <!-- Javascript Code -->
    <script type="text/javascript">

        /**
         * Auto submit after time up
         */
        $(document).ready(function(){
            /**
             * check if radio button is clicked then enable submit button
             */
            $('#myform :radio').click(function() {
                if (!$("input[name='choice']:checked").val()) {
                    return false;
                }
                else {
//                    var radioValue = document.getElementById("choice").value;
//                    alert(radioValue);
//                    var changeDiv = "<div id='demo' value='"+radioValue+"'>";
//                    document.getElementById('trouble').innerHTML = changeDiv;

                    document.getElementById("submit").disabled = false;
                    document.getElementById("submit").style.background = 'green';
                }
            });

            //------------------------------------------------------------------
            var time = 30;
            var getValue = Number(getUrlParameter('n'));
            var addValue = 1;
            getValue = getValue + addValue;

            var url = '';
            var rightAns = <?php echo $showAns['id']; ?>;

//            if (document.getElementById('choice').checked) {
//                var radioValue = document.getElementById('choice').value;
//            }


            var finalUrl =  'english_final.php';


            function countdown(){

                setTimeout(countdown,1000);
                document.getElementById("quizTime").innerHTML = time;
                time--;

                if(time < 0){
                    if(getValue <= 10){
                        if(document.getElementById('submit').disabled) {
                            url = 'bengali_exam.php?n='+getValue;
                            window.location = url;
                        }else{
                            myFunction();
                            url = 'bengali_process.php?rightAns='+rightAns+'&radioAns='+$( "input[type=radio][name='choice']:checked" ).val()+'&numb='+getValue;
                            //alert($( "input[type=radio][name='choice']:checked" ).val());
                            window.location = url;
                        }
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
        //        $(document).ready(function(){
        //
        //
        //        });


        /**
         * Change color
         */
        function myFunction()
        {
            var rightAns = <?php echo $showAns['id']; ?>;
            var radioValue = $("input[name='choice']:checked", '#myform').val();

            var myButton = "choice_"+radioValue;

            var success = "<div>" +
                "<textarea style=\"background-color: #00CC00\" class=\"ans-box\"  disabled>"+
                "</textarea>"+"</div>";

            var danger = "<div>" +
                "<textarea style=\"background-color: red\" class=\"ans-box\"  disabled>"+
                "</textarea>"+"</div>";

            /*var danger = "<div class=\"alert\">"+
             "<span class=\"closebtn\"></span>"+
             "<strong>Success!</strong> Indicates a successful or positive action.</div>";*/

            /*var success =  "<div class=\"alert success\">"+
             "<span class=\"closebtn\"></span>"+
             "<strong>Success!</strong> Indicates a successful or positive action.</div>";*/

            if(rightAns == radioValue)
            {
                document.getElementById(myButton).innerHTML = success;
            }else{
                document.getElementById(myButton).innerHTML = danger;
            }
        }


    </script>


</head>
<body>
<div id="wrapper">
    <div id="content" style="background:url('images/exam-bengali-back.png') no-repeat">
        <div id="exam-header">
            <div id="exam-header-inner">
                Student Name: <?php echo $_SESSION['cName']; ?>
            </div>
        </div>
        <div id="exam-question">
            <div style="margin-left:130px;">
                <textarea class="exam-box" disabled><?php echo $question['question']; ?></textarea>
                <img src="../media/images/english_image/<?php echo $question['question_image']; ?>" height="100" width="100" style="margin-left:25px;margin-bottom:5px;"/>
            </div>
        </div>



        <!-- form starts -->
        <form onsubmit="myFunction()" id="myform" method="post" action="bengali_process.php">

        <?php while($row = $choices->fetch_assoc()) : ?>
        <div id="exam-answer">
            <div style="margin-left:130px;">
                <div style="margin-left:-50px;margin-top:-20px;float:left;">
                    <input type="radio" id="choice" name="choice" value="<?php echo $row['id']; ?>"/>
                </div>
                <div id="choice_<?php echo $row['id']; ?>">
                    <textarea  class="ans-box" style="margin-top:-40px;" disabled><?php echo $row['answer']; ?></textarea>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

        <div id="exam-answer"> <!-- Footer Controls -->
            <div style="margin-top:-30px;float:left;background: url('images/exam-footer-bengali.png');height:97px;width:625px;">
                <div style="float:left;margin-top:30px;margin-left:5px;"><!-- Answer Submit Button -->
                    <input id="submit" name="submit" type="submit" value="সুনিশ্চিত করা" class="confirm-class" style="height:38px;width:123px;" disabled>
                </div>

                <input type="hidden" name="number" value="<?php echo $number; ?>"/>
                <input type="hidden" name="actual_number" value="<?php echo $question['question_number']; ?>"/>
        </form>
         <!-- form ends -->

                <div style="float:left;margin-top:35px;margin-left:40px;color:#089D99;font-weight:bold;font-size:30px; ">
                    <?php echo $_SESSION['score']; ?>/<?php echo $_GET['n']; ?>
                </div>
                <div id="quizTime" style="float:left;margin-top:35px;margin-left:140px;color:#FF0733;font-weight:bolder;font-size:30px; "><!-- Timer -->

                </div>
                <div style="float:left;margin-top:35px;margin-left:180px;color:#089D99;font-weight:bold;font-size:30px; "><!-- Page Count -->
                    <?php echo $_GET['n']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>