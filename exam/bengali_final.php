<?php include '../admin/includes/all.php'; ?>
<?php
//"<h1>Out of 10"/*$_SESSION['current_qus_num']*/." questions ".$_SESSION['score']." are correct</h1>";
if($_SESSION['score'] >= 6){
    $drop_english = "DROP table tempo_beng";
    $mysqli->query($drop_english);
    session_destroy();
    header('Location: exam_final/bengali/examination-end-bengali-pass.php');
}else{
    $drop_english = "DROP table tempo_beng";
    $mysqli->query($drop_english);
    session_destroy();
    header('Location: exam_final/bengali/examination-end-bengali-fail.php');
}


?>

<a href="../">Take a test</a>
