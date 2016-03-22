<div class="bouton">
    <img src="_assets/icons/bouton.svg" alt="" />
</div>
<a href="index.php"><img src="_assets/img/header/logo.png" alt="Logo CFA-CFC" id="header-logo" /></a>
<p>Bienvenue,
    <br/><?php
        switch($_SESSION['situation']){
            case "apprenti":
                $name=$db->query("select prenomApprenti, nomApprenti from apprenti where loginApprenti='".$_SESSION['login']."';");
                $answer=$name->fetchAll();
                if(count($answer)==1){
                    echo '<span id="nom">'.$answer[0]['prenomApprenti'].' '.$answer[0]['nomApprenti'];
                }
                break;
            case "maitreapprentissage":
                $name=$db->query("select prenomMaitreApprentissage, nomMaitreApprentissage from maitreapprentissage where loginMaitreApprentissage='".$_SESSION['login']."';");
                $answer=$name->fetchAll();
                if(count($answer)==1){
                    echo '<span id="nom">'.$answer[0]['prenomMaitreApprentissage'].' '.$answer[0]['nomMaitreApprentissage'].'</span>';
                }
                break;
            case "tuteurpedagogique":
                $name=$db->query("select prenomTuteurPedagogique, nomTuteurPedagogique from tuteurpedagogique where loginTuteurPedagogique='".$_SESSION['login']."';");
                $answer=$name->fetchAll();
                if(count($answer)==1){
                    echo '<span id="nom">'.$answer[0]['prenomTuteurPedagogique'].' '.$answer[0]['nomTuteurPedagogique'].'</span>';
                }
                break;
        }
    ?></p>
<div id="user">
    <img src="_assets/icons/user.svg" alt="" />
</div>
<div id="deconnexion" class="">
    <ul class="hidden">
        <li>
            <a href=""><img src="_assets/icons/form.svg" alt="" />Profil</a>
        </li>
        <li class="separateur">-</li>
        <li>
            <a href="_scripts/scriptLogout.php"><img src="_assets/icons/form.svg" alt="" />Deconnexion</a>
        </li>
    </ul>
</div>