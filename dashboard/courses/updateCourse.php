<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $author =  "'" . $_POST['author'] . "'";
        $image =  $_FILES['image'];
        $duration =  "'" . $_POST['duration'] . "'";
        $price =  $_POST['price'];
        $original_price = $_POST['original_price'];
        $course->updateCourse($item_id, $name, $description, $author, $image, $duration, $price, $original_price);
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
                    <?php
                    foreach ($course->getData() as $coursee) :
                        if ($coursee['id'] == $item_id) :

                    ?>
                            <div>
                                <img src="../../uploads/courses/<?php echo $coursee['img'] ?>" alt="">
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <input type="text" name="name" placeholder="Name" value="<?php echo $coursee['name'] ?>">
                                <textarea name="description" cols="30" rows="10"><?php echo $coursee['description'] ?></textarea>
                                <input type="text" name="author" placeholder="author" value="<?php echo $coursee['author'] ?>">
                                <input type="file" name="image">
                                <input type="text" name="duration" placeholder="duration" value="<?php echo $coursee['duration'] ?>">
                                <input type="text" name="price" placeholder="price" value="<?php echo $coursee['price'] ?>">
                                <input type="text" name="original_price" placeholder="original_price" value="<?php echo $coursee['original_price'] ?>">
                                <button name="edit_submit">Update Course</button>
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
