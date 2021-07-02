<nav class="navbar navbar-expand-sm navbar-light bg-dark">
    <a class="navbar-brand text-white" href="<?php echo WEB_ROOT ?>">GESTION DES ARTICLES</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php if(is_connect()):?>
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo is_client()?  WEB_ROOT."?controller=security&page=accueil.client":WEB_ROOT."?controller=security&page=accueil.admin"?>">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <?php endif ?>
            <?php if(is_admin()):?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo WEB_ROOT."?controller=security&page=show.users"?>">Liste des utilisateurs</a>
            </li>
            <?php endif ?>
            <?php if(is_admin()):?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo WEB_ROOT."?controller=reservation&page=show.reservation.encours"?>">Réservations</a>
            </li>
            <?php endif ?>
            <?php if(is_client()):?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo WEB_ROOT."?controller=reservation&page=show.reservation.client"?>">Mes Réservations</a>
            </li>
            <?php endif ?>
        </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php if(!is_connect()):?>
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo WEB_ROOT."?controller=security&page=inscription"?>">Inscription<span class="sr-only">(current)</span></a>
            </li>
            <?php endif ?>
            <?php if(!is_connect()):?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo WEB_ROOT."?controller=security&page=login"?>">Connexion</a>
            </li>
            <?php endif ?>
            <?php if(is_connect()):?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo WEB_ROOT."?controller=security&page=logout"?>">Deconnexion</a>
            </li>
            <?php endif ?>
        </ul>
    </div>
</nav>