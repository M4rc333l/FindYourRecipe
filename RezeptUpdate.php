<?php
session_start();
$dbh = new PDO('mysql:host=34.65.206.124;dbname=FindYourRecipe',"root","RI7lnd2VfajM");
$rezept_ID = $_GET['id'];
$stmt = $dbh->prepare("Select * From Rezept where RezeptID = ?");
$stmt->bindParam(1,$rezept_ID);
$stmt->execute();
$row = $stmt->fetch();
?>
<!-- Required meta tags -->
<!DOCTYPE html>
<html>
<head>
    <title> Rezept erstellen </title>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


    <style>
        #rezeptbildUpload
        {
            opacity: 0.5;
            margin-left: 20px;
            margin-top: 1%;
        }

        #einrücken
        {
            margin-left: 38%;
        }

        .überschrift
        {
            font-size: 20px;
            font-weight: bold;
            margin-top: 2%;
        }

        .unten
        {
            display: flex;
        }

        #button
        {
            margin-left: 15%;
            margin-bottom: 1%;
        }
    </style>
</head>
<body>
<!-- JS Datei für NavBar -->
<script  src="NavBar.php" > </script>
<div id="einrücken">

    <!-- Rezeptbild -->
    <!--   <input type="image" id="rezeptbildUpload" src="https://uxwing.com/wp-content/themes/uxwing/download/video-photography-multimedia/upload-image-icon.png" alt="Rezeptbild hochladen" width="200px" height="190px"> -->
    <img id="preview" width="300" height="300" src="<?php  echo "uploads/".$row['Bildname']?>">
    <form action="Update.php?id=<?php echo $row['RezeptID']?>"method="post" id="rezepterstellen" enctype="multipart/form-data">

        <input
            type="file" id="bild" name="bild" accept=".jpg, .jpeg, .png, .jfif"
            onchange="prieviewImage();"
        />


        <!-- Rezeptname -->
        <div class="überschrift">
            <label> Rezeptname </label>
            <input type="text" class="unten" name="rezeptname" size="30%" value=<?php echo $row["Name"] ?>>
        </div>

        <!-- Dauer -->
        <div class="überschrift">
            <label> Dauer </label>
            <input type="text" class="unten" name="dauer" size="30%" value=<?php echo $row["Dauer"] ?>>
        </div>

        <!-- Zutaten -->
        <!-- TODO: Schöneres Feld (bei Enter => neues Eingabefeld) -->
        <div class="überschrift">
            <label> Zutaten </label>
            <textarea name="zutaten" class="unten" rows="5" cols="40"> <?php echo $row["Zutaten"] ?></textarea>
        </div>

        <!-- Zubereitung -->
        <div class="überschrift">
            <label> Zubereitung </label>
            <textarea name="zubereitung" class="unten" rows="5" cols="40" > <?php echo $row["Zubereitung"] ?></textarea>
        </div>

        <!-- Kategorien -->
        <div>
            <label class="überschrift"> Kategorien </label>
            <ul style="list-style-type:none;">
                <li>
                    <?php if($row["Kategorien"] == "Vegan"){
                        echo    '<input type="checkbox" value="" id="firstCheckbox" name="Vegan" checked>
                                <label for="firstCheckbox" > Vegan </label>';
                    }
                    else{
                        echo   '<input type="checkbox" value="" id="firstCheckbox" name="Vegan">
                              <label for="firstCheckbox" > Vegan </label>';
                    }
                        ?>

                </li>
                <li>
                    <?php if($row["Kategorien"] == "Vegetarisch"){
                        echo    '<input type="checkbox" value="" id="firstCheckbox" name="Vegetarisch" checked>
                                <label for="firstCheckbox" > Vegetarisch </label>';
                    }
                    else{
                        echo   '<input type="checkbox" value="" id="firstCheckbox" name="Vegetarisch">
                              <label for="firstCheckbox" > Vegetarisch </label>';
                    }
                    ?>
                </li>
                <li>
                    <?php if($row["Kategorien"] == "Fisch"){
                        echo    '<input type="checkbox" value="" id="firstCheckbox" name="Fisch" checked>
                                <label for="firstCheckbox" > Fisch </label>';
                    }
                    else{
                        echo   '<input type="checkbox" value="" id="firstCheckbox" name="Fisch">
                              <label for="firstCheckbox" > Fisch </label>';
                    }
                    ?>
                </li>
                <li>
                    <?php if($row["Kategorien"] == "Fleisch"){
                        echo    '<input type="checkbox" value="" id="firstCheckbox" name="Fleisch" checked>
                                <label for="firstCheckbox" > Fleisch </label>';
                    }
                    else{
                        echo   '<input type="checkbox" value="" id="firstCheckbox" name="Fleisch">
                              <label for="firstCheckbox" > Fleisch </label>';
                    }
                    ?>
                </li>
                <li>
                    <?php if($row["Kategorien"] == "Glutenfrei"){
                        echo    '<input type="checkbox" value="" id="firstCheckbox" name="Glutenfrei" checked>
                                <label for="firstCheckbox" > Glutenfrei </label>';
                    }
                    else{
                        echo   '<input type="checkbox" value="" id="firstCheckbox" name="Glutenfrei">
                              <label for="firstCheckbox" > Glutenfrei </label>';
                    }
                    ?>
                </li>
                <li>
                    <?php if($row["Kategorien"] == "Kalorienarm"){
                        echo    '<input type="checkbox" value="" id="firstCheckbox" name="Kalorienarm" checked>
                                <label for="firstCheckbox" > Kalorienarm </label>';
                    }
                    else{
                        echo   '<input type="checkbox" value="" id="firstCheckbox" name="Kalorienarm">
                              <label for="firstCheckbox" > Kalorienarm </label>';
                    }
                    ?>
                </li>
            </ul>
        </div>

        <!-- Fertig-Button -->
        <div>
            <input type="submit" id="button" name="button" value="Fertig">
        </div>
    </form>
</div>
</div>


</body>
<script>
    function prieviewImage(){
        var file = document.getElementById("bild").files;
        if(file.length > 0){
            var fileReader = new FileReader();
            fileReader.onload = function (event){
                document.getElementById("preview").setAttribute("src", event.target.result);
            };
            fileReader.readAsDataURL(file[0]);
        }

    }
</script>
</html>