<!-- Required meta tagss -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Test -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registrieren</title>
    <style>
        body
        {
            font-size: 16px;
            background-color: white;
        }

        form
        {
            width: 300px;
            border: 2px solid rgb(0, 0, 0);
            box-shadow: 1px 1px 1px rgb(114, 114, 114), 2px 2px 3px rgba(0, 0, 128, 0.52);
            border-radius: 5px;
            margin: 3em;
            padding: 2em;
            background-color: rgb(152, 152, 155);
            width: 80%;
        }

        input
        {
            border-style: solid;
            border-width: 1px;
            font-size: 180%;
            padding-top: 2%;
            padding-bottom: 3%;
            font-family: Verdana;
            display: flex;
            width: 100%;
        }

        label
        {
            font-size: 180%;
            padding-top: 2%;
            padding-bottom: 3%;
            font-family: Verdana;
        }

        .send-button
        {
            background-color: rgb(19, 19, 115);
            color: rgb(255, 250, 240);
            padding: 3%;
            font-family: Tahoma, sans-serif;
            border-radius: 3%;
            margin-top: 1%;
            margin-left: 40%;
            font-size: 170%;
            border: 2px inset rgba(128, 128, 128, 0.4);
            width: 15%;
        }

        .send-button:hover
        {
            box-shadow: 1px 1px 3px 1px rgba(169, 169, 169, 0.6);
            background-color: rgba(11, 11, 117, 0.62);
            cursor: pointer;
        }

        #box
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*TODO: Scrollbar entfernen*/

        #überschrift
        {
            text-align: center;
            color: black;
            margin-top: 1%;
        }

    </style>

</head>
<body>
<h1 id="überschrift"> Registrierformular </h1>
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

        <input class="send-button" type="button" value="Senden" onclick=getInputValue() id="RegisterButton">
        <script>
            function getInputValue(){
                let b = document.getElementById("formUsername").value.toString().toLowerCase();
                let p = document.getElementById("formPassword").value.toString();
                let bLetters = b.replace(/[^a-z]/g,"").length;
                if(b.length>5 && b.length<17 && bLetters+b.replace(/[^0-9]/g,"").length===b.length && bLetters>4 && p.length>5){
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
            }
        </script>
    </form>
</div>
</body>
</html>