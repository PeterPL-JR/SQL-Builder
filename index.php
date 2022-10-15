<?php
    if(!isset($_COOKIE['server']) || !isset($_COOKIE['username']) || !isset($_COOKIE['database'])) {
        header("Location: login.php");
        return;
    }
    
    $server = $_COOKIE['server'];
    $username = $_COOKIE['username'];
    $database = $_COOKIE['database'];
    $password = (isset($_COOKIE['password'])) ? $_COOKIE['password'] : "";

    $connect = mysqli_connect($server, $username, $password, $database);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>SQL Builder</title>
</head>
<body>
    
</body>
</html>