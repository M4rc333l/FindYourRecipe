$sqlCreateRezept = "CREATE TABLE Rezept\n" +
    "(\n" +
    "    RezeptID int PRIMARY KEY AUTO_INCREMENT,\n" +
    "    Rezept_User_ID int NOT Null,\n" +
    "    FOREIGN KEY(Rezept_User_ID)\n" +
    "    REFERENCES user(UserID),\n" +
    "    Bild BLOB,\n" +
    "    Kategorien varchar(512),\n" +
    "    Beliebtheit int,\n" +
    "    Zubereitung varchar(4096),\n" +
    "    Name varchar(128),\n" +
    "    Zutaten varchar(512)\n" +
    ")";
$sqlCreateKategorie = "CREATE TABLE Kategorie\n" +
    "(\n" +
    "    KategorieID int PRIMARY KEY AUTO_INCREMENT,\n" +
    "    Name varchar(128)\n" +
    ")";
$sqlAddKategorie = "INSERT INTO Kategorie (Kategorie.Name) VALUES ('Vegan'), ('Vegetarisch'), ('Fisch'), ('Fleisch'), ('Kalorienarm'), ('Glutenfrei') ";
$sqlCreateRezeptKategorie = "CREATE TABLE RezeptKategorie(\n" +
    "    RezeptKategorieID int PRIMARY KEY AUTO_INCREMENT,\n" +
    "    RezeptKategorie_KategorieID int not NULL ,\n" +
    "    RezeptKategorie_RezeptID int not NUll,\n" +
    "    FOREIGN KEY(RezeptKategorie_KategorieID)\n" +
    "    REFERENCES Kategorie(KategorieID),\n" +
    "    FOREIGN KEY(RezeptKategorie_RezeptID)\n" +
    "    REFERENCES Rezept(RezeptID)\n" +
    ")";
$sqlCreateUser = "CREATE TABLE User\n" +
    "(\n" +
    "    UserID int PRIMARY KEY AUTO_INCREMENT,\n" +
    "    Name varchar(128)\n" +
    "    Passwort varchar(128)\n" +
    ")";
$sqlAddUser = "INSERT INTO User (User.Benutername, User.Passwort, User.FavoritenRezept) VALUES ('Robert', 'Darminow', '0')"
$sqlAddRezept = "INSERT INTO Rezept (Rezept.Rezept_User_ID, Rezept.Bild, Rezept.Kategorien, Rezept.Beliebtheit, Rezept.Zubereitung, Rezept.Name, Rezept.Zutaten) \n" +
    "VALUES (1, NULL, \"Deutsch, Vegan\", 0, \" 5 Kartoffeln schälen\", \"Salat\", \"5 Kartoffeln\")"
$sqlAddFavoritenRezept = "";
$sqlUserRezepte = "Select Rezept.Name , Rezept.Zutaten From User, Rezept Where Rezept.Rezept_User_ID = User.UserID;";
