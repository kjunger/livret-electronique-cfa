<?php
if (isset($_GET['save'])) {
    signature_contrat($user, $_POST['password']);
}
?>
<h1>Contrat pédagogique</h1>
<div class="conteneur large">
    <div class="titre">
        <h2>L'apprenti(e) s'engage à :</h2>
    </div>
    <div class="contenu">
        <ul>
            <li>Travailler pour son employeur et effectuer les missions confiées dans le but d'acquérir des compétences,</li>
            <li>Respecter le règlement intérieur de l'entreprise,</li>
            <li>Suivre les cours et activités du programme de la formation en vue d'obtenir le diplôme visé,</li>
            <li>Respecter le règlement intérieur de l'établissement scolaire de rattachement (<?php
                if ( $_SESSION[ 'type' ] == "maitreapprentissage" ) {
                    echo $userInfo['apprenti']['composante'];
                } else {
                    echo $userInfo['formation']['composante'];
                }
            ?>) et respecter le calendrier et les échéances fixées,</li>
            <li><strong>Tenir à jour son livret de suivi et veiller à sa complétion par les autres parties, en la personne du maître d'apprentissage et du tuteur pédagogique.</strong></li>
        </ul>
        <p><strong>La bonne tenue du livret de suivi de l'apprenti(e) et le respect des échéances feront l'objet d'une évaluation.</strong></p>
    </div>
</div>
<div class="conteneur large">
    <div class="titre">
        <h2>L'entreprise s'engage à :</h2>
    </div>
    <div class="contenu">
        <ul>
            <li>Assurer à l'apprenti(e) une formation méthodique et complète pour le métier prévu au contrat,</li>
            <li>Verser un salaire à l'apprenti(e) conformément au contrat signé entre les parties,</li>
            <li>Employer l'apprenti(e) conformément à la législation en vigueur,</li>
            <li>Faire suivre à l'apprenti(e) toutes les formations et activités pédagogiques de l'établissement scolaire de rattachement (
            <?php
            if ($_SESSION['type'] == "maitreapprentissage") {
                echo $userInfo['apprenti']['composante'];
            }
            else {
                echo $userInfo['formation']['composante'];
            }
            ?>
            ),</li>
            <li>Veiller à la bonne tenue du livret de suivi de l'apprenti(e),</li>
            <li>Veiller à ce que l'apprenti(e) se présente aux évaluations prévues.</li>
        </ul>
    </div>
</div>
<div class="conteneur large">
    <div class="titre">
        <h2>L'établissement scolaire de rattachement (
        <?php
        if ($_SESSION[ 'type' ] == "maitreapprentissage") {
            echo $userInfo['apprenti']['composante'];
        }
        else {
            echo $userInfo['formation']['composante'];
        }
        ?>
        ) s'engage à :</h2>
    </div>
    <div class="contenu">
        <ul>
            <li>Assurer à l'apprenti(e) un enseignement général et technique correspondant au programme pédagogique du diplôme préparé,</li>
            <li>Assurer la coordination pédagogique entre l'entreprise et l'établissement,</li>
            <li>Suivre l'assiduité, le travail et la progression de l'acquisition des compétences.</li>
        </ul>
    </div>
</div>
<?php
if ($user->getSignature() == false) {
    echo '<form action="index.php?cat=' . $_GET['cat'] . '&save=1" method="post">';
    echo <<<STR
                <div class="conteneur large">
                    <div class="titre">
                        <h2>Signature</h2>
                    </div>
                    <div class="contenu">
                        <p>Je soussigné, M./Mme
STR;
    echo $userInfo['user']['prenom'] . ' ' . $userInfo['user']['nom'];
    echo <<<STR
                        , accepte par la présente signature les différentes clauses du contrat et m'engage à les respecter.</p>
                        <input id="signature" type="checkbox" />
                        <label for="signature">Oui, je m'y engage.</label>
                        <p>
                            <input type="password" name="password" placeholder="Entrez votre mot de passe" />
                        </p>
                        <span>
STR;
    if (isset($_GET['error'])) {
        echo "Mot de passe incorrect.";
    }
    echo <<<STR
                        </span>
                    </div>
                </div>
                <input class="submit-field" type="submit" value="Valider" />
            </form>
STR;
}
else {
    echo "Ce contrat a déjà été signé";
}
?>
