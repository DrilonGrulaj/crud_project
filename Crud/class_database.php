<?php
class Database{
function db_connection(){
    $db_servername = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "project_db";
    
    $result = mysqli_connect($db_servername, $db_user, $db_pass, $db_name);
}
}

?>