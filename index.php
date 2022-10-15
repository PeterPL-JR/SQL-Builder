<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>SQL Builder</title>
</head>
<body>
    <?php
        if(!isset($_COOKIE['server']) || !isset($_COOKIE['username']) || !isset($_COOKIE['database'])) {
            header("Location: login.php");
        }
    ?>
</body>
</html>