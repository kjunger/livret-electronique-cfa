<?php
function ScanDirectory( $Directory ) {
    $MyDirectory = opendir( $Directory ) or die( 'Erreur' );
    while ( $Entry = @readdir( $MyDirectory ) ) {
        if ( is_dir( $Directory . '/' . $Entry ) && $Entry != '.' && $Entry != '..' ) {
            echo '<ul>' . $Directory;
            ScanDirectory( $Directory . '/' . $Entry );
            echo '</ul>';
        } //is_dir( $Directory . '/' . $Entry ) && $Entry != '.' && $Entry != '..'
        else {
            echo '<li>' . $Entry . '</li>';
        }
    } //$Entry = @readdir( $MyDirectory )
    closedir( $MyDirectory );
}
?>
<h1>Fichiers</h1>
<div class="conteneur large">
    <div class="titre">
        <h1>Formulaires</h1>
    </div>
    <div class="contenu">
        <?php ScanDirectory('_files/formulaires'); ?>
    </div>
</div>