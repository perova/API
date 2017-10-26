

<pre style="background-color:gray;padding:10px;">
	<?php
	session_start();

	if(isset($_POST['name'])) {

		try {

			$conn = new PDO("mysql:host=localhost;dbname=regitra;charset=utf8", "root", "");
        // set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $conn->prepare("SELECT * FROM users WHERE name = :name");
			$statement->bindParam(':name', $_POST['name']);
			$statement->execute();

			$user_data = $statement->fetch(PDO::FETCH_ASSOC);

			} catch(PDOException $e) {
				echo $e->getMessage();
			}

    //print_r($user_data);

		if($user_data['password'] == $_POST['password'] && $_POST['password'] != "") {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['admin'] = true;
        $_SESSION['last_login'] = date("Y-m-d H:m:s");
        setcookie("sausainis_username", $user_pass["name"], time() + (60 * 60 *24), "/"); // 86400 = 1 day
        header("Location: index.php");
    } else {
    	echo "Try again.<br>";
    }

}
//print_r($_SESSION);

if (isset($_COOKIE["sausainis_username"])) {
	echo "Labas " . $_COOKIE["sausainis_username"];
}
?>
</pre>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Login</h1>
				<form method="POST">
					<input class="form-control" type="text" name="name" placeholder="Username"><br>
					<input class="form-control" type="password" name="password" placeholder="Password">
					<input class="btn btn-success" type="submit" value="Login">

				</form>
				<a href="register.php">Register</a>
			</div>
		</div>
	</div>


      <!--   <?php 
        // if(isset($_SESSION['admin']) && $_SESSION['admin']) {
        //     echo "You are admin!!!!";
        // }elseif (isset($_SESSION["level"]) && $_SESSION['level'] = 0) {
        //     header("Location:index.php");
        // } else{
        //     echo "You are guest.Please login.";
        // }
      ?> -->
  </body>
  </html>