<?php
function safe_redir()
{
    for ($i = 0; $i < ob_get_level(); $i++) {
        ob_end_clean();
    }
}
function signature_contrat($user, $pass)
{
    if ($user->checkPassword($pass) == true) {
        $user->setSignature();
        header('Location:index.php?cat=contrat&signed=1');
    }
    else {
        safe_redir();
        header('Location:index.php?cat=contrat&error=1');
    }
}
function form_links($forms) {
    for ( $i = 0; $i <= count( $forms ) - 1; $i++ ) {
        if ( $forms[ $i ][ 'type' ] == "form" && $forms[ $i ][ 'typeDroit' ] != 0 ) {
            $form_subs = phpQuery::newDocument( "<li/>" );
            $form_subs[ "li" ]->append( "<a></a>" );
            $form_subs[ "a" ]->attr( "href", "index.php?cat=form&id=" . $forms[ $i ][ 'idFormulaire' ] . "&name=" . $forms[ $i ][ 'nom' ] );
            $form_subs[ "a" ]->append( $forms[ $i ][ 'intitule' ] );
            print $form_subs;
        }
    }
}
function eval_links($forms) {
    for ( $i = 0; $i <= count( $forms ) - 1; $i++ ) {
        if ( $forms[ $i ][ 'type' ] == "eval" && $forms[ $i ][ 'typeDroit' ] > 1 ) {
            $eval_subs = phpQuery::newDocument( "<li/>" );
            $eval_subs[ "li" ]->append( "<a></a>" );
            $eval_subs[ "a" ]->attr( "href", "index.php?cat=eval&id=" . $forms[ $i ][ 'idFormulaire' ] . "&name=" . $forms[ $i ][ 'nom' ] );
            $eval_subs[ "a" ]->append( $forms[ $i ][ 'intitule' ] );
            print $eval_subs;
        }
    }
}
function breadcrumbs($forms) {
    echo '<a href="index.php">Accueil</a> > ';
    if (isset($_GET['cat'])) {
        switch ($_GET['cat']) {
        case "form":
            echo "Formulaires > ";
            break;
        case "eval":
            echo "Evaluations > ";
            break;
        case "contrat":
            echo "Contrat pédagogique";
            break;
        case "fichiers":
            echo "Fichiers";
            break;
        case "contacts":
            echo "Contacts";
            break;
        case "profil":
            echo "Profil";
            break;
        }
        if (($_GET['cat'] == "form" || $_GET["cat"] == "eval") && isset($_GET['id'])) {
            for ($i = 0; $i <= count($forms) - 1; $i++) {
                if ($forms[$i]['idFormulaire'] == $_GET['id']) {
                    echo $forms[$i]['intitule'];
                }
            }
        }
    }
}
?>
