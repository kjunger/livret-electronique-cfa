<?php
if(!empty($_POST)){
    App::getInstance()->getTable('Formulaire')->complete($_GET['id'], $_POST, $contrat->idContratApprentissage);
}
if(App::getInstance()->getTable('Formulaire')->isComplete($_GET['id'], $contrat->idContratApprentissage, true) !== false) {
    $form_data = App::getInstance()->getTable('Formulaire')->getCompleted($_GET['id'], $_GET['name'], $contrat->idContratApprentissage);
}
require ROOT . '/pages/private/form/' . $_GET['name'] . '.php';
