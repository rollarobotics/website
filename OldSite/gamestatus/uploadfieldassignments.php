<?
require_once('security.inc');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>GameStatus - Field Assignments</title>
        <link rel="stylesheet" href="/orange.css" type="text/css"/>
        <link rel="stylesheet" href="gamestatus.css" type="text/css"/>
    </head>
    
    <body>
        <div>
        <form id="frmFieldAssignments" method="POST" action="" enctype="multipart/form-data">
        <div style="font-size:large">Upload field assignments</div>
        
        <input style="background-color:#D3D3D3" type="file" name="assignments" id="assignments" />
        <input type="submit" name="upload" value="Upload"/>
        <div style="font-size:large">Current assignments</div>
            <table border="1">
                <tr><th>Round</th><th>Field</th><th>Red</th><th>Blue</th></tr>            
<?
try {
// Create (connect to) SQLite database in file
    $dbfilename = 'gamestatus.sqlite3';
    
    $gs_db = new PDO("sqlite:$dbfilename");
    // Set errormode to exceptions
    $gs_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_FILES["assignments"]["error"] > 0) {
            echo '<div class="error" >Error: ' . $_FILES["assignments"]["error"] . "</div>";
        }
        else{
            move_uploaded_file($_FILES["assignments"]["tmp_name"],'lastassignment.csv');
            $row=1;
            if (($handle = fopen("lastassignment.csv", "r")) !== FALSE) {
                $gs_db->exec("delete from round_def");
                $insert = "INSERT INTO round_def (round_num, field_id, red1, red2, blue1, blue2) 
                VALUES (:round_num, :field_id, :red1, :red2, :blue1, :blue2)";
                $stmt = $gs_db->prepare($insert);
                $inserted=0;
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if ($row>1) {
                        $stmt->bindValue(':round_num', $data[0], SQLITE3_INTEGER);
                        $stmt->bindValue(':field_id', $data[1], SQLITE3_INTEGER);
                        $stmt->bindValue(':red1', $data[2], SQLITE3_TEXT);
                        $stmt->bindValue(':red2', $data[3], SQLITE3_TEXT);
                        $stmt->bindValue(':blue1', $data[4], SQLITE3_TEXT);
                        $stmt->bindValue(':blue2', $data[5], SQLITE3_TEXT);
                        $stmt->execute();
                        $inserted++;
                    }
                    $row++;
                }
                echo("Inserted: $inserted records.");
                fclose($handle);
            }
            else {
                echo("failed to open csv file.");
            }
        }
    }
    
    
    // Select all data from file db messages table 
    $result = $gs_db->query('SELECT field_id, round_num, red1, red2, blue1, blue2 FROM round_def');
    $num_rows = 0;
    foreach($result as $round) {
        
        $rowHtml =sprintf(
        '<tr class="assignment">
        <td>%d</td><td>%d</td>
        <td class="red">%s - %s</td><td class="blue">%s - %s</td>
        </tr>', $round[round_num], $round[field_id], $round[red1], $round[red2], $round[blue1], $round[blue2]);
        echo($rowHtml);
        $num_rows++;
    }
    if ($num_rows==0) {
        echo('<tr><td colspan="4">No assignments loaded.</td></tr>');
    }
    
}
catch(PDOException $e) {
    echo($e->getMessage());
}

?>
            </table>
            
        </form>
        <form method="get" action="">
            <input type="submit" name="refresh" value="Refresh"/>
        </form>
        </div>
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