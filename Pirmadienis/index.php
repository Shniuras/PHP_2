<?php
//try {
//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $database = "students";
//
//    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $stmt = $conn->query("SELECT * FROM users");
//    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//    $conn = null;
//
//} catch(PDOException $e) {
//    echo $stmt . "<br>" . $e->getMessage();
//}
//?>
<!doctype html>
<html lang="en">
<head>
    <title>AJAX!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Users</h1>
    </div>
    <div class="row">
        <div class="col">
            <h3>List</h3>
            <input id="filter" class="form-control" id="myInput" type="text" placeholder="Search..">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Number</th>
                </thead>
                <tbody id="user_table_body">
                    <?php
 /*                       foreach($users as $user) {
                            echo "<tr>

                                  <td>".$user['name']."</td>
                                  <td>".$user['surname']."</td>
                                  <td>".$user['email']."</td>
                                  <td>".$user['number']."</td>
                                  </tr>";
                        }*/
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h1>Register</h1>
            <div id="alert"></div>
            <form method="POST">
                <div class="input-group">
                    <input id="form_name" class="form-control" type="text" name="name" placeholder="Name">
                </div></br>
                <div class="input-group">
                    <input id="form_surname" class="form-control" type="text" name="surname" placeholder="Surname">
                </div></br>
                <div class="input-group">
                    <input id="form_email" class="form-control" type="email" name="email" placeholder="Email">
                </div></br>
                <div class="input-group">
                    <input id="form_number" class="form-control" type="text" name="number" placeholder="Phone number">
                </div></br>
<!--                <div class="input-group">-->
<!--                    <input class="btn btn-darken" type="submit" name="submit">-->
<!--                </div></br>-->
<!--                <div class="input-group">-->
<!--                    <input onclick="add()" class="btn btn-darken" type="button" value="add">-->
<!--                </div></br>-->
                <div class="input-group">
                    <input id="ajax_post" class="btn btn-darken" type="button" value="Ajax Post">
                </div></br>
            </form>
        </div>
    </div>
</div>
<script src="script.js"> </script>
</body>
</html>