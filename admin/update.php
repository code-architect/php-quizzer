<?php include 'includes/all.php'; ?>
<?php include'includes/header.php'; ?>



    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                    <h1>Add English Question</h1>
                    <p>

                    <form action="process_question.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="question">Question Number:</label>
                            <input type="text" class="form-control" value="<?php echo $question_num; ?>" name="question_num" id="question_num" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control" name="question" id="question">
                        </div>

                        <div class="form-group">
                            <label for="ans1">Answer 1:</label>
                            <input type="text" class="form-control" name="ans1" id="ans1">
                        </div>
                        <div class="form-group">
                            <label for="ans2">Answer 2:</label>
                            <input type="text" class="form-control" name="ans2" id="ans2">
                        </div>
                        <div class="form-group">
                            <label for="ans3">Answer 3:</label>
                            <input type="text" class="form-control" name="ans3" id="ans3">
                        </div>

                        <select name="rightAnswer">
                            <option value="1">Answer 1</option>
                            <option value="2">Answer 2</option>
                            <option value="3">Answer 3</option>
                        </select>


                        <div class="form-group">
                            <label for="ans3">Image:</label>
                            <input type="file" name="image" />
                        </div>



                        <button name="submit" type="submit" class="btn btn-default">Submit</button>
                        <input type="hidden" name="type" value="<?php echo $type; ?>"/>
                    </form>

                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->



<?php include'includes/footer.php'; ?>