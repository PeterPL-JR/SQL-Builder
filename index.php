<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>SQL Builder</title>
</head>
<body>
    <?php
        if(!isset($_COOKIE['host']) || !isset($_COOKIE['user']) || !isset($_COOKIE['password']) || !isset($_COOKIE['db'])) {
            header("Location: login.php");
        }
    ?>
</body>
</html>