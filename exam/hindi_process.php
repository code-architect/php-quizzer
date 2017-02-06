<?php include '../admin/includes/all.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

if(isset($_POST['submit']))
{
    $_SESSION['current_qus_num']++;                 // increment current question number
    $number = $_POST['number'];                     // number of the current questions
    $selected_choice = $_POST['choice'];
    $actual_number = $_POST['actual_number'];
    $next = $number+1;                              // next page value

    // get total number
    $query = "SELECT * FROM tempo_hin";
    $results = $mysqli->query($query);
    $total = $results->num_rows;

    // getting the correct ans
    $query = "SELECT * FROM hin_choices where question_number = $actual_number AND is_correct = 1";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    // set the correct choice
    $correct_choice = $row['id'];

    // if the ans is correct increment the right ans number
    if($correct_choice == $selected_choice)
    {
        $_SESSION['score']++;
    }

    // check if its the last question
    if($number == $total)
    {
        header("Location: hindi_final.php");
    }else{
        header("Location: hindi_exam.php?n=".$next);
    }
}
}else{
    $correct_choice = $_GET['rightAns'];
    $selected_choice = $_GET['radioAns'];
    $number = $_GET['numb'];


    // get total number
    $query = "SELECT * FROM tempo_hin";
    $results = $mysqli->query($query);
    $total = $results->num_rows;


    if($correct_choice == $selected_choice)
    {
        $_SESSION['score']++;
    }

    // check if its the last question
    if($number == $total)
    {
        header("Location: hindi_final.php");
    }else{
        header("Location: hindi_exam.php?n=".$number);
    }
}