<?php
include('dashboard/function.php');
include("./header.php");
?>
<section class="pageBanner">
  <h3>ALL Articles</h3>
</section>
<section class="articleSec">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <?php
        foreach ($articles->getData() as $articlee) :
        ?>
          <a href="articleDetail.php?id=<?php echo $articlee['id'] ?>">
            <img src="uploads/articles/<?php echo $articlee['image'] ?>" alt="">
            <div class="col-md-9 col-sm-12">
              <h3><?php echo $articlee['title_en'] ?></h3>
              <p><?php echo $articlee['description_en'] ?></p>
            </div>
          </a>
        <?php
        endforeach;
        ?>
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
include("./footer.php");

?>