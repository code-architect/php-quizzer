<?php include '../admin/includes/all.php'; ?>
<?php

if($_GET['lang'] === 'ENG'){


    //create view
    $drop_table = "DROP TABLE IF EXISTS `tempo_eng`";

    $make_table = "CREATE TABLE `tempo_eng`
                  ( `question_id` INT(11) NOT NULL AUTO_INCREMENT , `question_number` INT(11) NOT NULL ,
                   `question` TEXT NOT NULL , `question_image` VARCHAR(255) NOT NULL ,
                   PRIMARY KEY (`question_id`))";

    $insert_data = "INSERT INTO tempo_eng(question_number, question, question_image)
                    SELECT question_number, question, question_image FROM english_question ORDER BY RAND() LIMIT 3;";





    $mysqli->query($drop_table);
    $mysqli->query($make_table);
    $mysqli->query($insert_data);

    header('Location: english_exam.php?n=1');

} elseif($_GET['lang'] === 'HIN'){
    header('Location: hindi_exam.php');
}elseif($_GET['lang'] === 'BEN'){
    header('Location: bengali_exam.php');
}else{
    header('Location : /');
}



