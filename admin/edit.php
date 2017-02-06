<?php include 'includes/all.php'; ?>
<?php include'includes/header.php'; ?>
<?php
$type = $_GET['type'];
$id = $_GET['id'];
$question_database = selectQuestionDatabase($type);
$answer_database = selectAnswerDatabase($type);
$image_folder = selectImageFolder($type);
$rows = fetch_questions($question_database);

// get the question
$query = "SELECT * FROM ".$question_database." WHERE question_number = $id  LIMIT 1 ";
$result = $mysqli->query($query);
$question = $result->fetch_assoc();

// get the answer
$query = "SELECT * FROM ".$answer_database." WHERE question_number = $id";
$result = $mysqli->query($query);
$answers = $result->fetch_all(MYSQLI_ASSOC);

$arrAns = [];
foreach($answers as $num => $ans)
{
    $num = $num+1;
    $arrAns[$num] = $ans['is_correct'];
}
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                    <h1>Edit English Question</h1>
                    <p>

                    <form action="edit_process.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="question">Question Number:</label>
                            <input type="text" class="form-control" value="<?php echo $question['question_number']; ?>" name="question_num" id="question_num" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" value="<?php echo $question['question']; ?>" class="form-control" name="question" id="question">
                        </div>

                        <?php foreach($answers as $key => $value){
                            $key = $key+1
                            ?>

                        <div class="form-group">
                            <label for="ans<?php echo $key; ?>">Answer <?php echo $key; ?>:</label>
                            <input type="text" value="<?php echo $value['answer']; ?>" class="form-control" name="ans<?php echo $key; ?>" id="ans<?php echo $key; ?>">
                            <input type="hidden" name="ansid_<?php echo $key; ?>" value="<?php echo $value['id']; ?>"/>
                        </div>
                        <?php } ?>


                        <select name="rightAnswer">
                            <?php foreach($answers as $key => $value){
                                $key = $key+1
                                ?>

                                <option <?php if($value['is_correct'] == 1){echo "selected";}  ?> value="<?php echo $value['id']; ?>"><?php echo $key; ?></option>

                            <?php } ?>

                        </select>


                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" />
                        </div>

                        <div class="form-group">
                            <label for="">Current Image: </label>
                            <img src="../media/images/<?php echo $image_folder; ?>/<?php echo $question['question_image']; ?>" height="100" width="100" alt=""/>
                        </div>





                        <button name="submit" type="submit" class="btn btn-default">Submit</button>
                        <input type="hidden" name="type" value="<?php echo $type; ?>"/>
                        <input type="hidden" name="old_image" value="<?php echo $question['question_image']; ?>"/>
                    </form>

                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->



<?php include'includes/footer.php'; ?>