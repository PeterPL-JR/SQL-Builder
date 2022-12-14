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
                <input type="text" name="server" autocomplete="off" value="localhost" readonly>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="form-panel">
            <div class="name-div">Username</div>
            <div class="input-div">
                <input type="text" name="username" autocomplete="off" value="<?php get_default('username');?>">
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
                <input type="text" name="database" autocomplete="off" value="<?php get_default('database');?>">
            </div>
            <div style="clear: both;"></div>
        </div>
        <?php
        if (isset($_POST['submit-btn'])) {
            try_login();
        }
        function try_login() {
            $server = $_POST['server'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $database = $_POST['database'];

            if(empty($username) && empty($database)) {
                print_error("Pola '<b>username</b>' i '<b>database</b>' są puste");
                return;
            } else if(empty($username)) {
                print_error("Pole '<b>username</b>' jest puste");
                return;
            } else if(empty("$database")) {
                print_error("Pole '<b>database</b>' jest puste");
                return;
            }

            try {
                mysqli_connect($server, $username, $password, $database);
                setcookie("server", $server);
                setcookie("username", $username);
                setcookie("password", $password);
                setcookie("database", $database);
                header("Location: index.php");
            } catch(Exception) {
                print_error("Odmowa dostępu dla <b>$username</b>@<b>$server</b>");
            }
        }
        function print_error($message) {
            echo "<p class='error'>$message</p>";
        }

        function get_default($name) {
            if(isset($_POST[$name])) echo $_POST[$name];
        }
        ?>
        <button name="submit-btn">Zaloguj się</button>
    </form>
    <script>
        const usernameInput = document.getElementsByName("username")[0];
        const passwordInput = document.getElementsByName("password")[0];
        const databaseInput = document.getElementsByName("database")[0];
        const error = document.querySelector(".error");

        function removeError(event) {
            if(event.key != "Enter") {
                error.remove();
            }
        }

        usernameInput.onkeydown = function(event) {
            removeError(event);
        }
        passwordInput.onkeydown = function(event) {
            removeError(event);
        }
        databaseInput.onkeydown = function(event) {
            removeError(event);
        }

    </script>
</body>
</html>