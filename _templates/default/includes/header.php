<header>
    <div class="bouton">
        <img src="_templates/default/assets/icons/bouton.svg" alt="" />
    </div>
    <a href="index.php"><img src="_templates/default/assets/img/header/logo.png" alt="Logo CFA-CFC" id="header-logo" /></a>
    <p>Bienvenue,
        <br/><span id="nom"><?php userName($db, $_SESSION['login'], $_SESSION['situation']); ?></span></p>
    <div id="user">
        <img src="_templates/default/assets/icons/user.svg" alt="" />
    </div>
    <div id="deconnexion" class="">
        <ul class="hidden">
            <li>
                <a href=""><img src="_templates/default/assets/icons/form.svg" alt="" />Profil</a>
            </li>
            <li class="separateur">-</li>
            <li>
                <a href="index.php?logout=1"><img src="_templates/default/assets/icons/form.svg" alt="" />Deconnexion</a>
            </li>
        </ul>
    </div>
</header>
