<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

   // echo $_POST['name'];
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $confirmPassword = mysqli_real_escape_string($db,$_POST['confirm_password']);

    if ($password != $confirmPassword){
        header("Location: register.php?error=Confirm+password+not+matching");
    }
    $password= md5($password);
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if ($row){
        //user already exists
        header("Location: register.php?error=Email+Exists");
    } else {
        $query = "insert into users (email, name, password) values ('$email', '$name', '$password' )";
        $result = mysqli_query($db,$query);
        if ($result) {
            header("Location: login.php?message=Registration+Successful");
        } else if (mysqli_error($db)){
            $error = mysqli_error($db);
        }
    }
} else {
    $error = $_GET['error'];
}
?>
<html>

<head>
    <title>Register Page</title>

    <style type = "text/css">
        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
        }
        label {
            font-weight:bold;
            width:100px;
            font-size:14px;
        }
        .box {
            border:#666666 solid 1px;
        }
    </style>

</head>

<body bgcolor = "#FFFFFF">

<div align = "center">
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>

        <div style = "margin:30px">

            <form action = "" method = "post">
                <label>Name  :</label><input type = "text" name = "name" class = "box"/><br /><br />
                <label>Email  :</label><input type = "text" name = "email" class = "box"/><br /><br />
                <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                <label>Confirm :</label><input type = "password" name = "confirm_password" class = "box" /><br/><br />
                <input type = "submit" value = " Submit "/><br />
            </form>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </div>

    </div>

</div>

</body>
</html>