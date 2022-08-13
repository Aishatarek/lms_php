<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_submit'])) {
        $student_id =  $_POST['student_id'];
        $course_id =  $_POST['course_id'];
        $content = "'" . $_POST['content'] . "'";
        $feedbacks->updateFeedback($item_id,$student_id, $course_id, $content);
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
                    <?php
                    foreach ($feedbacks->getData() as $feedback) :
                        if ($feedback['id'] == $item_id) :
                    ?>
                        <form method="post">
                            <select name="student_id">
                                <?php foreach ($User->getData() as $user) {
                                    if ($user['id'] == $feedback["student_id"]) { ?>
                                        <option value="<?php echo $user['id'] ?>" selected> <?php echo $user['name'] ?> </option>
                                    <?php } else { ?>
                                        <option value="<?php echo $user['id'] ?>"> <?php echo $user['name'] ?> </option>
                                <?php }
                                }
                                ?>
                            </select>
                            <select name="course_id">
                                <?php foreach ($course->getData() as $coursee) {
                                    if ($user['id'] == $feedback["student_id"]) { ?>

                                        <option value="<?php echo $coursee['id'] ?>" selected> <?php echo $coursee['name'] ?> </option>
                                    <?php } else { ?>
                                        <option value="<?php echo $coursee['id'] ?>"> <?php echo $coursee['name'] ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <textarea name="content" cols="30" rows="10"><?php echo $feedback['content'] ?></textarea>
                            <button name="edit_submit">Update Feedback</button>
                        </form>
                    <?php
                    endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
