<?php 
    include("conf2.php");    
    

        $query = sprintf("insert into mailchecked (time) values ('%s')",  
                            time());    
                           //echo $query;    
        $result = mysql_query($query);
    
?>