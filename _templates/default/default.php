<?php
  include ('_templates/default/functions/display.functions.php');
  include ('_templates/default/functions/user.functions.php');
  $db = dbInit('LivretElectroniq', '127.0.0.1', 'LivretElectroniq', 'test');
  if (isset($_GET['logout']))
  {
      userLogout();
  }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Livret Electronique de Suivi de l'Apprenti - Université de Rouen
    </title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="_templates/default/assets/css/style.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <?php
      include('_templates/default/includes/navigation.php');
      include('_templates/default/includes/user-mobile.php');
    ?>
    <div class="screen">
      <?php
        include('_templates/default/includes/header.php');
        include('_templates/default/includes/main.php');
        include('_templates/default/includes/footer.php');
      ?>
    </div>
  </body>
  <script type="text/javascript" src="_templates/default/assets/js/script.js">
  </script>
</html>
