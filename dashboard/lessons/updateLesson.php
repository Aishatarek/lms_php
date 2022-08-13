<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
$item_id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $lesson =  $_FILES['lesson'];
        $course_id = $_POST['course_id'];
        $Lesson->updateLesson($item_id, $name, $description, $lesson, $course_id);
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
                <?php
                foreach ($Lesson->getData() as $lesson) :
                    if ($lesson['id'] == $item_id) :
                ?>
                        <div class="theform">
                            <div>
                                <img src="../../images/book-2-440x440.jpg" alt="">
                            </div>
                            <form method="post" enctype="multipart/form-data">

                                <input type="text" name="name" placeholder="Name" value="<?php echo $lesson['name'] ?>">
                                <textarea name="description" cols="30" rows="10"><?php echo $lesson['description'] ?></textarea>
                                <input type="file" name="lesson">
                                <select name="course_id">
                                    <?php foreach ($course->getData() as $coursee) {
                                        if ($coursee['id'] == $lesson['course_id']) {
                                    ?>
                                            <option value="<?php echo $coursee['id'] ?>" selected> <?php echo $coursee['name'] ?> </option>
                                        <?php } else { ?>
                                            <option value="<?php echo $coursee['id'] ?>"> <?php echo $coursee['name'] ?> </option>
                                    <?php }
                                    } ?>
                                </select>
                                <button name="submit">Update Lesson</button>
                            </form>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
