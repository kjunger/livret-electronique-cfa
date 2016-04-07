<div id="deconnexion-mobile">
  <p>
    <?php userDisplayName($_SESSION['user']); ?>
  </p>
  <div id="contenu-menu-user">
    <ul>
      <li>
        <a href="">
          <img src="_templates/default/assets/icons/user_blanc.svg" alt="" />Profil
        </a>
      </li>
      <li>
        <a href="index.php?logout=1">
          <img src="_templates/default/assets/icons/deconnexion_blanc.svg" alt="" />Deconnexion
        </a>
      </li>
    </ul>
    <img src="_templates/default/assets/img/logo_univ_rouen.png" alt="Logo Université de Rouen" id="logo_univ_blanc"/>
    <img src="_templates/default/assets/img/logo_iut_rouen.png" alt="Logo Composante" id="logo_etab_blanc"/>
  </div>
  <div class="footer-menu">
    <div id="content-footer-menu">
      <ul>
        <li>
          <a href="">Contact
          </a>
        </li>
        <li>
          <a href="">Mentions légales
          </a>
        </li>
      </ul>
      <ul class="img-footer-menu">
        <li>
          <img src="_templates/default/assets/img/logo_region.png" alt="Logo Région Normandie" class="logo_region_menu"/>
        </li>
        <li class="separateur">-
        </li>
        <li>
          <img src="_templates/default/assets/img/logo_ministere.png" alt="Logo Ministère de l'Enseignement Supérieur et de la Recherche" class="logo_ministere_menu"/>
        </li>
      </ul>
    </div>
  </div>
</div>
