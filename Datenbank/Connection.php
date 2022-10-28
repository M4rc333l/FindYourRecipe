
<?php
    function OpenCon()
    //www.phpmyadmin.co
     {
     $dbhost = "sql7.freesqldatabase.com";
     $dbuser = "sql7529981";
     $dbpass = "qIjeRMjKrU";
     $db = "sql7529981";
     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

     return $conn;
     }

    function CloseCon($conn)
     {
     $conn -> close();
     }

?>


