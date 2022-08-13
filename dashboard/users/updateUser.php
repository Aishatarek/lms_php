<?php
include('../function.php');
ob_start();
if ($_SESSION['role'] != 'admin' || !isset($_SESSION['role'])) {
    header("Location: ../../Home.php");
}
$item_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
            $filename = rand(0, 1000) . $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
            if (in_array($filetype, $allowed)) {
                if (file_exists("../../uploads/users/" . $filename)) {
                    echo $filename . " is already exists.";
                } else {
                    $result = move_uploaded_file($_FILES["image"]["tmp_name"], "../../uploads/users/" . $filename);
                    echo "Your file was uploaded successfully.";
                }
            } else {
                echo "Error: There was a problem uploading your file. Please try again.";
            }
            if ($result) {
                $username = "'" . $_POST['username'] . "'";
                $email = "'" . $_POST['email'] . "'";
                $avatarr = "'" . $filename . "'";
                $role =  "'" . $_POST['role'] . "'";
                $User->updateUser($item_id, $username, $email, $avatarr, $role);
            }
        } else {
            $username = "'" . $_POST['username'] . "'";
            $email = "'" . $_POST['email'] . "'";
            $avatarr = $_FILES['image'];
            $role =  "'" . $_POST['role'] . "'";
            $User->updateUser($item_id, $username, $email, $avatarr, $role);
        }
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
                <?php
                foreach ($User->getData() as $user) :
                    if ($user['id'] == $item_id) :
                ?>
                        <div class="theform">
                            <div>
                                <img src="../../uploads/users/<?php echo  $user['avatar']; ?>" alt="">
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <h3>Update User</h3>
                                <input type="text" placeholder="Username" name="username" value="<?php echo  $user['name']; ?>">
                                <input type="email" placeholder="Email" name="email" value="<?php echo  $user['email']; ?>">

                                <input type="file" name="image">
                                <select name="role">

                                    <option value="admin" <?php
                                                            if ($user['role'] == 'admin')
                                                                echo 'selected';
                                                            ?>>Admin</option>
                                    <option value="user" <?php
                                                            if ($user['role'] == 'user')
                                                                echo 'selected'
                                                            ?>>User</option>


                                </select>
                                <input type="submit" name="submit" class="btn">
                            </form>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
<?php
include("../../footer.php");

?>