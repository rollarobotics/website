<?
$loginUrl = '/gamestatus/login.php';
if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
    //header('Strict-Transport-Security: max-age=31536000');
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
session_start();
$_SESSION[redirect] = 'https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
if (!isset($_SESSION[CREATED]) || (isset($_SESSION[CREATED]) && (time() - $_SESSION['CREATED'] > 1440))) {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $loginUrl);
}
?>