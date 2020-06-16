<nav class="row navbar">
    <div class="offset-md-2 col-md-2"><a href="verb-list.php">Liste</a></div>
    <div class="col-md-2"><a href="configuration-test.php">Test</a></div>
    <div class="col-md-4">
        <form method="post" action="search.php">
            <label for="search">Rechercher:</label>
            <input type="search" name="search" id="search" class="search">
        </form>
    </div>
    <div class="dropdown show">
        <div class="col-md-2">
        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://img.icons8.com/windows/64/000000/user-male-circle.png"/>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="change-password.php">Changer mon mot de passe</a>
            <a class="dropdown-item" href="my-test.php?id="<?php echo $_SESSION['id'] ?>>Mes tests</a>
            <a class="dropdown-item" href="disconnect.php">Se déconnecter</a>
        </div>
    </div>
</nav>