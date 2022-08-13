<?php
ob_start();
include('dashboard/function.php');

if (isset($_SESSION['username'])) {
	header("Location: Home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$User->signIn($email, $password);
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
	<form action="" method="POST">
		<h3>Welcome Back</h3>
		<input type="email" placeholder="Email" name="email" required>
		<input type="password" placeholder="Password" name="password" required>
		<input type="submit" name="submit" class="btn">
		<p>Don't have an account? <a href="register.php">Register Here</a>.</p>
	</form>

</div>
<?php
include("./footer.php");

?>