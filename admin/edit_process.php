<?php
include 'includes/all.php';




if(isset($_POST['submit'])) {
    $question_num = clean($_POST['question_num']);       // question number in database
    $question = clean($_POST['question']);           // the question
    $answers = [];
    $answers[$_POST['ansid_1']] = clean($_POST['ans1']);               // answer 1
    $answers[$_POST['ansid_2']] = clean($_POST['ans2']);               // answer 2
    $answers[$_POST['ansid_3']] = clean($_POST['ans3']);               // answer 3
    $rightAnswer = clean($_POST['rightAnswer']);        // right answer name
    $type = clean($_POST['type']);               // which language
    $old_image = $_POST['old_image'];
    $file_name = $_FILES['image']['name'];


    // get the tables to insert the data in and image folder name
    $question_database = selectQuestionDatabase($type);
    $answer_database = selectAnswerDatabase($type);
    $image_folder = selectImageFolder($type);

    //check if the image file is empty
    if(empty($file_name) || $file_name == '') {
        $file_name = $old_image;
    }else{
        if(isset($_FILES['image']))
        {
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"../media/images/".$image_folder."/".$file_name);
                echo "success";
            }
        }
    }


    // insert question into database
    $insert_question = "UPDATE ".$question_database." SET question_number = '$question_num',
                        question = '$question', question_image = '$file_name' WHERE question_number = '$question_num'";

    $question_inserted = $mysqli->query($insert_question);


    // if this question insert is success then insert the answers
        if($question_inserted)
        {
            foreach($answers as $key => $value)
            {
                if($key == $rightAnswer){
                    $is_correct = 1;
                }else{
                    $is_correct = 0;
                }
                $query = "UPDATE ".$answer_database." SET question_number = '$question_num', is_correct = '$is_correct',
                answer = '$value' WHERE question_number = '$question_num' AND id = '$key'";
                $mysqli->query($query) or die($mysqli->error);

            }

            //$query = "UPDATE ".$answer_database." SET question_number = '$question_num', is_correct = '$is_correct',
            //answer = '$value' WHERE question_number = '$question_num'";
            header("Location: english_question.php?type=".$type);
        }

}


















/*
 *
 *
 * echo $question_num."<br>".$question."<br>".$rightAnswer."<br>".$type."<br>";
    echo "<pre>";
    print_r($answers);


//check if the submit button was clicked
if(isset($_POST['submit']))
{
    $question_num    = clean($_POST['question_num']);       // question number in database
    $question        = clean($_POST['question']);           // the question
    $answers = [];
    $answers[1]      = clean($_POST['ans1']);               // answer 1
    $answers[2]      = clean($_POST['ans2']);               // answer 2
    $answers[3]      = clean($_POST['ans3']);               // answer 3
    $rightAnswer     = clean($_POST['rightAnswer']);        // right answer name
    $type            = clean($_POST['type']);               // which language

    //check if any field is empty or not
//    if(empty($question_num) || empty($question) || empty($ans1) || empty($ans2) || empty($ans3) || empty($rightAnswer))
//    {
//        header("Location: english_question.php?type=".$type);
//    }

    //check if file have been uploaded
//    if($_FILES['image']['error'] != 0)
//    {
//        header("Location: english_question.php?type=".$type);
//    }


    // get the tables to insert the data in and image folder name
    $question_database = selectQuestionDatabase($type);
    $answer_database = selectAnswerDatabase($type);
    $image_folder = selectImageFolder($type);


    // move files
    if(isset($_FILES['image']))
    {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"../media/images/".$image_folder."/".$file_name);
            echo "success";
        }
    }



    // insert question into database
    $insert_question = "INSERT INTO ".$question_database." (question_number, question, question_image)
                            VALUES('$question_num', '$question', '$file_name')";
    $question_inserted = $mysqli->query($insert_question);
echo "done";

    // if this question insert is success then insert the answers
    if($question_inserted)
    {
        foreach($answers as $answer => $value)
        {
            // check the right answer
            if($rightAnswer == $answer){
                $is_correct = 1;
            }else{
                $is_correct = 0;
            }

            // the query
            $query = "INSERT INTO ".$answer_database." (question_number, is_correct, answer)
                          VALUES('$question_num', '$is_correct', '$value')";

            // run query
            $insert_answer = $mysqli->query($query) or die($mysqli->error);
            echo "done2";
            //validate the insert
            if($insert_answer){
                continue;
            }else{
                die('error not inserting: '.$mysqli->error);
            }
        }
        header("Location: english_question.php?type=".$type);
    }

}

*/

