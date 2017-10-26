<?php
session_start();


if (isset($_POST['register'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=regitra", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_POST['register_password'] == $_POST['repeat_password']
            && $_POST['register_password'] != "" && $_POST['repeat_password'] != ""
        ) {
            $statement = $conn->prepare("INSERT INTO users (username, password)
        VALUES (:username, :password)");

            $password = password_hash($_POST['register_password'], PASSWORD_DEFAULT);
            $statement->bindParam(':username', $_POST['register_username']);
            $statement->bindParam(':password', $password);
            $statement->execute();
            $smg = '<div class="alert alert-success"> User created! </div>';
            header("Location: login.php");
        } else {
            $smg = '<div class="alert alert-danger"> Passwords does not match </div>';
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title></title>
</head>
<body>

<div class="container">
    <div class="row pt-5">
        <div class="col"></div>
        <div class="col">
            <div id="register_alert"></div>
            <form action="" method="POST">
                <input class="form-control" type="text" id="register_username" name="register_username"
                       placeholder="username">
                <input id="password" class="form-control" type="password" name="register_password"
                       placeholder="password">
                <input id="password_repeat" class="form-control" type="password" name="repeat_password"
                       placeholder="repeat password">
                <input id="register_btn" class="btn btn-success btn-block form-group" name="register" type="submit"
                       value="register" disabled>
            </form>
            <div id="password_alert"></div>
        </div>
        <div class="col"></div>
    </div>
</div>
<script>
    password = document.getElementById('password');
    password_repeat = document.getElementById('password_repeat');
    alert = document.getElementById('password_alert');
    register_btn = document.getElementById('register_btn');

    password_repeat.addEventListener("keyup", check_form);
    password.addEventListener("keyup", check_form);
    $("#register_username").keyup(check_form);


    function check_form() {
        register_btn.disabled = false;
        $.get("register_submit.php",
            {
                check_username: $("#register_username").val()
            }, function (result) {
                if (result != "") {
                    $("#register_alert").html('');
                    $("#register_alert").append('<div class="alert alert-danger"> Username Taken </div>');
                    $("#register_btn").prop("disabled", true);
                } else {
                    $("#register_alert").html('');
                    $("#register_alert").append('<div class="alert alert-success"> Username Available </div>');

                }


            });

        if (password.value != password_repeat.value || password.value == "") {
            alert.innerHTML = '<div class="alert alert-danger">Passwords does not match </div>';
            register_btn.disabled = true;
        }
        else if (password.value == password_repeat.value) {
            alert.innerHTML = '<div class="alert alert-success">Passwords match </div>';
            //register_btn.disabled = false;


        }

    }
    /*    function check_password_repeat(result){
     if (password_repeat.value != password.value) {
     alert.innerHTML = '<div class="alert alert-danger">Passwords does not match </div>';
     register_btn.disabled = true;
     check_username(result);
     }
     else if(password_repeat.value == password.value)
     {
     alert.innerHTML = '<div class="alert alert-success">Passwords match </div>';
     register_btn.disabled = false;
     check_username(result);
     }
     }*/


</script>
</body>
</html>