<?php
//try {
//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $database = "students";
//    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $stmt = $conn->prepare("DELETE * FROM students WHERE id = :name");
//    $stmt->bindParam(':name', $_POST['name']);
//    $stmt->execute();
//    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
//} catch (PDOException $e) {
//    echo $e->getMessage();
//}