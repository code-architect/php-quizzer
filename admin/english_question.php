<?php include 'includes/all.php'; ?>
<?php include'includes/header.php'; ?>

<?php
    $type = $_GET['type'];
    $question_database = selectQuestionDatabase($type);
    $image_folder = selectImageFolder($type);
    $rows = fetch_questions($question_database);

?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                    <h1><?php echo selectName($type); ?></h1>
                    <p>
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <a class="btn btn-default btn-lg" href="add.php?type=<?php echo $type; ?>">Add Question</a>
                    </p>

                    <!-- Table start -->
                    <p>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Question Number</th>
                            <th>Question</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach($rows as $row){ ?>
                        <tr>
                            <td><?php echo $row['question_number']; ?></td>
                            <td><?php echo $row['question']; ?></td>
                            <td><a href="edit.php?type=<?php echo $type; ?>&id=<?php echo $row['question_number']; ?>">Edit</a></td>
                            <td><a onclick="return confirm('Are you sure you want to delete this item?');"
                                   href="delete_question.php?type=<?php echo $type; ?>&id=<?php echo $row['question_number']; ?>">Delete</a></td>
                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

<?php include'includes/footer.php'; ?>