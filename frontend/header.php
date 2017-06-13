<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href='/'>Zoos Virtuos</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="#about">About</a></li>
        <!-- <li><a href="#contact">Contact</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=system/zoologicos.php">Zoológicos</a></li>
            <li><a href='index.php?page=system/funcionarios.php'>Funcionários</a></li>
            <li><a href='index.php?page=system/usuarios.php'>Usuários</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Animais<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=system/animais.php">Animais</a></li>
            <li><a href="index.php?page=system/especies.php">Espécies</a></li>
            <li><a href="index.php?page=system/recintos.php">Recintos</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Visitante<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href='index.php?page=system/visitantes.php'>Visitantes</a></li>
            <li><a href='index.php?page=system/visitas.php'>Visitas</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../navbar/">Default</a></li>
        <li><a href="../navbar-static-top/">Static top</a></li>
        <li class="active"><a href="./">Sair <span class="sr-only">(current)</span></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
