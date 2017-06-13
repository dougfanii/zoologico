<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projeto Frontend</title>
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/estilo.css">
    </head>
    <body>
      <?php
        include "header.php";
      ?>
          <div id="app" class="container conteudo">
              <?php include $_GET['page']; ?>
          </div>
        </div>
        <script type="text/javascript" src="assets/vendor/jquery/jquery.js"></script>
        <script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendor/knockout/knockout.js"></script>
        <script type="text/javascript" src="assets/js/zoologico.js"></script>
        <script type="text/javascript" src="assets/js/visitantes.js"></script>
        <script type="text/javascript" src="assets/js/global.js"></script>
    </body>
</html>
