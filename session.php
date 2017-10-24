<?php

session_start();






if (isset($_POST['username'])) {


try {
    $conn = new PDO("mysql:host=localhost;dbname=regitra;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    
        $statement = $conn->prepare("SELECT * FROM users WHERE username IS :username");
        $statement->bindParam(':username', htmlspecialchars('username'));
        $statement->execute($_POST);
        $response['message'] = ['type' => 'success','body' => 'Car was added'];

   
    
    $conn = null;
} catch(PDOException $e) {
    $response['message'] = ['type' => 'danger','body' => $e->getMessage()];
}






	// if($_POST['username'] =="Rita"){


	// 	if($_POST['password'] == "slaptas"){
	// 		$_SESSION['username'] = $_POST['username'];
	// 		$_SESSION['admin'] = true;
	// 		$_SESSION['last_login'] = "2017-10-24 12:00";

	// 	}else{ 

	// 		echo "Wrong username or password";
	// 	}

	// }else {
	// 		echo "Wrong username or password";
		
}
	}elseif (isset($_POST['logout'])) {

		session_destroy();

		$_SESSION = null;

	}
	print_r($_SESSION);

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
		<title>Session</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Session</h1>
					<form method="POST">
						<input class="form-group" type="text" name="username">
						<input class="form-group" type="password" name="password">	
						<input class="btn btn-success" type="submit" value="Login">
					</form>	
					<form method="POST">
						<input class="btn btn-danger" type="submit" name="logout" value="Logut">
					</form>
				</div>
			</div>
		</div>
		<?php 
		if ($_SESSION['admin']) {
			echo "YOU ARE ADMIN";
		}
		?>	
	</body>
	</html>