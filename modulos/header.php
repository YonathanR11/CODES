<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="inicio" >NOTAS</a>
  <div class="collapse navbar-collapse">
    <div class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="javascript">JAVASCRIPT <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="php">PHP <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="css">CSS <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="java">JAVA <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="html">HTML <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="python">PYTHON <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="sql">SQL <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="git">GIT <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="arduino">ARDUINO <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="linux">LINUX <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="cmd">CMD <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="bootstrap">BOOTSTRAP <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="text">TEXTO <span class="sr-only">(current)</span></a>
      </li>
    </div>
    <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#ModalNuevaNota">NUEVA NOTA </button>
    <a class="btn btn-primary float-right" href="CerrarSesion">Cerrar Sesion</a> -->
  
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <!-- <h6 class="float-right">wrgwrg</h6> -->
    <?php
    if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok') {
      echo '<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#ModalNuevaNota">NUEVA NOTA </button>';
    }
    ?>
    <!-- <button type="button" class="btn btn-secondary">2</button> -->

  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button"
            class="btn btn-primary dropdown-toggle"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      OPCIONES
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <!-- <a class="dropdown-item" href="login">Iniciar Sesion</a> -->
      <?php
      if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok') {
      echo '<a class="dropdown-item" href="#">Perfil</a>';
      echo '<a class="dropdown-item" href="CerrarSesion">Cerrar sesion</a>';
      }else{
        echo '<a class="dropdown-item" href="login">Iniciar Sesion</a>';
      }
      ?>
    </div>
  </div>
</div>
  
  
  </div>
</nav>