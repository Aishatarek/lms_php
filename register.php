<?php

include('dashboard/function.php');

ob_start();


if (isset($_SESSION['username'])) {
    header("Location: Home.php");
}
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
                if (file_exists("uploads/users/" . $filename)) {
                    echo $filename . " is already exists.";
                } else {
                    $result = move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/users/" . $filename);
                    echo "Your file was uploaded successfully.";
                }
            } else {
                echo "Error: There was a problem uploading your file. Please try again.";
            }
            if ($result) {
                $username = "'" . $_POST['username'] . "'";
                $email = "'" . $_POST['email'] . "'";
                $password = "'" . md5($_POST['password']) . "'";
                $cpassword = "'" . md5($_POST['cpassword']) . "'";
                $avatarr = "'" . $filename . "'";
                $role = "'user'";
                if ($password == $cpassword) {

                    $User->Register($username, $email, $password, $avatarr, $role);
                } else {
                    echo "<script>alert('Password Not Matched.')</script>";
                }
            }
        } else {
            echo "Error: " . $_FILES["image"]["error"];
        }
    }
}
include("./header.php");
?>
<section class="pageBanner">
    <h3>Profile</h3>
</section>
<div class="theform w-50">
<div>
		<img src="images/book-2-440x440.jpg" alt="">
	</div>
    <form action="" method="POST" enctype="multipart/form-data">
        <h3>Register</h3>
        <input type="text" placeholder="Username" name="username" required>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="password" placeholder="Confirm Password" name="cpassword" required>
        <input type="file" name="image" required>
		<input type="submit" name="submit" class="btn">

    </form>
</div>
<?php
include("./footer.php");

?>