
document.write(`


<nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1"> FindYourRecipe </span>
    
    <button class="btn btn-outline-success me-2" type="button"> 
        <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home"  height="30" width="30" title="Home">
    </button>
    
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
    <button class="btn btn-outline-success me-2" type="button"> 
        <img src="https://cdn-icons-png.flaticon.com/512/3502/3502685.png" alt="Kategorien"  height="30" width="30" title="Kategorien">
    </button>
    
    <div class="btn-group dropstart">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://bethanychurch.org.uk/wp-content/uploads/2018/09/profile-icon-png-black-6.png" alt="Konto" height="30" width="25" title="Konto">
      </button>
      <ul class="dropdown-menu">
        <li>
            <label>Benutzername: </label>
            <input type="text"  name="username" id="formUsername">
        </li>
        <li>
            <label>Passwort: </label>
            <input type="password"  name="password" id="formPassword">
        </li>
        <li>
            <button class="btn btn-outline-success me-2" type="button"> 
                Anmelden
            </button>
        </li>
        <li>
            Sie haben noch kein Account?
        </li>
        <li>
            <a class="dropdown-item" href="RegistrierSeite.php" style="color: #0d6efd"> Registrieren  </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item" href="ProfilSeite.php">Profil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
`);