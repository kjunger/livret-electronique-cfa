<nav id="cssmenu">
    <img src="<?php echo VIEW_DIR . '/' . ASSETS; ?>/img/logo.png" alt="Logo CFA-CFC" id="menu-logo" />
    <ul>
        <li>
            <a href="index.php">
                <div class="accueil">Accueil</div>
            </a>
        </li>
        <li class="has-sub">
            <a href="#">
                <div class="form">Formulaires</div>
            </a>
            <ul>
                <?php
                for ( $i = 0; $i <= count( $userForms ) - 1; $i++ ) {
                    if ( $userForms[ $i ][ 'type' ] == "form" && $userForms[ $i ][ 'typeDroit' ] != 0 ) {
                        $form_subs = phpQuery::newDocument( "<li/>" );
                        $form_subs[ "li" ]->append( "<a></a>" );
                        $form_subs[ "a" ]->attr( "href", "index.php?cat=form&id=" . $userForms[ $i ][ 'idFormulaire' ] . "&name=" . $userForms[ $i ][ 'nom' ] );
                        $form_subs[ "a" ]->append( $userForms[ $i ][ 'intitule' ] );
                        print $form_subs;
                    } //$userForms[ $i ][ 'type' ] == "form" && $userForms[ $i ][ 'typeDroit' ] != 0
                } //$i = 0; $i <= count( $userForms ) - 1; $i++
                ?>
            </ul>
        </li>
        <li class="has-sub">
            <a href="#">
                <div class="eval">Evaluations</div>
            </a>
            <ul>
                <?php
                for ( $i = 0; $i <= count( $userForms ) - 1; $i++ ) {
                    if ( $userForms[ $i ][ 'type' ] == "eval" && $userForms[ $i ][ 'typeDroit' ] > 1 ) {
                        $eval_subs = phpQuery::newDocument( "<li/>" );
                        $eval_subs[ "li" ]->append( "<a></a>" );
                        $eval_subs[ "a" ]->attr( "href", "index.php?cat=eval&id=" . $userForms[ $i ][ 'idFormulaire' ] . "&name=" . $userForms[ $i ][ 'nom' ] );
                        $eval_subs[ "a" ]->append( $userForms[ $i ][ 'intitule' ] );
                        print $eval_subs;
                    } //$userForms[ $i ][ 'type' ] == "eval" && $userForms[ $i ][ 'typeDroit' ] != 0
                } //$i = 0; $i <= count( $userForms ) - 1; $i++
                ?>
            </ul>
        </li>
        <li>
            <a href="index.php?cat=contrat">
                <div class="contrat">Contrat</div>
            </a>
        </li>
        <li>
            <a href="index.php?cat=fichiers">
                <div class="fichiers">Fichiers</div>
            </a>
        </li>
        <li>
            <a href="index.php?cat=contacts">
                <div class="contacts">Contacts</div>
            </a>
        </li>
    </ul>
</nav>
