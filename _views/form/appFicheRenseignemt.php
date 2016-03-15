<?php include('_includes/breadcrumbs.php'); ?>
    <h4>Fiche de renseignements</h4>
    <form class="col s12 m6 l6"><span class="card-title">Apprenti(e)</span>
        <input placeholder="Nom" id="nomApprenti" type="text" class="validate" required />
        <label for="nomApprenti">Nom</label>
        <input placeholder="Prénom" id="prenomApprenti" type="text" class="validate" required />
        <label for="prenomApprenti">Prénom</label>
        <input placeholder="Date de naissance" id="dateNaissanceApprenti" type="text" class="validate" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />
        <label for="dateNaissanceApprenti">Date de naissance - exemple : 20/02/1994</label>
        <input placeholder="Lieu de naissance" id="lieuNaissanceApprenti" type="text" class="validate" required />
        <label for="lieuNaissanceApprenti">Lieu de naissance</label>
        <input placeholder="Adresse" id="adresseApprenti" type="text" class="validate" required />
        <label for="adresseApprenti">Adresse personnelle (en dehors du cadre des études, p.ex. parents)</label>
        <input placeholder="Complément d'adresse" id="complementAdApprenti" type="text" class="validate" />
        <label for="complementAdApprenti">Complément d'adresse</label>
        <input placeholder="Code postal" id="cpApprenti" type="text" class="validate" pattern="[0-9]{5}" required />
        <label for="cpApprenti">Code postal</label>
        <input placeholder="Ville" id="villeApprenti" type="text" class="validate" required />
        <label for="villeApprenti">Ville</label>
        <input placeholder="Email" id="mailApprenti" type="email" class="validate" required />
        <label for="mailApprenti">Email</label>
        <input placeholder="Téléphone" id="telApprenti" type="tel" class="validate" pattern="0[0-9]{9}" required />
        <label for="telApprenti">Téléphone</label>
        <input placeholder="Portable" id="portApprenti" type="tel" class="validate" pattern="0[6-7]{1}[0-9]{8}" required />
        <label for="portApprenti">Portable</label>
        <span class="card-title">Entreprise</span>
        <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" class="validate" required />
        <label for="raisonSocialeEnt">Raison sociale</label>
        <h6>Siège social</h6>
        <input placeholder="Adresse du siège social" id="adSiege" type="text" class="validate" required />
        <label for="adSiege">Adresse du siège social</label>
        <input placeholder="Complément d'adresse" id="complementAdSiege" type="text" class="validate" required />
        <label for="complementAdSiege">Complément d'adresse</label>
        <input placeholder="Code postal" id="cpSiege" type="text" class="validate" pattern="[0-9]{5}" required />
        <label for="cpSiege">Code postal</label>
        <input placeholder="Ville" id="villeSiege" type="text" class="validate" required />
        <label for="villeSiege">Ville</label>
        <h6>Site d'accueil de l'apprenti(e), si différent du siège social</h6>
        <input placeholder="Adresse du site d'accueil" id="adAccueil" type="text" class="validate" />
        <label for="adAccueil">Adresse du site d'accueil</label>
        <input placeholder="Complément d'adresse" id="complementAdSiege" type="text" class="validate" />
        <label for="complementAdAccueil">Complément d'adresse</label>
        <input placeholder="Code postal" id="cpSiege" type="text" class="validate" pattern="[0-9]{5}" />
        <label for="cpAccueil">Code postal</label>
        <input placeholder="Ville" id="villeSiege" type="text" class="validate" />
        <label for="villeAccueil">Ville</label>
        <h6>Maître d'apprentissage</h6>
        <input placeholder="Nom" id="nomMaitreApp" type="text" class="validate" required />
        <label for="nomMaitreApp">Nom</label>
        <input placeholder="Prénom" id="prenomMaitreApp" type="text" class="validate" required />
        <label for="prenomMaitreApp">Prénom</label>
        <input placeholder="Fonction" id="fonctionMaitreApp" type="text" class="validate" required />
        <label for="fonctionMaitreApp">Fonction</label>
        <input placeholder="Email" id="mailMaitreApp" type="email" class="validate" required />
        <label for="mailMaitreApp">Email</label>
        <input placeholder="Téléphone" id="telMaitreApp" type="tel" class="validate" pattern="0[0-9]{9}" required />
        <label for="telMaitreApp">Téléphone</label>
        <input placeholder="Portable" id="portMaitreApp" type="tel" class="validate" pattern="0[6-7]{1}[0-9]{8}" />
        <label for="portMaitreApp">Portable</label>
    </form>