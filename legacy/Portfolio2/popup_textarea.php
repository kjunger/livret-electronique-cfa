<?php
include_once("./fckeditor/fckeditor.php") ;
$id = "";
	if(isset($_GET["id"]) && !empty($_GET["id"]))
		$id = $_GET["id"];


if(isset($_POST["texte"]))
{

?>
	<script>
		cible = window.opener.document.getElementById('<?php echo $id;?>');
		
		if(cible.tagName != "div")
			cible.value ='<?php echo $_POST["texte"]?>';		
		else
			cible.innerHTML = '<?php echo $_POST["texte"]?>';		
		window.close();
	</script>
<?php	
}
?>


<html>
	<head>
	<style>
	@import url("player.css" );
  </style>
	<!--[if IE]>
	<style type="text/css">
	@import url("player_ie.css" );
	</style>
	<![endif]--> 
	<script src="script.js"></script>
	</head>
	<body>
	<form action="popup_textarea.php?id=<?php echo $id?>" method="post">
	<?php
		$oFCKeditor = new FCKeditor('texte') ;
		$oFCKeditor->BasePath = './fckeditor/' ;
		$oFCKeditor->ToolbarSet = 'Perso';
		$oFCKeditor->Value = '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>' ;
		$oFCKeditor->Create() ;
	?>
		
		<input type="submit" value="click">
	</form>
	</body>
</html>
<script>
	cible = window.opener.document.getElementById('<?php echo $id;?>')
	if(cible.tagName != "div")
		document.getElementById("texte").value =cible.value;
	else
		document.getElementById("texte").value =cible.innerHTML ;

</script>