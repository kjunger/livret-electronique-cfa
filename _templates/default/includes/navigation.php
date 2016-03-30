<nav id="cssmenu">
    <ul>
        <li>
            <a href="index.php" id="<?php if (!isset($_GET['cat'])) { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/accueil.svg" alt="Accueil" class="icn" />Accueil</a>
        </li>
        <li>
            <a href="index.php?cat=eval" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='eval') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/eval.svg" alt="Evaluation" class="icn" />Evaluation</a>
        </li>
        <li class="has-sub">
            <a href="#" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='form') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/form.svg" alt="Formulaires" class="icn" />Formulaires</a>
            <ul>
                <?php subLinks($db, 'form'); ?>
            </ul>
        </li>
        <li>
            <a href="index.php?cat=contrat" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='contrat') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/contrat.svg" alt="Contrat" class="icn" />Contrat</a>
        </li>
        <li>
            <a href="index.php?cat=fichiers" id="<?php if (isset($_GET['cat']) && $_GET['cat']=='fichiers') { echo 'actif'; } ?>"><img src="_templates/default/assets/icons/fichiers.svg" alt="Fichiers" class="icn" />Fichiers</a>
        </li>
    </ul>
</nav>
