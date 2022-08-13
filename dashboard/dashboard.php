<?php
include("function.php");
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: Home.php");
}
include("./header.php");


?>
<section class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-12 sideNavv">
                <?php
                include('sideNav.php');
                ?>
            </div>
            <div class="col-md-10 col-sm-12 dashDivs">
                <div class="row">
                    <div class="col-md-6 col-sm-12 ">
                        <a href="users/allUsers.php">
                            <div>
                                <i class="fa-solid fa-users"></i>
                                <p>Users</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="courses/allCourses.php">
                            <div>
                                <i class="fa-solid fa-person-chalkboard"></i>
                                <p>Courses</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <a href="lessons/allLessons.php">
                            <div>
                                <i class="fa-brands fa-leanpub"></i>
                                <p>Lessons</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="articles/allArticles.php">
                            <div>
                                <i class="fa-solid fa-newspaper"></i>
                                <p>Articles</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="feedbacks/allFeedbacks.php">
                            <div>
                                <i class="fa-solid fa-message"></i>
                                <p>Feedbacks</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="tasks/allTasks.php">
                            <div>
                                <i class="fa-solid fa-question"></i>
                                <p>Tasks</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include("../footer.php");
?>