<?php
session_start();

if(isset($_POST['name'])){
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "students";

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM users WHERE name = :name");
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->execute();
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if($user_data['password'] == $_POST['password']) {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['admin'] = true;
            $_SESSION['last_login'] = date("Y-m-d H:m:s");
            print_r($_SESSION);
        } else {
            echo "try again!";
        }

} elseif(isset($_POST['logout'])){

    session_destroy();
    $_SESSION = null;
}

?>

<html>
<body>
    <form action="" method="POST">
        <input type="text" name="name"><br>
        <input type="password" name="password"><br>
        <input type="submit" value="login">
    </form>
    <form action="" method="POST">
        <input type="submit" name="logout"  value="logout">
    </form>
</body>
</html>
