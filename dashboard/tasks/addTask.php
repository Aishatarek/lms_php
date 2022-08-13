<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $text = "'" . $_POST['text'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $lesson_id = $_POST['lesson_id'];
        $Tasks->addTask($text, $description, $lesson_id);
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

                        <input type="text" name="text" placeholder="task">
                        <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
                        <select name="lesson_id">
                            <?php
                            foreach ($Lesson->getData() as $lesson) {
                            ?>
                                <option value="<?php echo $lesson['id'] ?>">
                                    <?php
                                    foreach ($course->getData() as $coursee) {
                                        if ($coursee['id'] == $lesson['course_id']) {
                                            echo $coursee['name'] . '-';
                                        }
                                    }
                                    echo $lesson['name'] ?>
                                </option>
                            <?php
                            } ?>
                        </select>
                        <button name="submit">add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
