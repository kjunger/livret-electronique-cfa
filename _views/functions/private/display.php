<?php
function home_info( $user_info = array(), $user_type = "" ) {
    switch ( $user_type ) {
        case "apprenti":
            echo <<<STR
                    <h2>Formation actuelle</h2>
                    <p>
STR;
            echo $user_info[ 'formation' ][ 'intitule' ];
            echo <<<STR
                    </p>
                    <h2>Entreprise</h2>
                    <p>
STR;
            echo $user_info[ 'entreprise' ][ 'raisonsociale' ];
            echo <<<STR
                    <br />
                    <span class="info">
STR;
            echo $user_info[ 'entreprise' ][ 'adresse' ] . '<br />' . $user_info[ 'entreprise' ][ 'cp' ] . ' ' . $user_info[ 'entreprise' ][ 'ville' ];
            echo <<<STR
                    </span></p>
                    <h2>Maître d'apprentissage</h2>
                    <p>
STR;
            echo $user_info[ 'maitreapprentissage' ][ 'prenom' ] . ' ' . $user_info[ 'maitreapprentissage' ][ 'nom' ];
            echo <<<STR
                    <br />
                    <span class="info">
STR;
            echo $user_info[ 'maitreapprentissage' ][ 'fonction' ];
            echo <<<STR
                    </span></p>
                    <h2>Tuteur pédagogique</h2>
                    <p>
STR;
            echo $user_info[ 'tuteurpedagogique' ][ 'prenom' ] . ' ' . $user_info[ 'tuteurpedagogique' ][ 'nom' ] . '</p>';
            break;
        case "maitreapprentissage":
            echo <<<STR
                    <h2>Votre entreprise</h2>
                    <p>
STR;
            echo $user_info[ 'entreprise' ][ 'raisonsociale' ];
            echo <<<STR
                    <br />
                    <span class="info">
STR;
            echo $user_info['entreprise']['adresse'] . ' - ' . $user_info['entreprise']['cp'] . ' ' . $user_info['entreprise']['ville'];
            echo <<<STR
                    </p>
                    <h2>Votre apprenti</h2>
                    <p>
STR;
            echo $user_info[ 'apprenti' ][ 'prenom' ] . ' ' . $user_info[ 'apprenti' ][ 'nom' ];
            echo <<<STR
                    <br />
                    <span class="info">
STR;
            echo $user_info[ 'apprenti' ][ 'formation' ] . ' - ' . $user_info[ 'apprenti' ][ 'composante' ];
            echo <<<STR
                    </span></p>
                    <h2>Tuteur pédagogique</h2>
                    <p>
STR;
            echo $user_info['tuteurpedagogique']['prenom'] . ' ' . $user_info['tuteurpedagogique']['nom'] . '</p>';
            break;
        case "tuteurpedagogique":
            echo <<<STR
                    <h2>Formation de rattachement</h2>
                    <p>
STR;
            echo $user_info[ 'formation' ][ 'intitule' ];
            echo <<<STR
                    </p>
                    <h2>L'apprenti suivi</h2>
                    <p>
STR;
            echo $user_info[ 'apprenti' ][ 'prenom' ] . ' ' . $user_info[ 'apprenti' ][ 'nom' ];
            echo <<<STR
                    </p>
                    <h2>Maître d'apprentissage</h2>
                    <p>
STR;
            echo $user_info[ 'maitreapprentissage' ][ 'prenom' ] . ' ' . $user_info[ 'maitreapprentissage' ][ 'nom' ];
            echo <<<STR
                    <br />
                    <span class="info">
STR;
            echo $user_info[ 'maitreapprentissage' ][ 'fonction' ];
            echo <<<STR
                    </span></p>
                    <h2>Entreprise</h2>
                    <p>
STR;
            echo $user_info[ 'entreprise' ][ 'raisonsociale' ];
            echo <<<STR
                    <br />
                    <span class="info">
STR;
            echo $user_info[ 'entreprise' ][ 'adresse' ] . '<br />' . $user_info[ 'entreprise' ][ 'cp' ] . ' ' . $user_info[ 'entreprise' ][ 'ville' ] . '</span></p>';
            break;
    } //$user_type
}
?>