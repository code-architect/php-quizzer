<?php
include 'includes/all.php';

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
        if(empty($question_num) || empty($question) || empty($ans1) || empty($ans2) || empty($ans3) || empty($rightAnswer))
        {
            header("Location: add.php?type=".$type);
        }

        //check if file have been uploaded
        if($_FILES['image']['error'] != 0)
        {
            header("Location: add.php?type=".$type);
        }


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
                echo "Success";
            }else{
                print_r($errors);
            }
        }



        // insert question into database
        $insert_question = "INSERT INTO ".$question_database." (question_number, question, question_image)
                            VALUES('$question_num', '$question', '$file_name')";


        // if this question insert is success then insert the answers
        if($mysqli->query($insert_question))
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

                //validate the insert
                if($insert_answer){
                    continue;
                }else{
                    die('error not inserting: '.$mysqli->error);
                }
            }
            header("Location: add.php?type=".$type);
        }

    }



?>

<?php
//if(isset($_FILES['image'])){
//    $errors= array();
//    $file_name = $_FILES['image']['name'];
//    $file_size =$_FILES['image']['size'];
//    $file_tmp =$_FILES['image']['tmp_name'];
//    $file_type=$_FILES['image']['type'];
//    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
//
//    $expensions= array("jpeg","jpg","png");
//
//    if(in_array($file_ext,$expensions)=== false){
//        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
//    }
//
//    if($file_size > 2097152){
//        $errors[]='File size must be excately 2 MB';
//    }
//
//    if(empty($errors)==true){
//        move_uploaded_file($file_tmp,"images/".$file_name);
//        echo "Success";
//    }else{
//        print_r($errors);
//    }
//}
?>
