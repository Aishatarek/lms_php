<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $author =  "'" . $_POST['author'] . "'";
        $image =  $_FILES['image'];
        $duration =  "'" . $_POST['duration'] . "'";
        $price =  $_POST['price'];
        $original_price = $_POST['original_price'];
        $course->addCourse($name, $description, $author, $image, $duration, $price, $original_price);
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
                        <input type="text" name="author" placeholder="author">
                        <input type="file" name="image">
                        <input type="text" name="duration" placeholder="duration">
                        <input type="text" name="price" placeholder="price">
                        <input type="text" name="original_price" placeholder="original_price">
                        <button name="submit">add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
