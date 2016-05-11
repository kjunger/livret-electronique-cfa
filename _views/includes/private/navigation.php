<nav id="cssmenu">
    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/img/logo.png" alt="Logo CFA-CFC" id="menu-logo" />
    <ul>
        <li>
            <a href="index.php">
                <div class="accueil">Accueil</div>
            </a>
        </li>
        <li class="has-sub">
            <a href="#">
                <div class="form">Formulaires</div>
            </a>
            <ul>
                <?php form_links($userForms); ?>
            </ul>
        </li>
        <li class="has-sub">
            <a href="#">
                <div class="eval">Evaluations</div>
            </a>
            <ul>
                <?php eval_links($userForms); ?>
            </ul>
        </li>
        <li>
            <a href="index.php?cat=contrat">
                <div class="contrat">Contrat</div>
            </a>
        </li>
        <li>
            <a href="index.php?cat=fichiers">
                <div class="fichiers">Fichiers</div>
            </a>
        </li>
        <li>
            <a href="index.php?cat=contacts">
                <div class="contacts">Contacts</div>
            </a>
        </li>
    </ul>
</nav>
