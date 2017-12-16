<?php
    require("config.php");
    unset($_SESSION['user']);
    unset($_SESSION['playing']);
    unset($_SESSION['flag']);
    header("Location: index.php");
    die("Redirecting to: index.php");
?>
