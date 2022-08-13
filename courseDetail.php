<?php
include('dashboard/function.php');
$item_id = $_GET['id'];
?>


<?php
include("header.php");
foreach ($course->getData() as $coursee) :
    if ($coursee['id'] == $item_id) :

?>
        <section class="pageBanner">
            <h3><?php echo $coursee['name'] ?></h3>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 courseSubDetail">
                        <div class="d-flex justify-content-between align-items-center detaill">
                            <h3><?php echo $coursee['name'] ?></h3>
                            <p><?php echo $coursee['price'] ?> EGP</p>
                        </div>
                        <img src="./uploads/courses/<?php echo $coursee["img"] ?>" alt="" width="50px">
                        <ul class="nav nav-pills mb-3 itemsss" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Lessons</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Instructor</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab" aria-controls="ex1-pills-4" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane descc fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <?php
                                foreach ($Lesson->getData() as $lessonn) :
                                    if ($lessonn['course_id'] == $coursee['id']) :
                                ?>
                                        <div>
                                            <h3><?php echo $lessonn['name'] ?></h3>
                                            <p><?php echo $lessonn['description'] ?></p>
                                            <a href="lessonDetail.php?id=<?php echo $lessonn['id'] ?>">Show</a>
                                        </div>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                            <div class="descc tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                <p><?php echo $coursee['description'] ?></p>
                                <p><span>Duration: </span><?php echo $coursee['duration'] ?></p>
                            </div>
                            <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                <p><?php echo $coursee['author'] ?></p>
                            </div>
                            <div class="tab-pane fade" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                                <?php
                                foreach ($feedbacks->getData() as $feedback) :
                                    foreach ($User->getData() as $user) :

                                        if ($feedback['course_id'] == $item_id) :
                                            if ($user['id'] == $feedback['student_id']) :
                                ?>
                                                <div class="feedback">
                                                    <p><?php echo $user['name'] ?></p>
                                                    <h5><?php echo $feedback['content'] ?></h5>
                                                </div>
                                <?php
                                            endif;
                                        endif;
                                    endforeach;
                                endforeach;
                                ?>
                            </div>
                        </div>
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

    endif;
endforeach;
include("footer.php")
?>