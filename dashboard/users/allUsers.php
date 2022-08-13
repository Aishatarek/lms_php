<?php
include("../function.php");
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem'])) {
        $User->deleteUser($_POST['item_id']);
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
                <a href="addUser.php" class="addBTN"> <button>Add User</button></a>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Role</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($User->getData() as $user) :
                        ?>

                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><img src="../../uploads/users/<?php echo $user['avatar']; ?>" alt="" height="50px" width="50px"></td>
                                <td><?php echo $user['role']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $user["id"] ?>" name="item_id">
                                        <button name="deleteItem" class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="updateUser.php?id=<?php echo $user['id']; ?>"><button class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></button></a>

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