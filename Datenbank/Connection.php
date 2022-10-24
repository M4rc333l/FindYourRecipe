<?php
function connect(){
    $pdo = new PDO('mysql:host=193.175.248.182;dbname=robert.darminow', 'robert.darminow', 'z06QkjHa');

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

