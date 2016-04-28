<?php
require_once '../../../../_core/config.php';
require_once '../../../../' . CLSS_DIR . '/fpdf.php';
$fiche = new FPDF('P','mm','A4');
$fiche->AddPage();
$fiche->SetFont('Arial','B',18);
$fiche->Cell(190,20,'Fiche de renseignements',1,1,'C');
$fiche->SetFont('Arial','',15);
$fiche->Cell(190,20,'Apprenti',1,1,'C');
$fiche->SetFont('Arial','',11);
$fiche->Cell(95,10,'Nom : ' . $_POST['nomApprenti']);
$fiche->Cell(95,10,'Prénom : ' . $_POST['prenomApprenti'],0,1);
$fiche->Cell(95,10,'Date de naissance : ' . $_POST['dateNaissanceApprenti']);
$fiche->Cell(95,10,'Lieu de naissance : ' . $_POST['lieuNaissanceApprenti'],0,1);
$fiche->Cell(190,10,'Adresse : ' . $_POST['adresseApprenti'],0,1);
$fiche->Cell(55,10,'Code postal : ' . $_POST['cpApprenti']);
$fiche->Cell(135,10,'Ville : ' . $_POST['villeApprenti'],0,1);
$fiche->Cell(190,10,'Email : ' . $_POST['mailApprenti'],0,1);
$fiche->Cell(95,10,'Téléphone : ' . $_POST['telApprenti']);
$fiche->Cell(95,10,'Portable : ' . $_POST['portApprenti'],0,1);
$fiche->SetFont('Arial','',15);
$fiche->Cell(190,20,'Entreprise',1,1,'C');
$fiche->Output();
?>