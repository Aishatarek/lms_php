<?php
ob_start();
include("dashboard/function.php");
include("./header.php");
?>
<section class="pageBanner">
    <h3>Profile</h3>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 courseSubDetail">
                <h3>Your Courses</h3>
                <?php
                foreach ($course_order->getData() as $order) :
                    foreach ($course->getData() as $coursee) :
                        if ($coursee['id'] == $order['course_id']) {
                ?>
                            <div class="myCourses">
                                <a href="courseDetail.php?id=<?php echo $coursee['id']; ?>">
                                    <img src="uploads/courses/<?php echo $coursee['img']; ?>" alt="">
                                    <h3><?php echo $coursee['name']; ?></h3>
                                    <p><?php echo $coursee['description']; ?></p>
                                </a>
                            </div>
                <?php
                        }
                    endforeach;
                endforeach;
                ?>
            </div>
            <div class="col-md-3 col-sm-12 sideCourses">
                <?php
                foreach ($course->getLimitedData() as $coursee) :
                ?>
                    <a href="courseSubDetail.php?id=<?php echo $coursee['id'] ?>">
                        <div class="d-flex">
                            <img src="uploads/courses/<?php echo $coursee['img'] ?>" alt="">
                            <h3><?php echo $coursee['name'] ?></h3>
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