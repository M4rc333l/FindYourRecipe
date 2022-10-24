<?php
function connect(){
    $con = new PDO("mysql:host=localhost;dbname=hshl","php","12345678");

    $sql = "SELECT Benutzername FROM user";
    if($sql->execute()){
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        if(count($result)>0){
            return "OK";
        }
        else{
            return "NOTOK";
        }
    }
    /*foreach ($pdo->query($sql) as $row) {
        echo $row['Benutzername']." "."<br />";
    }*/
}
function close(){

}

