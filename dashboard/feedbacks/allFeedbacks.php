<?php
include("../function.php");
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $feedbacks->deleteFeedback($_POST['item_id']);
    }
}
include("../headerr.php");
?>
<section class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-12 sideNavv">
                <?php
                include('../sideNavv.php');
                ?>
            </div>
            <div class="col-md-10 col-sm-12">
                <a href="addFeedback.php" class="addBTN"> <button>Add Feedback</button></a>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Id</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Course Id</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Feedback</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($feedbacks->getData() as $feedback) :
                        ?>

                            <tr>
                                <td><?php echo $feedback['id']; ?></td>
                                <td><?php echo $feedback['student_id']; ?></td>
                                <td>
                                    <?php
                                    foreach ($User->getData() as $user) :
                                        if ($user['id'] == $feedback['student_id']) :
                                            echo $user['name'];
                                        endif;
                                    endforeach;
                                    ?>
                                </td>
                                <td><?php echo $feedback['course_id']; ?></td>
                                <td>
                                    <?php
                                    foreach ($course->getData() as $coursee) :
                                        if ($coursee['id'] == $feedback['course_id']) :
                                            echo $coursee['name'];
                                        endif;
                                    endforeach;
                                    ?>
                                </td>
                                <td><?php echo $feedback['content']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $feedback["id"] ?>" name="item_id">
                                        <button name="deleteItem" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="updateFeedback.php?id=<?php echo $feedback['id']; ?>"><button class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                </td>
                            </tr>

                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");
?>