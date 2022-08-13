<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $student_id =  $_POST['student_id'];
        $course_id =  $_POST['course_id'];
        $content = "'" . $_POST['content'] . "'";
        $feedbacks->addFeedback($student_id, $course_id, $content);
    }
}
include("../headerr.php");
?>
<section class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-12 sideNavv">
                <?php
                include('../sideNavv.php');
                ?>
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="theform">
                    <div>
                        <img src="../../images/book-2-440x440.jpg" alt="">
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <select name="student_id">
                            <?php foreach ($User->getData() as $user) { ?>

                                <option value="<?php echo $user['id'] ?>"> <?php echo $user['name'] ?> </option>
                            <?php } ?>
                        </select>
                        <select name="course_id">
                            <?php foreach ($course->getData() as $coursee) { ?>
                                <option value="<?php echo $coursee['id'] ?>"> <?php echo $coursee['name'] ?> </option>
                            <?php } ?>
                        </select>
                        
                        <textarea name="content" cols="30" rows="10"></textarea>
                        <button name="submit">add Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
