<?php
session_start();
$errorMessage = '';
if(isset($_POST['name'])){
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "students";

        $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userLevel = 1;

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO users (name, password, level)
                                    VALUES (:name, :password, :level)");
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':password', $userPassword);
        $stmt->bindParam(':level', $userLevel);
        $stmt->execute();
        header("location: index.php");
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $errorMessage = "Vartotojas tokiu vardu jau egzistuoja";
        } else {
            $errorMessage = $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
<div class="container-fluid">
    <?php if (!empty($errorMessage)) :?>
        <div class="row">
            <div class="col alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="" method="POST" id="registerForm" class="register">
                <br>
                <h2>Register</h2>
                <div id="alert2"></div>
                <br>
                <div class="input-group">
                    <input name="name" class="form-control" type="text" placeholder="Username">
                </div>
                <div class="input-group">
                    <input id="pass" name="password" class="form-control" type="password" required="required" placeholder="Password">
                </div>
                <div class="input-group">
                    <input id="pass2" class="form-control" type="password" required="required" placeholder="Repeat Password">
                </div>
                <br>
                <div class="input-group">
                    <input id="register" class="btn btn-lg btn-primary btn-block" type="submit" value="Register new user">
                </div>

            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<script type="text/javascript" src="register.js"></script>
</body>
</html>