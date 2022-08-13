<?php
include('dashboard/function.php');
include("./header.php");
?>
<section class="pageBanner">
  <h3>ALL COURSES</h3>
</section>
<section class="coursesSec">
  <div class="container">
    <div class="row">

      <?php
      foreach ($course->getData() as $coursee) :
      ?>
        <div class="col-md-3 col-sm-12">
          <div class="divCourse">
            <a href="courseSubDetail.php?id=<?php echo $coursee['id'] ?>">
              <img src="uploads/courses/<?php echo $coursee['img'] ?>" alt="" />
              <div class="detailCourse">
                <p><?php echo $coursee['author'] ?></p>
                <h3><?php echo $coursee['name'] ?></h3>
              </div>
            </a>
            <div class="courseprice">
              <?php
              if ($coursee['price'] == 0) {
                ?>
                <p><del><small><?php echo $coursee['original_price'] ?> EGP</small></del></p>
                <h4>free</h4>
                <?php
              } else {
              ?>
                <p><del><small><?php echo $coursee['original_price'] ?> EGP</small></del></p>
                <h4 class="priceee"> <?php echo $coursee['price'] ?> EGP</h4>
              <?php
              }
              ?>
            </div>
            <a href="courseSubDetail.php?id=<?php echo $coursee['id'] ?>"><button class="linkdetail">Read More</button> </a>
          </div>
        </div>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</section>
<?php
include("./footer.php");

?>