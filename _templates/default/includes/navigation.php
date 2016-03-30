<nav id="cssmenu">
    <img src="_templates/default/assets/img/logo.png" alt="Logo CFA-CFC" id="menu-logo"/>
    <ul>
        <li>
            <a href="index.php"><div class="accueil">Accueil</div></a>
        </li>
        <li>
            <a href="index.php?cat=eval"><div class="eval">Evaluation</div></a>
        </li>
        <li class="has-sub">
            <a href="#"><div class="form">Formulaires</div></a>
            <ul>
                <?php subLinks($db, 'form'); ?>
            </ul>
        </li>
        <li>
            <a href="index.php?cat=contrat"><div class="contrat">Contrat</div></a>
        </li>
        <li>
            <a href="index.php?cat=fichiers"><div class="fichiers">Fichiers</div></a>
        </li>
    </ul>
</nav>
