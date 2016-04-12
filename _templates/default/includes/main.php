<div id="main">
    <p id="breadcrumbs">
        <?php
            if (!empty($_GET['cat']) && !empty($_GET['slug']))
            {
                displayBreadcrumbs($db, $_GET['cat'], $_GET['slug']);
            }
            else
            {
                echo '<a href="index.php">Accueil</a> > ';
            }
        ?>
    </p>
    <?php
        if (!empty($_GET['slug']))
        {
            $answer = dbSelect("SELECT * FROM `FormulaireStandard` WHERE `FormulaireStandard`.`slugFormulaireStandard`='" . $_GET['slug'] . "';", $db);
            if (count($answer) == 1)
            {
                echo $answer[0]['contenuFormulaireStandard'];
            }
            else
            {
                echo "La page que vous cherchez à consulter n'existe pas.";
            }
        }
        else
        {
            include ('_templates/default/includes/home.php');
        }
    ?>
</div>
