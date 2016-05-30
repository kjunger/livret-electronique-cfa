<?php
    $user = App::getInstance()->getTable('Utilisateur')->find($_SESSION['auth']);
    if(!empty($_POST)) {
        if(isset($_POST['acceptation'])) {
            $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
            if($auth->checkPassword($_POST['password'])){
                App::getInstance()->getTable('ContratApprentissage')->sign($_SESSION['auth'], $user->type);
                header('Location:private.php?p=private.contrat&sign=success');
            } else { header('Location:private.php?p=private.contrat&sign=failure'); }
        } else { header('Location:private.php?p=private.contrat&sign=hasNotAccepted'); }
    }
    $contrat = App::getInstance()->getTable('ContratApprentissage')->find($_SESSION['auth'], $user->type);
?>
<div class="content">
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
                <li>Respecter le règlement intérieur de l'établissement scolaire de rattachement et respecter le calendrier et les échéances fixées,</li>
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
                <li>Faire suivre à l'apprenti(e) toutes les formations et activités pédagogiques de l'établissement scolaire de rattachement,</li>
                <li>Veiller à la bonne tenue du livret de suivi de l'apprenti(e),</li>
                <li>Veiller à ce que l'apprenti(e) se présente aux évaluations prévues.</li>
            </ul>
        </div>
    </div>
    <div class="conteneur large">
        <div class="titre">
            <h2>L'établissement scolaire de rattachement s'engage à :</h2>
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
    if($contrat->getSignature($user->type) === null) {
    ?>
    <form action="" method="post">
        <div class="conteneur large">
            <div class="titre">
                <h2>Signature</h2>
            </div>
            <div class="contenu">
                <p>Je soussigné, M./Mme <?= $user->getFullName(); ?>, accepte par la présente signature les différentes clauses du contrat et m'engage à les respecter.</p>
                <input id="signature" name="acceptation" type="checkbox" />
                <label for="signature">Oui, je m'y engage.</label>
                <p>
                    <input type="password" name="password" placeholder="Entrez votre mot de passe" />
                </p>
                <?php
                if(isset($_GET['sign']) && $_GET['sign'] === 'failure') {
                ?>
                <p><strong>Mot de passe incorrect !</strong></p>
                <?php
                } elseif(isset($_GET['sign']) && $_GET['sign'] === 'hasNotAccepted') {
                ?>
                <p><strong>Vous n'avez donné votre engagement. Vous devez cocher la case pour donner votre engagement.</strong></p>
                <?php
                }
                ?>
            </div>
        </div>
        <input class="submit-field" type="submit" value="Valider" />
    </form>
    <?php
    } else {
    ?>
    <div class="conteneur large">
        <div class="titre">
           <?php
            if(isset($_GET['sign']) && $_GET['sign'] === 'success') {
            ?>
            <h2>Ce contrat a été signé avec succès</h2>
            <?php
            } else {
            ?>
            <h2>Vous avez déjà signé ce contrat</h2>
            <?php } ?>
        </div>
        <div class="contenu">
            <p>Ce contrat a été signé le <?= $contrat->getSignature($user->type); ?>.</p>
        </div>
    </div>
    <?php
    }
    ?>
</div>
