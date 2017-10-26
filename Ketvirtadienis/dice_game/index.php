<?php
if(isset($_POST['logout'])) {
    session_start();
    session_destroy();
    $_SESSION = null;
    header("location: login.php");
}
?>
<html>
<head>
    <title>Dice Game</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
        <h1>Start your dice GAME!</h1>
        </div>
        <div class="col">
            <form action="" method="POST">
                <button name="logout" class="btn btn-secondary mt-2">Logout</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="firstDice"><img class="picture1" src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Dice-1-b.svg";></div>
            <div id="secondDice"><img class="picture2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Dice-2-b.svg/500px-Dice-2-b.svg.png";></div>
            <div id="thirdDice"><img class="picture3" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Dice-3-b.svg";></div>
            <div><h3 id="status"></h3></div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <button id="startGame" class="btn btn-secondary sm">Start Game</button>
            <button id="roleDice" class="btn btn-secondary sm">Role the Dice!</button>
        </div>
    </div>
</div>





<script src="script.js"></script>
</body>
</html>
