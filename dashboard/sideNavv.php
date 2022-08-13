<div>
    <?php
    foreach ($User->getData() as $user) :
        if ($user['id'] == $_SESSION['user_id']) :
    ?>
            <div class="adminDetail">
                <img src="../../uploads/users/<?php echo $user['avatar']; ?>" alt="" >
                <h3><?php echo $user['name']; ?></h3>
            </div>
    <?php
        endif;
    endforeach;
    ?>
    <div >
        <a href="../dashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <p>Home</p>
        </a>
    </div>
    <div>
        <a href="../users/allUsers.php">
            <i class="fa-solid fa-users"></i>
            <p>Users</p>
        </a>
    </div>
    <div>
        <a href="../courses/allCourses.php">
            <i class="fa-solid fa-person-chalkboard"></i>
            <p>Courses</p>
        </a>
    </div>
    <div>
        <a href="../lessons/allLessons.php">
            <i class="fa-brands fa-leanpub"></i>
            <p>Lessons</p>
        </a>
    </div>
    <div>
        <a href="../articles/allArticles.php">
            <i class="fa-solid fa-newspaper"></i>
            <p>Articles</p>
        </a>
    </div>
    <div>
        <a href="../feedbacks/allFeedbacks.php">
            <i class="fa-solid fa-message"></i>
            <p>Feedbacks</p>
        </a>
    </div>
    <div>
        <a href="../tasks/allTasks.php">
        <i class="fa-solid fa-question"></i>
            <p>Tasks</p>
        </a>
    </div>
    <div>
        <a href="../../logout.php">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <p>Logout</p>
        </a>
    </div>
</div>
