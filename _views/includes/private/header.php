<header class="header-<?php echo $_SESSION['type']; ?>">
    <div class="bouton">
        <div class="x">
        </div>
        <div class="y">
        </div>
        <div class="z">
        </div>
    </div>
    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/img/logo.png" alt="Logo CFA-CFC" id="header-logo" />
    <p>
        Bienvenue,
        <br/>
        <span id="nom">
        <?php echo $userInfo['user']['prenom'] . ' ' . $userInfo['user']['nom']; ?>
    </span>
    </p>
    <div id="user">
        <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/icons/user.svg" alt="" />
    </div>
    <button id="bouton-deconnexion">
    </button>
    <button id="bouton-menu-user">
    </button>
    <div id="deconnexion" class="">
        <ul class="hidden">
            <li>
                <a href="">
                    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/icons/user.svg" alt="" />Profil
                </a>
            </li>
            <li class="separateur">-
            </li>
            <li>
                <a href="<?php echo FUNC_DIR; ?>/logout_process.php">
                    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/icons/deconnexion.svg" alt="" />Deconnexion
                </a>
            </li>
        </ul>
    </div>
</header>

