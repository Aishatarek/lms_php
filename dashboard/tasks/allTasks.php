<?php
include("../function.php");
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../Home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $Tasks->deleteTask($_POST['item_id']);
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
                <a href="addTask.php" class="addBTN"> <button>Add Task</button></a>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">question</th>
                            <th scope="col">description</th>
                            <th scope="col">lesson</th>
                            <th scope="col">course</th>
                            <!-- <th scope="col">choice 1</th>
                            <th scope="col">choice 2</th>
                            <th scope="col">choice 3</th>
                            <th scope="col">choice 4</th> -->
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($Tasks->getData() as $task) :
                        ?>

                            <tr>
                                <td><?php echo $task['id']; ?></td>
                                <td><?php echo $task['text']; ?></td>
                                <td><?php echo $task['description']; ?></td>
                                <td><?php
                                    foreach ($Lesson->getData() as $lesson) {
                                        if ($lesson['id'] == $task['lesson_id']) {
                                            echo $lesson['name'];
                                        }
                                    }
                                    ?>
                                </td>
                                <!-- <?php
                                //     foreach ($Tasks->getData('taskanswers') as $Answer) {
                                //         for ($i=0; $i <=4 ; $i++) { 
                                //         if ($Answer['question_id'] == $task['id']) {
                                //             ?>
                                //             <td><?php // echo $Answer['text']; ?></td>
                                //             <?php
                                //         }else{
                                //             ?>
                                //             <td><?php // echo $Answer['text']; ?></td>
                                //             <?php
                                //         }
                                //     }
                                // }
                                ?> -->
                                <td>
                                    <?php
                                    foreach ($Lesson->getData() as $lesson) {
                                        if ($lesson['id'] == $task['lesson_id']) {
                                            foreach ($course->getData() as $coursee) {
                                                if ($coursee['id'] == $lesson['course_id']) {
                                                    echo $coursee['name'];
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $task["id"] ?>" name="item_id">
                                        <button name="deleteItem" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="updateTask.php?id=<?php echo $task['id']; ?>"><button class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="taskDetail.php?id=<?php echo $task['id']; ?>"><button class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></button></a>

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