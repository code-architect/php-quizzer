<?php include '../admin/includes/all.php'; ?>
<?php
print_r($_POST);

if(isset($_POST['submit']))
{
    $_SESSION['current_qus_num']++;                 // increment current question number
    $number = $_POST['number'];                     // number of the current questions
    $selected_choice = $_POST['choice'];
    $actual_number = $_POST['actual_number'];
    $next = $number+1;                              // next page value

    // get total number
    $query = "SELECT * FROM tempo_beng";
    $results = $mysqli->query($query);
    $total = $results->num_rows;

    // getting the correct ans
    $query = "SELECT * FROM beng_choices where question_number = $actual_number AND is_correct = 1";
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
        header("Location: bengali_final.php");
    }else{
        header("Location: bengali_exam.php?n=".$next);
    }
}