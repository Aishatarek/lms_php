<?php
include('../function.php');
$item_id = $_GET['id'];
?>


<?php
include("header.php");
foreach ($articles->getData() as $article) :
    if ($article['id'] == $item_id) :

?>
        <section class="pageBanner">
            <h3><?php echo $article['title_en'] ?></h3>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 courseSubDetail">
                        <div class="d-flex justify-content-between align-items-center detaill">
                            <h3><?php echo $article['title_en'] ?></h3>
                        </div>
                        <img src="./uploads/articles/<?php echo $article["image"] ?>" alt="" width="50px">
                        <h3 style="text-align: right;"><?php echo $article['title_ar'] ?></h3>
                        <p><?php echo $article["description_en"] ?></p>
                        <p style="text-align: right;"><?php echo $article["description_ar"] ?></p>
                    </div>
                    <div class="col-md-3 col-sm-12 sideCourses">
                        <?php
                        foreach ($articles->getLimitedData() as $article) :
                        ?>
                            <a href="articleDetail.php?id=<?php echo $article['id'] ?>">
                                <div class="d-flex">
                                    <img src="uploads/articles/<?php echo $article['image'] ?>" alt="">
                                    <h3><?php echo $article['title_en'] ?></h3>
                                </div>
                            </a>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </section>
<?php

    endif;
endforeach;
include("footer.php")
?>