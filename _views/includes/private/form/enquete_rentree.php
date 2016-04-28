<h1>Enquête rentrée</h1>
<form action="" method="">
    <div class="conteneur large">
        <div class="titre">
            <h2>Pour améliorer nos services, nous souhaitons recueillir votre avis sur votre intégration au CFA.</h2>
        </div>
        <div class="contenu">
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
            <h3>Comment avez-vous eu connaissance de cette formation ?</h3>
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
            <h3>Pour quelle raison principale avoir choisi l'apprentissage ?</h3>
            <select id="raison" name="raison" required>
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="decouvrir">Découvrir vraiment le métier auquel on se destine</option>
                <option value="trouver">Trouver plus rapidement du travail par la suite</option>
                <option value="salaire">Avoir un salaire</option>
                <option value="formation">La formation n'existait pas sous une autre forme</option>
                <option value="conseil">On me l'a conseillé</option>
                <option value="autre">Autre</option>
            </select>
            <h3>Avez-vous eu toutes les informations nécessaires :</h3>
            <ul class="ul-simple">
                <li class="li-simple">Pour vos démarches administratives concernant vos contrats en alternance ?</li>
                <li class="li-simple">Sur le contrat d'apprentissage ou de professionnalisation (modalités, rémunération, droits et obligations...) ?</li>
                <input type="radio" id="infos-contrat-oui" value="yes" name="infos_necessaires" /><label for="infos-contrat-oui" class="radio">Oui</label>
                <input type="radio" id="infos-contrat-non" value="no" name="infos_necessaires" /><label for="infos-contrat-non" class="radio">Non</label>
            </ul>

            <h3>Avez-vous participé aux Ateliers Techniques de Recherche d'Emploi proposés par le CFA</h3>
            <select id="participation_ateliers" name="participation_ateliers" required>
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="yes">Oui</option>
                <option value="no">Non</option>
                <option value="non-concerne">Non concerné (LP DISTRISUP, Master Bioinfo.)</option>
            </select>
            <div id="choixParticipationAteliers"></div>
            <h3>Pour vous, trouver une entreprise a été...</h3>
            <select id="trouver_entreprise" name="trouver_entreprise" required="">
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="tres-facile">Très facile</option>
                <option value="plutot-facile">Plutôt facile</option>
                <option value="plutot-difficile">Plutôt difficile</option>
                <option value="tres-difficile">Très difficile</option>
            </select>
            <h3>Avez-vous consulté les offres déposées sur le site Internet du CFA pour votre recherche d'entreprise ?</h3>
            <select id="offres_cfa" name="offres_cfa" required="">
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="yes">Oui</option>
                <option value="no">Non</option>
                <option value="ne-savais-pas">Ne savait qu'il y avait des offres d'emploi sur le site</option>
            </select>
            <h3>Comment avez-vous trouvé votre entreprise ?</h3>
            <select id="comment_trouver_entreprise" name="comment_trouver_entreprise" required="">
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="offre-cfa">Offre du CFA</option>
                <option value="aide">Aide du responsable pédagogique ou d'un enseignant</option>
                <option value="offre-externe">Offre d'emploi (autre que celles du CFA)</option>
                <option value="candidature">Candidature spontanée</option>
                <option value="reseau">Réseau personnel (famille, amis, connaissances...)</option>
            </select>
            <h3>En combien de temps (environ) avez-vous trouvé votre entreprise ?</h3>
            <select id="combien_temps_trouver_entreprise" name="combien_temps_trouver_entreprise" required="">
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="max-4-s">1 à 4 semaines</option>
                <option value="max-3-m">2 à 3 mois</option>
                <option value="min-4-m">Plus de 4 mois</option>
            </select>
            <h3>Avez-vous un compte sur l'un des réseaux sociaux suivants ?</h3>
            <input type="checkbox" id="facebook" /><label for="facebook" class="checkbox">Facebook</label>
            <input type="checkbox" id="twitter" /><label for="twitter" class="checkbox">Twitter</label>
            <input type="checkbox" id="linkedin" /><label for="linkedin" class="checkbox">LinkedIn</label>
            <input type="checkbox" id="viadeo" /><label for="viadeo" class="checkbox">Viadeo</label>
            <h3>Après quelques semaines d'expérience, quelle image avez-vous de l'alternance ?</h3>
            <textarea placeholder="Réponse..."></textarea>
            <h3>Avez-vous clairement identifié les différents interlocuteurs et les missions du CFA (accompagnement administratif pour le contrat d'apprentissage, gestion des heures d'abscence, relation avec l'entreprise, conseil quant au cadre légal relatif à l'apprentissage...) ?</h3>
            <select id="clairement_identifie" name="clairement_identifie" required="">
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="oui-parfaitement">Oui, parfaitement</option>
                <option value="oui">Plutôt oui</option>
                <option value="non">Plutôt non</option>
                <option value="non-pas-du-tout">Non, pas du tout</option>
            </select>
            <h3>Si vous avez recherché un logement, quelles difficultés avez-vous rencontré ?</h3>
            <select id="difficultes_logement" name="difficultes_logement" required="">
                <option value="default" selected disabled>Choisissez une réponse</option>
                <option value="finances">Financières</option>
                <option value="garant">Pas de garant</option>
                <option value="caution">Problèmes pour avancer le montant de la caution</option>
                <option value="manque-logement">Manque de logements</option>
                <option value="manque-annonces">Problèmes pour trouver des annonces</option>
                <option value="deux-logements">Nécessité d'avoir deux logements</option>
                <option value="statut">Problèmes liés au statut d'apprenti</option>
                <option value="pas-recherche">Je n'ai pas recherché de logement</option>
            </select>
            <h3>Avez-vous des remarques ou suggestions à nous faire ?</h3>
            <textarea placeholder="Réponse..."></textarea>
        </div>
    </div>
    <input type="submit" value="Valider" />
</form>
<script type="text/javascript">
    $('document').ready(function() {
        $('#participation_ateliers').change(function () {
           var choixSelect = $('#participation_ateliers option:selected').val();
           switch (choixSelect) {
                case "yes":
                    $('#choixParticipationAteliers').empty();
                    $('#choixParticipationAteliers').append('<p>Si oui, comment jugez-vous ces Ateliers ?</p>\n\
                    <select id="jugement_ateliers" name="jugement_ateliers" required="">\n\
                        <option value="tres-utiles">Très utiles</option>\n\
                        <option value="moyennement-utiles">Moyennement utiles</option>\n\
                        <option value="inutiles">Inutiles</option>\n\
                    </select>\n\
                    <p>Recommanderiez-vous les Ateliers Techniques de Recherche d\'Emploi à un étudiant en recherche d\'une entreprise ?</p>\n\
                    <input type="radio" value="yes" name="recommander" checked /><label>Oui</label>\n\
                    <input type="radio" value="no" name="recommander" /><label>Non</label>');
                   break;
                default:
                    $('#choixParticipationAteliers').empty();
                    break;
            }
        });
    });
</script>