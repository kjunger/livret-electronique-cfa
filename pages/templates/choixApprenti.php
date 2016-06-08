<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <span class="navbar-brand">Bienvenue, <?= $user->getFullName(); ?></span>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="starter-template" style="padding-top: 100px;">
        <?= $content; ?>
      </div>
    </div>
  </body>
</html>
