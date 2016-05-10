<?php
function safe_redir() {
    for( $i=0; $i < ob_get_level(); $i++ ) {
        ob_end_clean();
    }
}
function signature_contrat( $user, $pass ) {
    if( $user->checkPassword( $pass ) == true ) {
        $user->setSignature();
        header('Location:index.php?cat=contrat&signed=1');
    } else {
        safe_redir();
        header('Location:index.php?cat=contrat&error=1');
    }
}
?>