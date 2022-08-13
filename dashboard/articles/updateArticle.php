<?php
include('../function.php');
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_submit'])) {
        $title_en = "'" . $_POST['title_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_en = "'" . $_POST['description_en'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $image =  $_FILES['image'];
            $articles->updateArticle($item_id, $title_en, $title_ar, $description_en, $description_ar, $image);
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
                foreach ($articles->getData() as $article) :
                        if ($article['id'] == $item_id) :

                    ?>
                    <div>
                        <img src="../../uploads/articles/<?php echo $article['image'] ?>" alt="">
                    </div>
                  

                            <form method="post" enctype="multipart/form-data">
                                <input type="text" name="title_en" placeholder="title_en" value="<?php echo $article['title_en'] ?>">
                                <input type="text" name="title_ar" placeholder="title_ar" value="<?php echo $article['title_ar'] ?>">
                                <textarea name="description_en" cols="30" rows="10"><?php echo $article['description_en'] ?></textarea>
                                <textarea name="description_ar" cols="30" rows="10"><?php echo $article['description_ar'] ?></textarea>
                                <input type="file" name="image">
                                <button name="edit_submit">Edit Article</button>
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
