<?php
if(isset($_POST['logout'])) {
    session_start();
    session_destroy();
    $_SESSION = null;
    header("location: login.php");
}