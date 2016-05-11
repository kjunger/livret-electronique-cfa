<div id="main">
    <p id="breadcrumbs">
        <?php breadcrumbs($userForms); ?>
    </p>
    <?php if (isset($_GET['cat'])){
        if (($_GET['cat'] == "form" || $_GET['cat'] == "eval") && (isset($_GET['id'], $_GET['name']))):
            include VIEW_DIR . '/' . INCLUDES . '/' . $_GET['cat'] . '/' . $_GET['name'] . '.php';
        elseif ($_GET['cat'] == "contrat" || $_GET['cat'] == "profil" || $_GET['cat'] == "fichiers" || $_GET['cat'] == "contacts"):
            include VIEW_DIR . '/' . INCLUDES . '/' . $_GET['cat'] . '.php';
        endif;
    }
    else{
        include VIEW_DIR . '/' . INCLUDES . '/home.php';
    } ?>
</div>
