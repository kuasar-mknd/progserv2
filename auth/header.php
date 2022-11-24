<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand">Exemple d'authentification PHP</a>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="add_event.php">Ajouter un event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_member.php">Ajouter un membre</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav ml-auto">
                <?php if (!isset($_SESSION["is_logged"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Créer un compte</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>