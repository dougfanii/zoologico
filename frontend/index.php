<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projeto Frontend</title>
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/estilo.css">
    </head>
    <body>
      <?php
        include "header.php";
      ?>
          <div id="app" class="container conteudo">
              <?php
                if(!$_GET['page']){
                  echo '<div class="cover-container">
                          <div class="inner cover row col-md-6 col-md-offset-3 showIndex">
                            <h1 class="cover-heading">Administre seu zoológico!</h1>
                            <p class="lead">Esta aplicação lhe trará auxílio para administrar seu zoológico, tendo controle sobre seus ambientes, visitas, funcionários e animais.</p>
                          </div>
                        </div>';
                }else{
                  include "system/".$_GET['page'].".php";
                  // include $_GET['page'];
                }
              ?>
          </div>
        </div>
        <script type="text/javascript" src="assets/js/global.js"></script>
        <script type="text/javascript" src="assets/vendor/jquery/jquery.js"></script>
        <script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendor/knockout/knockout.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <?php
          $jsFile = 'assets/js/'.$_GET['page'].'.js';
          if (file_exists($jsFile)){
            echo "<script type='text/javascript' src='".$jsFile."'></script>";
          }
        ?>

    </body>
</html>
