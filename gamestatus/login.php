<?
session_start();
if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
    //header('Strict-Transport-Security: max-age=31536000');
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminUser = "bulldog";
    $adminPass = "r0b0ts!";
    $auth = false;
    $logout = false;
    if (isset($_POST[logout])) {
        session_destroy();
        session_start();
        $logout=true;
    }
    else {
        if (isset($_POST[username]) && isset($_POST[password])) {
            if ($_POST[username] ==$adminUser && $_POST[password] == $adminPass) {
                $_SESSION[CREATED] = time();
                $auth=true;
                if (isset($_SESSION[redirect])) {
                    header("Location: " . $_SESSION[redirect]);
                }
            }
        }
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html>
    <head>
        <title>GameStatus - Login</title>
    </head>
    <body>
        <form action="" method="POST">
            <div>Enter admin username and password</div>
            <div>Username: <input name="username" maxlength="50"/></div>
            <div>Password: <input type="password" name="password" maxlength="50"/></div>
            
            <?
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if ($logout) {
                        echo('Logged out.');
                        echo('<input type="submit" name="submit" value="Login"/>');
                    }
                    else {
                        if ($auth) {
                            echo("Login successful.");
                            echo('<input type="submit" name="logout" value="Log Out"/>');
                        }
                        else {
                            echo("Login failed.");
                            echo('<input type="submit" name="submit" value="Login"/>');
                        }
                    }
                }
                else {
                    if (isset($_SESSION[CREATED]) && (time() - $_SESSION['CREATED'] < 1440)) {
                        echo("Logged in as admin.");
                        echo('<input type="submit" name="logout" value="Log Out"/>');
                    }
                    else {
                        echo(time() - $_SESSION['CREATED'] < 1440);
                        echo("Not logged in.");
                        echo('<input type="submit" name="submit" value="Login"/>');
                    }
                }            
            ?>
            
        </form>
    </body>
</html>