<?php include '../admin/includes/all.php'; ?>
<?php
$drop_english = "DROP table tempo_eng";
$mysqli->query($drop_english);
session_destroy();

?>
<h1>Yes! You have passed</h1>

<h1>Try Again!</h1>

<a href="../">Take a test</a>