<?php
include('dashboard/function.php');
include('./header.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $question = "'" . $_POST['question'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $image =  $_FILES['image'];
        $Questions->addQuestion($user_id, $question, $description, $image);
    } elseif (isset($_POST['deleteItem'])) {
        $Questions->deleteQuestion($_POST['item_id']);
    } elseif (isset($_POST['edit_submit'])) {
        $question_id = $_POST['item_id'];
        $user_id = $_SESSION['user_id'];
        $question = "'" . $_POST['question'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $image =  $_FILES['image'];
        $Questions->updateQuestion($question_id, $user_id, $question, $description, $image);
    } elseif (isset($_POST['submitSign'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $User->signIn($email, $password);
    }
}
?>
<section class="pageBanner">
    <h3>Ask Question</h3>
</section>
<section class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-12 questionForm">
                <form method="post" enctype="multipart/form-data">
                    <h3>Have A Question ?</h3>
                    <input type="text" name="question" placeholder="Ask A Question">
                    <textarea name="description" placeholder="Description" cols="30" rows="3"></textarea>
                    <input type="file" name="image">
                    <br>
                    <?php
                    if (isset($_SESSION['user_id'])) { ?>
                        <button name="submit">Add Question</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="WishBtn" data-toggle="modal" data-target="#exampleModal">
                            Add Question
                        </button>
                    <?php
                    }
                    ?>
                </form>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Sign In</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="theform">
                                    <form action="" method="POST">
                                        <h3>First Sign In</h3>
                                        <input type="email" placeholder="Email" name="email" required>
                                        <input type="password" placeholder="Password" name="password" required>
                                        <input type="submit" name="submitSign" class="btn">
                                        <p>Don't have an account? <a href="register.php">Register Here</a>.</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="questionsAll">
                    <?php
                    foreach ($Questions->getData() as $Question) :
                    ?>
                        <div class="theDiv">
                            <?php
                            foreach ($User->getData() as $user) :
                                if ($Question['user_id'] == $user['id']) {
                            ?>
                                    <div class="d-flex align-items-center">
                                        <img src="uploads/users/<?php echo $user['avatar'] ?>" alt="" class="avatar">
                                        <h5><?php echo $user['name'] ?></h5>
                                    </div>
                            <?php
                                }
                            endforeach;
                            ?>
                            <div class="d-flex">
                                <?php
                                if (isset($Question['image'])) {
                                ?>
                                    <a href="questionDetail.php?id=<?php echo $Question['id'] ?>">
                                        <img src="uploads/questions/<?php echo $Question['image'] ?>" alt="" class="Qimg">
                                    </a>
                                <?php
                                }
                                ?>
                                <div class="w-100 d-flex justify-content-between">
                                    <a href="questionDetail.php?id=<?php echo $Question['id'] ?>">
                                        <h3><?php echo $Question['question'] ?></h3>
                                        <p><?php echo $Question['description'] ?></p>
                                    </a>
                                    <?php
                                    if (isset($_SESSION['user_id'])) {
                                        if ($Question['user_id'] == $_SESSION['user_id']) {
                                    ?>
                                            <div>
                                                <form method="post">
                                                    <input type="hidden" value="<?php echo $Question["id"] ?>" name="item_id">
                                                    <button name="deleteItem" class="payBtn" type="submit"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                                <button type="button" class="payBtn" data-toggle="modal" data-target="#exampleModal">
                                                    Edit
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Sign In</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="theform">
                                                                    <form method="post" enctype="multipart/form-data">
                                                                        <h3>Edit Question ?</h3>
                                                                        <input type="hidden" value="<?php echo $Question["id"] ?>" name="item_id">
                                                                        <input type="text" name="question" placeholder="Ask A Question" value="<?php echo $Question["question"]; ?>">
                                                                        <textarea name="description" placeholder="Description" cols="30" rows="3"><?php echo $Question["description"]; ?></textarea>
                                                                        <input type="file" name="image">
                                                                        <br>
                                                                        <button name="edit_submit">Edit Question</button>
                                                                    </form>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>

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
include('./footer.php');
