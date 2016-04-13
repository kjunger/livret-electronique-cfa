<?php

    function displaySubLinks($database, $cat)
    {
        $answer = dbSelect("SELECT * FROM `FormulaireStandard` WHERE `FormulaireStandard`.`catFormulaireStandard`='$cat';", $database);
        foreach($answer as $row)
        {
            echo '<li><a href="index.php?cat=' . $row['catFormulaireStandard'] . '&amp;slug=' . $row['slugFormulaireStandard'] . '">' . $row['nomFormulaireStandard'] . '</a></li>';
        }
    }

    function displayBreadcrumbs($database, $cat, $slug)
    {
        switch ($cat) {
            case "form": echo 'Formulaires > '; break;
            case "eval": echo 'Evaluation > '; break;
        }
        $answer = dbSelect("SELECT `FormulaireStandard`.`nomFormulaireStandard` FROM `FormulaireStandard` WHERE `FormulaireStandard`.`catFormulaireStandard`='" . $cat . "' AND `FormulaireStandard`.`slugFormulaireStandard`='" . $slug . "';", $database);
        if (count($answer) == 1) {
            echo $answer[0]['nomFormulaireStandard'];
        }
    }

?>
