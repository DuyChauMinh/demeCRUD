<?php
include '../db.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        //save to database
        // added user_id
        // $user_id = random_num(20);
        $query = "insert into users (user_name,password) values ('$user_name','$password')";

        mysqli_query($conn, $query);

        header('Location: login.php');
        die();
    } else {
        echo 'Please enter some valid information!';
    }
}
?>

<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>

	<div id="box">
	<main class="container p-4">
  <div class="row">
    <div class="col-lg-4">			
		<form method="post">
			<div><h1 style="text-align:center">Signup</h1></div>

			<input id="text" type="text" name="user_name" class="form-control"><br>
			<input id="text" type="password" name="password" class="form-control"><br>

			<div class="d-grid gap-2 ">
			<input id="button" type="submit" value="Signup" class='btn btn-primary btn-warning' ><br>
			</div>

			<a href="login.php">Click to Login</a>
		</form>
		</div>
</div>

</main>
</div>
</body>
</html>