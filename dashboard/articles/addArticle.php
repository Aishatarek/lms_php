<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $title_en = "'" . $_POST['title_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_en = "'" . $_POST['description_en'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $image =  $_FILES['image'];
        $articles->addArticle($title_en, $title_ar, $description_en, $description_ar, $image);
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
                        <input type="text" name="title_en" placeholder="title_en">
                        <input type="text" name="title_ar" placeholder="title_ar">
                        <textarea name="description_en" cols="30" rows="10"></textarea>
                        <textarea name="description_ar" cols="30" rows="10"></textarea>
                        <input type="file" name="image">
                        <button name="submit">add Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
