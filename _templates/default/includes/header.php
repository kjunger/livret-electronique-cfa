<header>
    <div class="bouton">
        <div class="x">
        </div>
        <div class="y">
        </div>
        <div class="z">
        </div>
    </div>
    <img src="_templates/default/assets/img/logo.png" alt="Logo CFA-CFC" id="header-logo" />
    <p>
        Bienvenue,
        <br/>
        <span id="nom">
      <?php echo $_SESSION['userInfos']['user']['name']; ?>
    </span>
    </p>
    <div id="user">
        <img src="_templates/default/assets/icons/user.svg" alt="" />
    </div>
    <button id="bouton-deconnexion">
    </button>
    <button id="bouton-menu-user">
    </button>
    <div id="deconnexion" class="">
        <ul class="hidden">
            <li>
                <a href="">
                    <img src="_templates/default/assets/icons/user.svg" alt="" />Profil
                </a>
            </li>
            <li class="separateur">-
            </li>
            <li>
                <a href="index.php?logout=1">
                    <img src="_templates/default/assets/icons/deconnexion.svg" alt="" />Deconnexion
                </a>
            </li>
        </ul>
    </div>
</header>
