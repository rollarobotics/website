<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>GameStatus - Field Update</title>
    </head>
    
    <body>
        <div style="font-size:large">Update field status</div>
        
        <form id="frmFieldStatus" method="POST" action="">
            <table border="1">
                <tr><th>Field Number</th><th>Current Round</th><th>Update</th></tr>            
<?
try {
// Create (connect to) SQLite database in file
    $dbfilename = 'gamestatus.sqlite3';
    
    $gs_db = new PDO("sqlite:$dbfilename");
    // Set errormode to exceptions
    $gs_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach($_POST[field] as $fid=>$round) {
            $gs_db->exec("UPDATE field_status SET round_num=$round WHERE field_id=$fid");
        }
    }
    
    
    // Select all data from file db messages table 
    $result = $gs_db->query('SELECT field_id, round_num FROM field_status');
 
    foreach($result as $field) {
        $current_round = $field[round_num];
        
        $rowHtml =sprintf(
        '<tr>
        <td>Field %d</td><td style="text-align:center">%d</td><td><input type="number" style="text-align:right;background-color:#E3E3E3;" name="field[%d]" value="%d" size="15"/></td>
        
        
        </tr>', $field[field_id], $current_round, $field[field_id], $current_round );
        echo($rowHtml);
    }
    
}
catch(PDOException $e) {
}

?>
            </table>
            <input type="submit" name="update" value="Update"/>
        </form>
        <form method="get" action="">
            <input type="submit" name="refresh" value="Refresh"/>
        </form>
        
    </body>
    
    
    
    
</html>


<?
//if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
//    echo("Not secure.");
//    //header('Strict-Transport-Security: max-age=31536000');
//    //header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//    exit();
//}
//else {
//    echo("Secure now.");    
//}
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