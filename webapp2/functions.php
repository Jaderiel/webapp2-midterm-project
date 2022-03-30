<?php

include 'config.php';

function getUserData($id){
    $array = array();
    $q = mysql_query("SELECT * FROM 'users' WHERE 'id'=". $id);
    while($row = mysql_fetch_assoc($q)){
        $array[$id] = 
    }
}

?>