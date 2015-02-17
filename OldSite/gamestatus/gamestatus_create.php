<?
require_once('security.inc');



//Create database for game status

try {
// Create (connect to) SQLite database in file
    $dbfilename = 'gamestatus.sqlite3';
    
    $gs_db = new PDO("sqlite:$dbfilename");
    // Set errormode to exceptions
    $gs_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
 
 
    /**************************************
    * Create tables                       *
    **************************************/
    // Create field list

    // Create table field_status
    $gs_db->exec("CREATE TABLE IF NOT EXISTS field_status (
                    field_id INTEGER PRIMARY KEY, 
                    round_num INTEGER)");
    echo("Created field_status table.");
    
    $gs_db->exec("CREATE TABLE IF NOT EXISTS round_def (
                    field_id INTEGER, 
                    round_num INTEGER,
                    red1 TEXT,
                    red2 TEXT,
                    blue1 TEXT,
                    blue2 TEXT,
                    PRIMARY KEY (field_id, round_num))");                
    echo("Created round_def table.");                
    
    $gs_db->exec("DELETE FROM field_status");
    $gs_db->exec("INSERT INTO field_status (field_id, round_num) VALUES (1, NULL)");
    $gs_db->exec("INSERT INTO field_status (field_id, round_num) VALUES (2, NULL)");
                  
}
catch(PDOException $e) {
 // Print PDOException message
    echo $e->getMessage();

}