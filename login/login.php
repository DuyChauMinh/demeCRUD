<?php
include '../db.php';
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['id'] = $user_data['id'];
                    header('Location: index.php');
                    die();
                }
            }
        }

        echo 'wrong username or password!';
    } else {
        echo 'wrong username or password!';
    }
}
?>


<?php include '../includes/header.php'; ?>

	<div id="box">
<main class="container p-4">
  <div class="row">
    <div class="col-lg-4">		
		<form method="post">
			<div><h1 style="text-align:center">Login</h1></div><br>
			<input id="text" type="text" name="user_name" class="form-control" ><br>
			<input id="text" type="password" name="password" class="form-control"><br>
		<div class="d-grid gap-2 ">
			<input id="button" type="submit" value="Login" class='btn btn-primary' ><br><br>
			</div>
			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</div>

</main>
</div>
</body>
</html>