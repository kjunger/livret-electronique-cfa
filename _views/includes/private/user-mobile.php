<div id="deconnexion-mobile">
    <p>
        <?php echo $userInfo['user']['prenom'] . ' ' . $userInfo['user']['nom']; ?>
    </p>
    <div id="contenu-menu-user">
        <ul>
            <li>
                <a href="">
                    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/icons/user_blanc.svg" alt="" />Profil
                </a>
            </li>
            <li>
                <a href="<?php echo FUNC_DIR; ?>/logout_process.php">
                    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/icons/deconnexion_blanc.svg" alt="" />Deconnexion
                </a>
            </li>
        </ul>
        <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/img/logo_univ_rouen.png" alt="Logo Université de Rouen" id="logo_univ_blanc" />
        <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/img/logo_iut_rouen.png" alt="Logo Composante" id="logo_etab_blanc" />
    </div>
    <div class="footer-menu">
        <div id="content-footer-menu">
            <ul>
                <li>
                    <a href="">Contact</a>
                </li>
                <li>
                    <a href="">Mentions légales</a>
                </li>
            </ul>
            <ul class="img-footer-menu">
                <li>
                    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/img/logo_region.png" alt="Logo Région Normandie" class="logo_region_menu" />
                </li>
                <li class="separateur">-
                </li>
                <li>
                    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/img/logo_ministere.png" alt="Logo Ministère de l'Enseignement Supérieur et de la Recherche" class="logo_ministere_menu" />
                </li>
            </ul>
        </div>
    </div>
</div>
