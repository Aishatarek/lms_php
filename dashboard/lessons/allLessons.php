<?php
include("../function.php");
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $Lesson->deleteLesson($_POST['item_id']);
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
               <a href="addLesson.php" class="addBTN"> <button>Add Lesson</button></a>

            <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description </th>
                            <th scope="col">Course Id</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($Lesson->getData() as $lesson) :
                        ?>

                            <tr>
                                <td><?php echo $lesson['id']; ?></td>
                                <td><?php echo $lesson['name']; ?></td>
                                <td><?php echo $lesson['description']; ?></td>
                                <td><?php echo $lesson['course_id']; ?></td>
                                <td>
                                    <?php
                                    foreach ($course->getData() as $coursee) :
                                        if ($coursee['id'] == $lesson['course_id']) :
                                            echo $coursee['name'];
                                        endif;
                                    endforeach;
                                    ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $lesson["id"] ?>" name="item_id">
                                        <button name="deleteItem" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="updateLesson.php?id=<?php echo $lesson['id']; ?>"><button class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button></a>
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