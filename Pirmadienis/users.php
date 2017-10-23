<?php

header ("Content-type:application/json");

if(isset($_POST['name']) && $_POST['name'] != "") {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "students";

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO users (name, surname, email, number) VALUES (:name, :surname, :email, :number)");
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':surname', $_POST['surname']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':number', $_POST['number']);
        $stmt->execute();
        $conn = null;

        $response['message'] = ['type' => 'success', 'body'=>'New record created successfully'];

    } catch (PDOException $e) {
        $response['message'] = ['type' => 'danger','body' => $e->getMessage()];
    }
} else {
    $response['message'] = ['type' => 'warning','body' => 'No user data to submit'];
}
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "students";

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_GET['filter'])) {
            $stmt = $conn->query("SELECT * FROM users WHERE Id>".$_GET['filter']);
            $response['users'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $stmt = $conn->query("SELECT * FROM users");
            $response['users'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $conn = null;

    } catch (PDOException $e) {
        $response['message'] = ['type' => 'danger','body' =>  $e->getMessage()];
    }
    echo json_encode($response);

