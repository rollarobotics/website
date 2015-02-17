<?
if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
    echo("Not secure.");
    //header('Strict-Transport-Security: max-age=31536000');
    //header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
else {
    echo("Secure now.");    
}

//session_start();
//if (!isset($_SESSION['CREATED'])) {
//    $_SESSION['CREATED'] = time();
//}
//else if (time() - $_SESSION['CREATED'] > 1440) {
//    // session started more than 24 minutes ago
//    session_regenerate_id(true);    // change session ID for the current session an invalidate old session ID
//    $_SESSION['CREATED'] = time();  // update creation time
//}




?>