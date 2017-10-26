<?php
$target_dir = "uploads/";
$target_file = $target_dir . date("y-m-d h-m-s") . basename($_FILES["fileToUpload"]["name"]);
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (isset($_POST["submit"])) {
    if ($fileType != "csv") {
        header("Location: index.php");
    } else {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $myfile = fopen($target_file, "r") or die("Unable to open file!");
        while (!feof($myfile)) {
            $data[] = explode(',', fgets($myfile));
        }
        fclose($myfile);
        foreach ($data as $key) {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=students;charset=utf8", "root", "");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $statement = $conn->prepare("INSERT INTO cars (owner, license, model, make)
      VALUES (:owner, :license, :model, :make)");
                // variantas 1
                $statement->bindParam(':owner', $key[0]);
                $statement->bindParam(':license', $key[1]);
                $statement->bindParam(':model', $key[2]);
                $statement->bindParam(':make', $key[3]);
                $statement->execute();
                // variantas 2
                // $statement->execute($_POST);
                $conn = null;
            } catch (PDOException $e) {
            }
        }
        header("Location: index.php");
    }
}
?>