<pre style="background-color:gray;padding:10px;">
<?php
session_start();

if(isset($_POST['username'])) {

    try {
        
        $conn = new PDO("mysql:host=localhost;dbname=regitra;charset=utf8", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(':username', $_POST['username']);
        $statement->execute();
        $user_data = $statement->fetch(PDO::FETCH_ASSOC);
    
    } catch(PDOException $e) {
	    echo $e->getMessage();
	}

    //print_r($user_data);

    if($user_data['password'] == $_POST['password'] && $_POST['password'] != "") {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['admin'] = true;
        $_SESSION['last_login'] = date("Y-m-d H:m:s");

        setcookie("sausainis_username", $user_data["username"], time() + (60 * 60 *24), "/"); // 86400 = 1 day
    } else {
        echo "Try again.<br>";
    }

} elseif(isset($_POST['logout'])) {
    session_destroy();
    $_SESSION = null;
}
print_r($_SESSION);

if (isset($_COOKIE["sausainis_username"])) {
   echo "Labas " . $_COOKIE["sausainis_username"];
}
?>
</pre>
<html>
    <body>
        <form method="POST">
            <input type="text" name="username"><br>
            <input type="password" name="password">
            <input type="submit" value="Login">
        </form>
        <form method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>

        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']) {
            echo "You are admin!!!!";
        }elseif (isset($_SESSION["level"]) && $_SESSION['level'] = 0) {
            echo "You are basic user";
        } else{
            echo "You are guest.Please login.";
        }
        ?>
    </body>
</html>