<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registrieren</title>
    <style>
        body
        {
            background: url("https://cdn.discordapp.com/attachments/1023935776163119175/1051851552056414228/Hintergrund_Fuenf_Prozent.png");
        }
        form
        {
            border: 10px solid rgb(177, 234, 255);
            box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-image: linear-gradient(to right, rgb(177, 234, 255), rgb(156, 206, 241)) 1;
            padding: 2em;
            width: 50%;
            background-color: white;
        }
        input
        {
            border-style: solid;
            border-width: 1px;
            font-size: 90%;
            padding-top: 2%;
            padding-bottom: 3%;
            font-family: Verdana;
            display: flex;
            width: 100%;
        }
        label
        {
            font-size: 105%;
            font-weight: bold;
            padding-top: 2%;
            font-family: Verdana;
        }
        .send-button
        {
            background-color: rgb(177, 234, 255, 0.5);
            border: 2px inset rgba(128, 128, 128, 0.4);
            color: lightgray;
            font-family: Tahoma, sans-serif;
            font-size: 100%;
            width: 5%;
            padding: 1% 2%;
            margin-bottom: 1%;
            margin-top: 2%;
            margin-left: 38%;
            padding-right: 13%;
            padding-left: 5%;
        }
        .send-button:hover
        {
            box-shadow: 1px 1px 3px 1px rgba(169, 169, 169, 0.6);
            background-color: rgb(177, 234, 255);
            color: black;
            cursor: pointer;
        }
        #box
        {
            display: flex;
            justify-content: center;
            margin-top: 5%;
        }
        #überschrift
        {
            margin: 20px;
            margin-left: 50px;
            font-size: 50px;
            font-weight: bold;
            box-shadow: 0 4px 8px 0 rgba(0, 150, 255, 0.2), 0 6px 20px 0 rgba(0, 150, 255, 0.19);
            background-color: white;
        }
    </style>
</head>
<body>

<h1 id="überschrift"> Registrierformular </h1>

<!--Registrierformular-Komponenten-->
<div id="box">
    <form action ="" method="post" id="RegisterForm">
        <div>
            <label>Benutzername: </label>
            <input type="text"  name="username" id="formUsername">
        </div>
        <div>
            <label>Passwort: </label>
            <input type="password"  name="password" id="formPassword" >
        </div>
        <label>Passwort bestätigen: </label>
        <input type="password"  name="passwordBesteatigen" id="formPasswordBesteatigen" >

        <input class="send-button" type="button" value="Senden" onclick=getInputValue() id="RegisterButton">
    </form>
</div>

<script>
    function getInputValue(){
        let b = document.getElementById("formUsername").value.toString().toLowerCase();
        let p = document.getElementById("formPassword").value.toString();
        let pBesteatigung = document.getElementById("formPasswordBesteatigen").value.toString();
        let bLetters = b.replace(/[^a-z]/g,"").length;
        if(b.length>5 && b.length<17 && bLetters+b.replace(/[^0-9]/g,"").length===b.length
            && bLetters>4 && p.length>5 && (p === pBesteatigung)){
            document.getElementById("RegisterForm").action="SignIn.php";
            document.getElementById("RegisterButton").type="submit";
        }
        else if(bLetters+b.replace(/[^0-9]/g,"").length!==b.length){
            window.alert("Der Benutzername darf nur Buchstaben und Zahlen enthalten");
        }
        else if(b.length>=17){
            window.alert("Der Benutzername darf nur aus maximal 16 Zeichen bestehen");
        }
        else if(b.length<6){
            window.alert("Der Benutzername muss aus mindestens 6 Zeichen bestehen");
        }
        else if(bLetters<5){
            window.alert("Der Benutzername muss mindestens 5 Buchstaben enthalten");
        }
        else if(p.length<=5){
            window.alert("Das Passwort muss aus mindestens 6 Zeichen bestehen");
        }
        else if (p !== pBesteatigung){
            window.alert("Das Passwort und Passwort bestätigen ist nicht identisch");
        }
    }
</script>
</body>
</html>