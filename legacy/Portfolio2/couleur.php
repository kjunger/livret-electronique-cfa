<?php
function html2rgb($color)
{
  // gestion du #...
  if (substr($color,0,1)=="#") $color=substr($color,1,6);

  $tablo[0] = hexdec(substr($color, 0, 2));
  $tablo[1] = hexdec(substr($color, 2, 2));
  $tablo[2] = hexdec(substr($color, 4, 2));
  return $tablo;
}
	
function bornes($nb,$min,$max)
{
  if ($nb<$min) $nb=$min; // $nb est borné bas
  if ($nb>$max) $nb=$max; // $nb est Bornéo (ah! la vieille blague de mon prof de maths ;-)) hihi !)
  return $nb;
}

function rgb2html($tablo)
{
  // Vérification des bornes...
  for($i=0;$i<=2;$i++)
  {
    $tablo[$i]=bornes($tablo[$i],0,255);
  }
  // Le str_pad permet de remplir avec des 0
  // parce que sinon rgb2html(Array(0,255,255)) retournerai #0ffff<=manque un 0 !
  return "#" . str_pad(dechex( ($tablo[0]<<16)|($tablo[1]<<8)|$tablo[2] ), 6, "0", STR_PAD_LEFT);
}

	
	function creer_couleur($start= Array(255,153,51),$end = Array(204,255,51),$nb = 5){
		$couleur = Array();
		if ($nb>0)
		{
		  for ($i=0;$i<=$nb;$i++)
		  {
		    for ($j=0;$j<3;$j++) // Pour traiter le Rouge, Vert, Bleu
		    {
		      $buffer[$j] = $start[$j] + ($i/$nb)*($end[$j]-$start[$j]);
		    }
		    $couleur[] = rgb2html($buffer);
		  }
		}
		return $couleur;
	}
		
	$couleurs = creer_couleur();
	
?>



















