<?php
include('dashboard/function.php');
include('./header.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $question_id = $item_id;
        $answer = "'" . $_POST['answer'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $image =  $_FILES['image'];
        $Questions->addAnswer($user_id, $question_id, $answer, $description, $image);
    } elseif (isset($_POST['deleteItem'])) {
        $Questions->deleteAnswer($_POST['item_id']);
    } elseif (isset($_POST['edit_submit'])) {
        $answer_id = $_POST['item_id'];
        $user_id = $_SESSION['user_id'];
        $question_id = $item_id;
        $answer = "'" . $_POST['answer'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $image =  $_FILES['image'];
        $Questions->updateAnswer($answer_id, $user_id, $question_id, $answer, $description, $image);
    } elseif (isset($_POST['submitSign'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $User->signIn($email, $password);
    }
}
?>
<section class="pageBanner">
    <h3>Answer The Question</h3>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <?php
            foreach ($Questions->getData() as $Question) :
                if ($Question['id'] == $item_id) :
            ?>
                    <div class="questionDetailll">
                        <?php
                        if (isset($Question['image'])) {
                        ?>
                            <img src="uploads/questions/<?php echo $Question['image'] ?>" alt="">
                        <?php
                        }
                        ?>
                        <h3><?php echo $Question['question'] ?></h3>
                        <p><?php echo $Question['description'] ?></p>
                    </div>
            <?php
                endif;
            endforeach;
            ?>
            <div class="questionForm ">
                <form method="post" enctype="multipart/form-data">
                    <h3>Have An Answer ?</h3>
                    <input type="text" name="answer" placeholder="add Answer">
                    <textarea name="description" placeholder="Description" cols="30" rows="3"></textarea>
                    <input type="file" name="image">
                    <br>
                    <?php
                    if (isset($_SESSION['user_id'])) { ?>
                        <button name="submit">Add Answer</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" data-toggle="modal" data-target="#exampleModal">
                            Add Answer
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
            </div>
            <div class="questionsAll">
                <?php
                foreach ($Questions->getData('answers') as $Answer) :
                    if ($Answer['question_id'] == $item_id) :
                ?>
                        <div class="theDiv">
                            <?php
                            foreach ($User->getData() as $user) :
                                if ($Answer['user_id'] == $user['id']) { ?>
                                    <div class="d-flex align-items-center">
                                        <img src="uploads/users/<?php echo $user['avatar'] ?>" alt="" class="avatar">
                                        <h5><?php echo $user['name'] ?></h5>
                                    </div>
                            <?php
                                }
                            endforeach;
                            ?>
                            <div class="w-100 d-flex justify-content-between">
                                <div class="d-flex">
                                    <?php
                                    if (isset($Question['image'])) {
                                    ?>
                                        <img src="uploads/answers/<?php echo $Answer['image'] ?>" alt="" width="50px">
                                    <?php
                                    }
                                    ?>
                                    <div>
                                    <h3><?php echo  $Answer['answer'] ?></h3>
                                    <p><?php echo  $Answer['description'] ?></p>
                                    </div>

                                </div>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    if ($Answer['user_id'] == $_SESSION['user_id']) {
                                ?>
                                        <div>
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $Answer["id"] ?>" name="item_id">
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
                                                                    <h3>Edit Answer ?</h3>
                                                                    <input type="hidden" value="<?php echo $Answer["id"] ?>" name="item_id">
                                                                    <input type="text" name="answer" placeholder="add Answer" value="<?php echo $Answer["answer"] ?>">
                                                                    <textarea name="description" placeholder="Description" cols="30" rows="3"><?php echo $Answer["description"] ?></textarea>
                                                                    <input type="file" name="image">
                                                                    <br>
                                                                    <button name="edit_submit">Edit Answer</button>
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
                <?php
                    endif;
                endforeach;
                ?>

            </div>
        </div>
            <div class="col-md-3 col-sm-12 sideCourses">
                <?php
                foreach ($Questions->getLimitedData() as $Question) :
                ?>
                    <a href="questionDetail.php?id=<?php echo $Question['id'] ?>">
                        <div class="d-flex">
                            <img src="uploads/questions/<?php echo $Question['image'] ?>" alt="">
                            <h3><?php echo $Question['question'] ?></h3>
                        </div>
                    </a>
                <?php
                endforeach;
                ?>
            </div>
        </div>
</section>
<?php
include('./footer.php');
