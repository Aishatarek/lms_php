<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../Home.php");
}
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $text = "'" . $_POST['text'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $lesson_id = $_POST['lesson_id'];
        $Tasks->updateTask($item_id, $text, $description, $lesson_id);
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
                foreach ($Tasks->getData() as $Task) :
                    if ($Task['id'] == $item_id) :
                ?>
                        <div class="theform">
                            <div>
                                <img src="../../images/book-2-440x440.jpg" alt="">
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <input type="text" name="text" placeholder="task" value="<?php echo $Task['text'] ?>">
                                <textarea name="description" cols="30" rows="10"><?php echo $Task['description'] ?></textarea>
                                <select name="lesson_id">
                                    <?php foreach ($Lesson->getData() as $lesson) {
                                        if ($lesson['id'] == $Task['course_id']) {
                                    ?>
                                            <option value="<?php echo $lesson['id'] ?>" selected> <?php echo $lesson['name'] ?> </option>
                                        <?php } else { ?>
                                            <option value="<?php echo $lesson['id'] ?>"> <?php echo $lesson['name'] ?> </option>
                                    <?php }
                                    } ?>
                                </select>
                                <button name="submit">Update Task</button>
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
