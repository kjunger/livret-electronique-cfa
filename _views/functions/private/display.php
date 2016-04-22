<?php
function home_info( $user_info = array(), $user_type = "" ) {
    switch ( $user_type ) {
        case "apprenti":
            $doc = phpQuery::newDocument( "<div/>" );
            $doc[ "div" ]->attr( "class", "contenu" );
            $doc[ ".contenu" ]->append( "<h2>Formation actuelle</h2>" );
            $formation = phpQuery::newDocument( "<p/>" );
            $formation[ "p" ]->append( $user_info[ 'formation' ][ 'intitule' ] );
            $doc[ ".contenu" ]->append( $formation );
            $doc[ ".contenu" ]->append( "<h2>Entreprise</h2>" );
            $entreprise = phpQuery::newDocument( "<p/>" );
            $entreprise[ "p" ]->append( $user_info[ 'entreprise' ][ 'raisonsociale' ] . "<br /><span></span>" );
            $entreprise[ "span" ]->attr( "class", "info" );
            $entreprise[ ".info" ]->append( $user_info[ 'entreprise' ][ 'adresse' ] . '<br />' . $user_info[ 'entreprise' ][ 'cp' ] . ' ' . $user_info[ 'entreprise' ][ 'ville' ] );
            $doc[ ".contenu" ]->append( $entreprise );
            $doc[ ".contenu" ]->append( "<h2>Maître d'apprentissage</h2>" );
            $maitreApprentissage = phpQuery::newDocument( "<p/>" );
            $maitreApprentissage[ "p" ]->append( $user_info[ 'maitreapprentissage' ][ 'prenom' ] . ' ' . $user_info[ 'maitreapprentissage' ][ 'nom' ] . "<br /><span></span>" );
            $maitreApprentissage[ "span" ]->attr( "class", "info" );
            $maitreApprentissage[ ".info" ]->append( $user_info[ 'maitreapprentissage' ][ 'fonction' ] );
            $doc[ ".contenu" ]->append( $maitreApprentissage );
            $doc[ ".contenu" ]->append( "<h2>Tuteur pédagogique</h2>" );
            $tuteurPedagogique = phpQuery::newDocument( "<p/>" );
            $tuteurPedagogique[ "p" ]->append( $user_info[ 'tuteurpedagogique' ][ 'prenom' ] . ' ' . $user_info[ 'tuteurpedagogique' ][ 'nom' ] );
            $doc[ ".contenu" ]->append( $tuteurPedagogique );
            print $doc;
            break;
        case "maitreapprentissage":
            $doc = phpQuery::newDocument( "<div/>" );
            $doc[ "div" ]->attr( "class", "contenu" );
            $doc[ ".contenu" ]->append( "<h2>Votre entreprise</h2>" );
            $entreprise = phpQuery::newDocument( "<p/>" );
            $entreprise[ "p" ]->append( $user_info[ 'entreprise' ][ 'raisonsociale' ] . "<br /><span></span>" );
            $entreprise[ "span" ]->attr( "class", "info" );
            $entreprise[ ".info" ]->append( $user_info[ 'entreprise' ][ 'adresse' ] . '<br />' . $user_info[ 'entreprise' ][ 'cp' ] . ' ' . $user_info[ 'entreprise' ][ 'ville' ] );
            $doc[ ".contenu" ]->append( $entreprise );
            $doc[ ".contenu" ]->append( "<h2>Votre apprenti</h2>" );
            $apprenti = phpQuery::newDocument( "<p/>" );
            $apprenti[ "p" ]->append( $user_info[ 'apprenti' ][ 'prenom' ] . ' ' . $user_info[ 'apprenti' ][ 'nom' ] . "<br /><span></span>" );
            $apprenti[ "span" ]->attr( "class", "info" );
            $apprenti[ ".info" ]->append( $user_info[ 'apprenti' ][ 'formation' ] . '<br />' . $user_info[ 'apprenti' ][ 'composante' ] );
            $doc[ ".contenu" ]->append( $apprenti );
            $doc[ ".contenu" ]->append( "<h2>Tuteur pédagogique</h2>" );
            $tuteurPedagogique = phpQuery::newDocument( "<p/>" );
            $tuteurPedagogique[ "p" ]->append( $user_info[ 'tuteurpedagogique' ][ 'prenom' ] . ' ' . $user_info[ 'tuteurpedagogique' ][ 'nom' ] );
            $doc[ ".contenu" ]->append( $tuteurPedagogique );
            print $doc;
            break;
        case "tuteurpedagogique":
            $doc = phpQuery::newDocument( "<div/>" );
            $doc[ "div" ]->attr( "class", "contenu" );
            $doc[ ".contenu" ]->append( "<h2>Formation de rattachement</h2>" );
            $formation = phpQuery::newDocument( "<p/>" );
            $formation[ "p" ]->append( $user_info[ 'formation' ][ 'intitule' ] );
            $doc[ ".contenu" ]->append( $formation );
            $doc[ ".contenu" ]->append( "<h2>L'apprenti suivi</h2>" );
            $apprenti = phpQuery::newDocument( "<p/>" );
            $apprenti[ "p" ]->append( $user_info[ 'apprenti' ][ 'prenom' ] . ' ' . $user_info[ 'apprenti' ][ 'nom' ] );
            $doc[ ".contenu" ]->append( $apprenti );
            $doc[ ".contenu" ]->append( "<h2>Maître d'apprentissage</h2>" );
            $maitreApprentissage = phpQuery::newDocument( "<p/>" );
            $maitreApprentissage[ "p" ]->append( $user_info[ 'maitreapprentissage' ][ 'prenom' ] . ' ' . $user_info[ 'maitreapprentissage' ][ 'nom' ] . '<br /><span></span>' );
            $maitreApprentissage[ "span" ]->attr( "class", "info" );
            $maitreApprentissage[ ".info" ]->append( $user_info[ 'maitreapprentissage' ][ 'fonction' ] );
            $doc[ ".contenu" ]->append( $maitreApprentissage );
            $doc[ ".contenu" ]->append( "<h2>Entreprise</h2>" );
            $entreprise = phpQuery::newDocument( "<p/>" );
            $entreprise[ "p" ]->append( $user_info[ 'entreprise' ][ 'raisonsociale' ] . '<br /><span></span>' );
            $entreprise[ "span" ]->attr( "class", "info" );
            $entreprise[ ".info" ]->append( $user_info[ 'entreprise' ][ 'adresse' ] . '<br />' . $user_info[ 'entreprise' ][ 'cp' ] . ' ' . $user_info[ 'entreprise' ][ 'ville' ] );
            $doc[ ".contenu" ]->append( $entreprise );
            print $doc;
            break;
    } //$user_type
}
?>