document.write(`

<form>
  <!-- Navigationsleiste -->

  <!-- Logo -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" >FindYourRecipe
    <!-- Home -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="HomeSeite.html"><img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home"  height="30" width="30" title="Home">
            <span class="sr-only">(current)</span></a>
        </li>

        <!-- Suchleiste -->
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pizza, Burger, ..." aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <!-- Kategorien -->
        <li class="nav-item">
          <a class="nav-link" href="KategorieSeite.html"><img src="https://cdn-icons-png.flaticon.com/512/3502/3502685.png" alt="Kategorien"  height="30" width="30" title="Kategorien"></a>
        </li>

        <!-- Profil -->
        <li>
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="https://bethanychurch.org.uk/wp-content/uploads/2018/09/profile-icon-png-black-6.png" alt="Konto"  height="30" width="30" title="Konto">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">

                <div class="form-group">
                  <label for="exampleDropdownFormEmail2">Email address</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword2">Password</label>
                  <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
                <br>Sie haben noch kein Account!
                <a class="dropdown-item" href="#" style="color: #0d6efd"> registrieren  </a>

              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="ProfilSeite.html">Profil</a>
            </div>
          </div>
        </li>

      </ul>

    </div>
  </nav>
</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

`);