<?php
session_start();

if (isset($_POST['username'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=regitra", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(':username', $_POST['username']);
        $statement->execute();
        $userdata = $statement->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['password'], $userdata['password'])) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['level'] = $userdata['level'];
            $_SESSION['last_login'] = date("Y-n-d H:m:s");
            setcookie("sausainis_username", $userdata['username'], time() + (86400 * 7), "/"); // 86400 = 1 day
            header("Location: index.php");
        } else {
            echo "Try again";
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}


//print_r($_SESSION);
//print_r($_POST);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title></title>
</head>
<body>

<div class="container">
    <div class="row pt-5">
        <div class="col"></div>
        <div class="col">
            <?php
            if (isset($_COOKIE["sausainis_username"])) {
                echo 'Labas, ' . $_COOKIE["sausainis_username"] . '';
            } else

            ?>

            <form action="" method="POST">
                <input class="form-control" type="text" name="username" placeholder="username">
                <input class="form-control" type="password" name="password" placeholder="password">
                <input class="btn btn-success btn-block form-group" type="submit" value="login">
            </form>
            <a class="btn btn-block btn-warning" href="register.php">Register</a>

        </div>
        <div class="col"></div>
    </div>
</div>

</body>
</html>