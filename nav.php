<nav class="row navbar">
    <div class="col-md-2 col-sm-2"><a href="verb-list.php" class="menu-link">Liste</a></div>
    <div class="col-md-2 col-sm-2"><a href="configuration-test.php" class="menu-link">Test</a></div>
    <div class="col-md-3 col-sm-4">
        <form method="post" action="search.php">
            <input type="search" name="search" id="search" class="form-control search" placeholder="Recherche...">
        </form>
    </div>
    <div class="dropdown show">
        <div class="col-md-2 col-sm-2">
        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://img.icons8.com/windows/64/000000/user-male-circle.png"/>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="change-password.php">Changer mon mot de passe</a>
            <a class="dropdown-item" href="test-records.php">Mes tests</a>
            <a class="dropdown-item" href="disconnect.php">Se déconnecter</a>
        </div>
    </div>
</nav>
