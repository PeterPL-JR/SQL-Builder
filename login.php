<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>SQL Builder - Login</title>
    <link rel="stylesheet" href="styles/styles-login.css">
</head>
<body>
    <div id="container">
        <div id="logo">
            <img src="images/icon.png">
            <div><span>SQL Builder</span></div>
        </div>
        <div id="login-label">Login</div>
    </div>
    <form method="post">
        <div class="form-panel">
            <div class="name-div">Server</div>
            <div class="input-div">
                <input type="text" name="server" autocomplete="off">
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="form-panel">
            <div class="name-div">Username</div>
            <div class="input-div">
                <input type="text" name="username" autocomplete="off">
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="form-panel">
            <div class="name-div">Password</div>
            <div class="input-div">
                <input type="password" name="password" autocomplete="off">
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="form-panel">
            <div class="name-div">Database</div>
            <div class="input-div">
                <input type="text" name="database" autocomplete="off">
            </div>
            <div style="clear: both;"></div>
        </div>
        <button name="submit-btn">Zaloguj się</button>
    </form>

    <?php
    if (isset($_POST['submit-btn'])) {
        tryLogin();
    }
    function tryLogin()
    {
        $server = $_POST['server'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $database = $_POST['database'];

        $connection = mysqli_connect($server, $username, $password, $database);
        if (!mysqli_errno($connection)) {
            setcookie("server", $server);
            setcookie("username", $username);
            setcookie("password", $password);
            setcookie("database", $database);
            header("Location: index.php");
        }
    }
    ?>
</body>
</html>