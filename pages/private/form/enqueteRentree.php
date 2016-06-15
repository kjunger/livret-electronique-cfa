<?php
    //Seul formulaire gérant intégralement l'autocomplétion et l'enregistrement/modification dans la base de données
    $formation = App::getInstance()->getTable('Utilisateur')->formation($_SESSION['auth']);
?>
<div class="content">
    <h1>Enquête rentrée</h1>
    <form action="" method="post">
        <div class="conteneur large">
            <div class="titre">
                <h2>Pour améliorer nos services, nous souhaitons recueillir votre avis sur votre intégration au CFA.</h2>
            </div>
            <div class="contenu">
                <input placeholder="Votre formation" type="text" value="<?= $formation->intituleFormation; ?>" readonly />
                <h3>Comment avez-vous eu connaissance de cette formation ?</h3>
                <select name="EnqueteRentree_connaissanceFormation">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->connaissanceFormation;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Lors d'un forum, d'un salon ou d'une journée portes ouvertes">Lors d'un forum, d'un salon ou d'une journée portes ouvertes</option>
                    <option value="A l'Université">A l'Université</option>
                    <option value="Au lycée">Au lycée</option>
                    <option value="Sur Internet">Sur Internet</option>
                    <option value="Via une revue spécialisée">Via une revue spécialisée</option>
                    <option value="A la MIO">A la MIO</option>
                    <option value="Autre">Autre</option>
                </select>
                <h3>Pour quelle raison principale avoir choisi l'apprentissage ?</h3>
                <select name="EnqueteRentree_raisonChoixApprentissage">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->raisonChoixApprentissage;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Découvrir vraiment le métier auquel on se destine">Découvrir vraiment le métier auquel on se destine</option>
                    <option value="Trouver plus rapidement du travail par la suite">Trouver plus rapidement du travail par la suite</option>
                    <option value="Avoir un salaire">Avoir un salaire</option>
                    <option value="La formation n'existait pas sous une autre forme">La formation n'existait pas sous une autre forme</option>
                    <option value="On me l'a conseillé">On me l'a conseillé</option>
                    <option value="Autre">Autre</option>
                </select>
                <h3>Avez-vous eu toutes les informations nécessaires :</h3>
                <ul class="ul-simple">
                    <li class="li-simple">Pour vos démarches administratives concernant vos contrats en alternance ?</li>
                    <li class="li-simple">Sur le contrat d'apprentissage ou de professionnalisation (modalités, rémunération, droits et obligations...) ?</li>
                </ul>
                <input type="radio" id="infos-contrat-oui" value="Oui" name="EnqueteRentree_infosNecessaires" />
                <label for="infos-contrat-oui" class="radio">Oui</label>
                <input type="radio" id="infos-contrat-non" value="Non" name="EnqueteRentree_infosNecessaires" />
                <label for="infos-contrat-non" class="radio">Non</label>
                <h3>Avez-vous participé aux Ateliers Techniques de Recherche d'Emploi proposés par le CFA</h3>
                <select name="EnqueteRentree_participationAteliers">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->participationAteliers;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                    <option value="Non concerné">Non concerné</option>
                </select>
                <h3>Si oui, comment jugez-vous ces Ateliers ?</h3>
                <select name="EnqueteRentree_avisAteliers">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->avisAteliers;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Très utiles">Très utiles</option>
                    <option value="Moyennement utiles">Moyennement utiles</option>
                    <option value="Inutiles">Inutiles</option>
                </select>
                <h3>Recommanderiez-vous les Ateliers Techniques de Recherche d'Emploi à un étudiant en recherche d'une entreprise ?</h3>
                <input type="radio" id="recommander-oui" value="Oui" name="EnqueteRentree_recommandationAteliers" />
                <label for="recommander-oui" class="radio">Oui</label>
                <input type="radio" id="recommander-non" value="Non" name="EnqueteRentree_recommandationAteliers" />
                <label for="recommander-non" class="radio">Non</label>
                <h3>Pour vous, trouver une entreprise a été...</h3>
                <select name="EnqueteRentree_difficulteTrouverEntreprise">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->difficulteTrouverEntreprise;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Très facile">Très facile</option>
                    <option value="Plutôt facile">Plutôt facile</option>
                    <option value="Plutôt difficile">Plutôt difficile</option>
                    <option value="Très difficile">Très difficile</option>
                </select>
                <h3>Avez-vous consulté les offres déposées sur le site Internet du CFA pour votre recherche d'entreprise ?</h3>
                <select name="EnqueteRentree_consultationOffresCfa">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->consultationOffresCfa;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                    <option value="Je ne savais pas qu'il y avait des offres d'emploi sur le site">Je ne savais pas qu'il y avait des offres d'emploi sur le site</option>
                </select>
                <h3>Comment avez-vous trouvé votre entreprise ?</h3>
                <select name="EnqueteRentree_trouverEntreprise">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->trouverEntreprise;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Offre du CFA">Offre du CFA</option>
                    <option value="Aide du responsable pédagogique ou d'un enseignant">Aide du responsable pédagogique ou d'un enseignant</option>
                    <option value="Offre d'emploi (autre que celles du CFA)">Offre d'emploi (autre que celles du CFA)</option>
                    <option value="Candidature spontanée">Candidature spontanée</option>
                    <option value="Réseau personnel (famille, amis, connaissances...)">Réseau personnel (famille, amis, connaissances...)</option>
                </select>
                <h3>En combien de temps (environ) avez-vous trouvé votre entreprise ?</h3>
                <select name="EnqueteRentree_tempsTrouverEntreprise">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->tempsTrouverEntreprise;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="1 à 4 semaines">1 à 4 semaines</option>
                    <option value="2 à 3 mois">2 à 3 mois</option>
                    <option value="Plus de 4 mois">Plus de 4 mois</option>
                </select>
                <h3>Avez-vous un compte sur l'un des réseaux sociaux suivants ?</h3>
                <input type="checkbox" id="facebook" value="Oui" name="EnqueteRentree_facebook" />
                <label for="facebook" class="checkbox">Facebook</label>
                <input type="checkbox" id="twitter" value="Oui" name="EnqueteRentree_twitter" />
                <label for="twitter" class="checkbox">Twitter</label>
                <input type="checkbox" id="linkedin" value="Oui" name="EnqueteRentree_linkedin" />
                <label for="linkedin" class="checkbox">LinkedIn</label>
                <input type="checkbox" id="viadeo" value="Oui" name="EnqueteRentree_viadeo" />
                <label for="viadeo" class="checkbox">Viadeo</label>
                <h3>Après quelques semaines d'expérience, quelle image avez-vous de l'alternance ?</h3>
                <textarea placeholder="Réponse..." name="EnqueteRentree_avisAlternance" ><?php if(isset($form_data)){echo $form_data->avisAlternance;} ?></textarea>
                <h3>Avez-vous clairement identifié les différents interlocuteurs et les missions du CFA (accompagnement administratif pour le contrat d'apprentissage, gestion des heures d'abscence, relation avec l'entreprise, conseil quant au cadre légal relatif à l'apprentissage...) ?</h3>
                <select name="EnqueteRentree_identificationCfa">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->identificationCfa;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Oui, parfaitement">Oui, parfaitement</option>
                    <option value="Plutôt oui">Plutôt oui</option>
                    <option value="Plutôt non">Plutôt non</option>
                    <option value="Non, pas du tout">Non, pas du tout</option>
                </select>
                <h3>Si vous avez recherché un logement, quelles difficultés avez-vous rencontré ?</h3>
                <select name="EnqueteRentree_difficulteTrouverLogement">
                    <option value="default" selected disabled><?php if(isset($form_data)){echo $form_data->difficulteTrouverLogement;}else{echo "Choissisez une réponse";} ?></option>
                    <option value="Financières">Financières</option>
                    <option value="Pas de garant">Pas de garant</option>
                    <option value="Problèmes pour avancer le montant de la caution">Problèmes pour avancer le montant de la caution</option>
                    <option value="Manque de logements">Manque de logements</option>
                    <option value="Problèmes pour trouver des annonces">Problèmes pour trouver des annonces</option>
                    <option value="Nécessité d'avoir deux logements">Nécessité d'avoir deux logements</option>
                    <option value="Problèmes liés au statut d'apprenti">Problèmes liés au statut d'apprenti</option>
                    <option value="Je n'ai pas recherché de logement">Je n'ai pas recherché de logement</option>
                </select>
                <h3>Avez-vous des remarques ou suggestions à nous faire ?</h3>
                <textarea placeholder="Réponse..." name="EnqueteRentree_remarques"><?php if(isset($form_data)){echo $form_data->remarques;} ?></textarea>
            </div>
        </div>
        <input type="submit" value="Valider" />
    </form>
</div>
