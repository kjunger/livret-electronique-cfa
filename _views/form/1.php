<?php try {
        $form = $db->query("select contentForm from forms where idForm=1;");
        $answer = $form->fetchAll();
    }

    catch (PDOException $e) {
        echo 'Erreur de transaction : ' . $e->getMessage();
    }

    if (count($answer) == 1) {
        echo $answer[0]['contentForm'];
    }

?>
