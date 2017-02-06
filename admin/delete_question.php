<?php
include 'includes/all.php';

$type = $_GET['type'];
$id = $_GET['id'];
$question_database = selectQuestionDatabase($type);
$answer_database = selectAnswerDatabase($type);
$image_folder = selectImageFolder($type);


$query = "SELECT * FROM ".$question_database." WHERE question_number = $id  LIMIT 1 ";
$result = $mysqli->query($query);
$question = $result->fetch_assoc();

$image = $question['question_image'];

//delete path
$path = '../media/images/'.$image_folder.'/'.$image;

if(unlink($path)) {

    $del_q = "DELETE FROM " . $question_database . " WHERE question_number = " . $id . " LIMIT 1";
    $result = $mysqli->query($del_q);

    $del_ans = "DELETE FROM " . $answer_database . " WHERE question_number = " . $id;
    $result = $mysqli->query($del_ans);

    header("Location: english_question.php?type=".$type);
}



