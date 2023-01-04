<?php
session_start();
echo '
document.write(`
<nav class="navbar" style="background-color: rgba(204,242,255,255);">
  <div class="container-fluid">
  <!--Projektlogo-->
    <span class="navbar-brand mb-0 h1"> FindYourRecipe </span>
    <!--Homebutton-->
    <a class="btn btn-outline-success me-2" href="HomeSeite.php"> 
        <img src="https://cdn.discordapp.com/attachments/900294647514017862/1054102455740284948/Hausi-neu.png" alt="Home"  height="30" width="30" title="Home">
    </a>
    <!--Suchleiste mit Button-->
    <form class="d-flex" role="search" method="post" action="RezeptSuchen.php">
      <input class="form-control me-2" type="search" placeholder="Pizza, Burger, ..." aria-label="search" name="search">
      <button class="btn btn-outline-success" type="submit">Suchen</button>
    </form>
    <!--Kategorie Button-->
    <a class="btn btn-outline-success me-2" href="KategorieSeite.php"> 
        <img src="https://cdn.discordapp.com/attachments/900294647514017862/1054099268836790272/Kategorie_ausgemalt4.png" alt="Kategorien"  height="30" width="30" title="Kategorien">
    </a>
    ';
    if(!isset($_SESSION['id'])){
        echo '
        <!--Dropdown-Menü ohne Anmeldung-->
        <div class="btn-group dropstart" >
        <form class="d-flex" action ="SignIn.php" method ="post">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn.discordapp.com/attachments/900294647514017862/1054106682025857044/Profil1.png" alt="Konto" height="30" width="25" title="Konto">
          </button>
          <ul class="dropdown-menu" style="padding: 10%;">
            <li>
                <label>Benutzername: </label>
                <input type="text"  name="username2" id="formUsername">
            </li>
            <li style="padding-top: 5%;">
                <label>Passwort: </label>
                <input type="password"  name="password2" id="formPassword">
            </li>
            <li style="padding-top: 5%;">
                <button class="btn btn-outline-success me-2" type="submit"> 
                    Anmelden
                </button>
            </li>
            <li style="padding-top: 5%; padding-left: 2%;">
                Sie haben noch keinen Account?
            </li>
            <li style="padding-top: 5%; padding-rigth: 2%;">
                <a class="dropdown-item" href="RegistrierSeite.php" style="color: #0d6efd"> Registrieren  </a>
            </li
          </ul>
        </form>
    </div>
        ';
    }
    else {
        echo '
        <!--Dropdown-Menü mit Anmeldung-->
        <div class="btn-group dropstart">
        <form class="d-flex" action = "SignOut.php" method = "post">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn.discordapp.com/attachments/900294647514017862/1054106682025857044/Profil1.png" alt="Konto" height="30" width="25" title="Konto">
          </button>
          <ul class="dropdown-menu">
            <li style="padding: 5%;">
                <button class="btn btn-outline-success me-2" type="submit"> 
                    Abmelden
                </button>
            </li>
            <li>
                <a class="dropdown-item" href="ProfilSeite.php">Profil</a>
            </li>
          </ul>
        </form>
    </div>
        ';
    }
    echo '
  </div>
</nav>
`);
';