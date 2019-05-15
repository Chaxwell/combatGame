<nav class="navbar navbar-dark bg-dark">
    <span class="navbar-brand mb-0 h1 mr-auto">Combat Gaymu</span>
    <?php
    if (isset($_SESSION['userId'])) {
        require('partials/creer-personnage.php');
        printf('
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            %s
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="partials/deconnexion.php">Déconnexion</a>
            </div>
        </div>
        ', $_SESSION['nickname']);
    } else {
        require('partials/connexion-inscription.php');
    }
    ?>
</nav>