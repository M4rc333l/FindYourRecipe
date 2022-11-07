
<?php
    function OpenCon()
    //www.phpmyadmin.co
     {
     $dbhost = "database-1.cn1qejqxue78.eu-central-1.rds.amazonaws.com";
     $dbuser = "admin";
     $dbpass = "RI7lnd2VfajM";
     $db = "FindYourRecipe";
     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

     return $conn;
     }

    function CloseCon($conn)
     {
     $conn -> close();
     }

?>


