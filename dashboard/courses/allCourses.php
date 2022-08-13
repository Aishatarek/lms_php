<?php
include("../function.php");
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $course->deleteCourse($_POST['item_id']);
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
                <table class="table table-sm">
                    <a href="addCourse.php" class="addBTN"> <button>Add Course</button></a>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">img</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Price</th>
                            <th scope="col">Original Price</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($course->getData() as $coursee) :
                        ?>
                            <tr>
                                <td><?php echo $coursee['id']; ?></td>
                                <td><?php echo $coursee['name']; ?></td>
                                <td><?php echo $coursee['description']; ?></td>
                                <td><?php echo $coursee['author']; ?></td>
                                <td><img src="../../uploads/courses/<?php echo $coursee['img']; ?>" alt="" height="50px" width="50px"></td>
                                <td><?php echo $coursee['duration']; ?></td>
                                <td><?php echo $coursee['price']; ?></td>
                                <td><?php echo $coursee['original_price']; ?></td>
                                <td class="d-flex">
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $coursee["id"] ?>" name="item_id">
                                        <button name="deleteItem" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="updateCourse.php?id=<?php echo $coursee['id']; ?>"><button class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button></a>
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