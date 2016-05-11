<h1>Fichiers</h1>
<div class="conteneur large">
    <div class="titre">
        <h1>Formulaires</h1>
    </div>
    <div class="contenu">
        <ul class="ul-simple">
            <?php
            if ($handle = opendir('_files/formulaires')) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {
                        if ($entry == "Contrat" . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-ficheRenseignements.pdf') {
                            echo "<li class=\"li-simple\"><a href=\"_files/formulaires/$entry\">Fiche de renseignements</a></li>";
                        }
                    }
                }
                closedir($handle);
            }
            if ($handle = opendir('_files/formulaires')) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {
                        if ($entry == "Contrat" . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-insertionPro.pdf') {
                            echo "<li class=\"li-simple\"><a href=\"_files/formulaires/$entry\">Insertion professionnelle et suivi des diplômés</a></li>";
                        }
                    }
                }
                closedir($handle);
            }
            if ($handle = opendir('_files/formulaires')) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {
                        if ($entry == "Contrat" . $userInfo['user']['idcontrat'] . '-' . $userInfo['user']['nom'] . '-depotOffreAlternance.pdf') {
                            echo "<li class=\"li-simple\"><a href=\"_files/formulaires/$entry\">Dépôt d'offre d'alternance</a></li>";
                        }
                    }
                }
                closedir($handle);
            }
            ?>
        </ul>
    </div>
</div>
<div class="conteneur large">
    <div class="titre">
        <h1>Evaluations</h1>
    </div>
    <div class="contenu">
        <h2></h2>
        <ul>

        </ul>
    </div>
</div>
