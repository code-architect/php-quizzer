<?php include '../admin/includes/all.php'; ?>
<?php
echo "<h1>Out of 3"/*$_SESSION['current_qus_num']*/." questions ".$_SESSION['score']." are correct</h1>";
if($_SESSION['score'] >= 2){
    echo "<h1>Yes! You have passed</h1>";
}else{
    echo "<h1>Try Again!</h1>";
}



$drop_english = "DROP table tempo_eng";
$mysqli->query($drop_english);
session_destroy();

?>

<a href="../">Take a test</a>
