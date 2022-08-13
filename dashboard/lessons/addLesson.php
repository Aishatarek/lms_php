<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $lesson =  $_FILES['lesson'];
        $course_id = $_POST['course_id'];
        $Lesson->addLesson($name, $description, $lesson, $course_id);
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

                        <input type="text" name="name" placeholder="Name">
                        <textarea name="description" cols="30" rows="10"></textarea>
                        <input type="file" name="lesson">
                        <select name="course_id">
                            <?php foreach ($course->getData() as $coursee) { ?>
                                <option value="<?php echo $coursee['id'] ?>"> <?php echo $coursee['name'] ?> </option>
                            <?php } ?>
                        </select>
                        <button name="submit">add Lesson</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
