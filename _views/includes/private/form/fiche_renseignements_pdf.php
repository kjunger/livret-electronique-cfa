<?php
require_once '../../../../_core/config.php';
require_once '../../../../' . CLSS_DIR . '/fpdf.php';
$fiche = new FPDF('P','mm','A4');
$fiche->AddPage();
$fiche->SetFont('Helvetica');
$fiche->Cell(40,10,$_POST['prenomApprenti'] . ' ' . $_POST['nomApprenti']);
$fiche->Output();
?>