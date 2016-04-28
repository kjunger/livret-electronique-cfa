<h1>Enquête rentrée <?php echo date('Y') - 1 . ' - ' . date('Y'); ?></h1>
<form action="" method="">
    <div class="conteneur_large">
        <div class="contenu">
            <h2>Pour améliorer nos services, nous souhaitons recueillir votre avis sur votre intégration au CFA.</h2>
            <select id="formation" name="formation" required>
                <option value="default" selected disabled>Votre formation</option>
                <option value="dut_rt">DUT Réseaux et Télécommunication</option>
                <option value="dut_tc">DUT Techniques de Commercialisation</option>
                <option value="lp_chimie">Licence Professionnelle Chimie</option>
                <option value="lp_indu">Licence Pro. Techniques de Commercialisation en Milieu Industriel</option>
                <option value="lp_pack">Licence Professionnelle Packaging</option>
                <option value="lp_metro">Licence Professionnelle Métrologie</option>
                <option value="lp_ncme">Licence Pro. Négociation Commerciale et Marchés Européens</option>
                <option value="master_bioinfo">Master Bioinformatique</option>
            </select>
            <p>Comment avez-vous eu connaissance de cette formation ?</p>
            <select id="connaissance" name="connaissance" required>
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="forum">Lors d'un forum, d'un salon ou d'une journée portes ouvertes</option>
                <option value="univ">A l'Université</option>
                <option value="lycee">Au lycée</option>
                <option value="internet">Sur Internet</option>
                <option value="revue">Via une revue spécialisée</option>
                <option value="mio">A la MIO</option>
                <option value="autre">Autre</option>
            </select>
            <p>Pour quelle raison principale avoir choisi l'apprentissage ?</p>
            <select id="raison" name="raison" required>
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="decouvrir">Découvrir vraiment le métier auquel on se destine</option>
                <option value="trouver">Trouver plus rapidement du travail par la suite</option>
                <option value="salaire">Avoir un salaire</option>
                <option value="formation">La formation n'existait pas sous une autre forme</option>
                <option value="conseil">On me l'a conseillé</option>
                <option value="autre">Autre</option>
            </select>
            <p>Avez-vous eu toutes les informations nécessaires :</p>
            <ul>
                <li>Pour vos démarches administratives concernant vos contrats en alternance ?</li>
                <li>Sur le contrat d'apprentissage ou de professionnalisation (modalités, rémunération, droits et obligations...) ?</li>
            </ul>
            <input type="radio" value="yes" name="infos_necessaires" checked /><label>Oui</label>
            <input type="radio" value="no" name="infos_necessaires" /><label>Non</label>
            <p>Avez-vous participé aux Ateliers Techniques de Recherche d'Emploi proposés par le CFA</p>
            <select id="participation_ateliers" name="participation_ateliers" required>
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="yes">Oui</option>
                <option value="no">Non</option>
                <option value="non-concerne">Non concerné (LP DISTRISUP, Master Bioinfo.)</option>
            </select>
            <div id="choixParticipationAteliers"></div>
            <p>Recommanderiez-vous les Ateliers Techniques de Recherche d'Emploi à un étudiant en recherche d'une entreprise ?</p>
            <input type="radio" value="yes" name="recommander" checked /><label>Oui</label>
            <input type="radio" value="no" name="recommander" /><label>Non</label>
            <p>Pour vous, trouver une entreprise a été...</p>
            <select id="trouver_entreprise" name="trouver_entreprise" required="">
                <option value="tres-facile">Très facile</option>
                <option value="plutot-facile">Plutôt facile</option>
                <option value="plutot-difficile">Plutôt difficile</option>
                <option value="tres-difficile">Très difficile</option>
            </select>
        </div>
    </div>
</form>
<script type="text/javascript">
    $('document').ready(function() {
        $('#participation_ateliers').change(function () {
           var choixSelect = $('#participation_ateliers option:selected').val();
           switch (choixSelect) {
                case "oui":
                   $('#choixParticipationAteliers').empty();
                   $('#choixParticipationAteliers').append('<p>Si oui, comment jugez-vous ces Ateliers ?</p>\n\
                   ');
                   break;
                default:
                    $('#choixParticipationAteliers').empty();
                    break;
           }
        });
    });
</script>