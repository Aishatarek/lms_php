<?php
ob_start();
include('dashboard/function.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $student_id = $_SESSION['user_id'];
        $course_id =  $item_id;
        $content = "'" . $_POST['content'] . "'";
        $feedbacks->addFeedback($student_id, $course_id, $content);
    } elseif (isset($_POST['courseOrderSubmit'])) {
        $course_id =  $item_id;
        $stu_id = $_SESSION['user_id'];
        $course_order->addCourseOrder($course_id, $stu_id);
    } elseif (isset($_POST['submitSign'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $User->signIn($email, $password);
    }
}
if (count($course_order->getData('course_order')) > 0) {
    $ordered = $course_order->getOrderId($course_order->getData('course_order'));
} else {
    $ordered = [];
}
if (count($Cart->getData('cart')) > 0) {
    $in_cart = $Cart->getCartId($Cart->getData('cart'));
} else {
    $in_cart = [];
}
if (count($Cart->getData('wishlist')) > 0) {
    $in_wishList = $Cart->getCartId($Cart->getData('wishlist'));
} else {
    $in_wishList = [];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['addToCart_submit'])) {
        if (in_array($item_id, $in_wishList)) {
            $Cart->saveToCart($_POST['item_id']);
        } else {
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
    if (isset($_POST['wishlist-submit'])) {
        if (in_array($item_id, $in_cart)) {
            $Cart->saveForLater($_POST['item_id']);
        } else {
            $Cart->addToWishList($_POST['user_id'], $_POST['item_id']);
        }
    }
}
//is in the cart
if (count($Cart->getData('cart')) > 0) {
    $in_cart = $Cart->getCartId($Cart->getData('cart'));
} else {
    $in_cart = [];
}
//is in the wishlist
if (count($Cart->getData('wishlist')) > 0) {
    $in_wishList = $Cart->getCartId($Cart->getData('wishlist'));
} else {
    $in_wishList = [];
}
include("./header.php");
?>
<?php
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
                        <img src=" ./uploads/courses/<?php echo $coursee["img"] ?>" alt="" width="100%">
                        <ul class="nav nav-pills mb-3 itemsss" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Instructor</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane descc fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <p><?php echo $coursee['description'] ?></p>
                                <p><span>Duration: </span><?php echo $coursee['duration'] ?></p>
                            </div>
                            <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                <p><?php echo $coursee['author'] ?></p>
                            </div>
                            <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
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
                        <div class="courselink">
                            <?php
                            if (isset($_SESSION['username'])) {
                                if (in_array($coursee['id'], $ordered)) { ?>
                                    <a href="courseDetail.php?id=<?php echo $coursee['id'] ?>" class="payBtn">Show</a>
                                    <?php } else {
                                    if ($coursee['price'] == 0) {
                                    ?>
                                        <form method="POST">
                                            <button type="submit" name="courseOrderSubmit" class="payBtn">
                                                Enroll
                                            </button>
                                        </form>
                                    <?php
                                    } else { ?>
                                        <a href="addPayment.php" class="payBtn">pay</a>
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?php echo $coursee['id']; ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                            <?php
                                            if (in_array($coursee['id'], $in_cart)) {
                                                echo '<button  disabled class="inCartBtn">In the Cart</button>';
                                            } else {
                                                echo '<button type="submit" class="cartBtn"  name="addToCart_submit" >Add to Cart</button>';
                                            }
                                            ?>
                                        </form>
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?php echo $coursee['id']; ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                            <?php
                                            if (in_array($coursee['id'], $in_wishList)) {
                                                echo '<button  disabled class="inWishBtn"><i class="fas fa-heart"></i></button>';
                                            } else {
                                                echo '<button type="submit" class="WishBtn" name="wishlist-submit" ><i class="far fa-heart"></i></button>';
                                            }
                                            ?>
                                        </form>
                                    <?php
                                    }
                                }
                            } else {
                                if ($coursee['price'] == 0) { ?>
                                    <button type="button" class="cartBtn" data-toggle="modal" data-target="#exampleModal">
                                        Enroll
                                    </button>
                                <?php
                                } else { ?>
                                    <button type="button" class="payBtn" data-toggle="modal" data-target="#exampleModal">
                                        Pay
                                    </button>

                                    <button type="button" class="cartBtn" data-toggle="modal" data-target="#exampleModal">
                                        add to cart
                                    </button>
                                    <button type="button" class="WishBtn" data-toggle="modal" data-target="#exampleModal">
                                        <i class="far fa-heart"></i>
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
                            <?php }
                            }
                            ?>
                        </div>
                        <form method="post" enctype="multipart/form-data" class="feedbackForm">
                            <h3>Add Your Feedback</h3>
                            <textarea name="content" rows="8"></textarea>
                            <button name="submit">add Feedback</button>
                        </form>
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
include('footer.php');
?>