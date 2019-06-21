<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>C O D E S</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/prism.css">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- <link rel="stylesheet" href="/assets/codemirror/theme/darcula.css"> -->
  <!-- <link rel="stylesheet" href="assets/codemirror/lib/codemirror.css"> -->
  <!-- <link rel="stylesheet" href="assets/css/codemirror.css"> -->
  <!-- <link rel="stylesheet" href="assets/css/dracula.css"> -->
</head>

<body>

    <?php
    // if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok' && isset($_GET["ruta"])) {
        include "modulos/header.php";
    // }
    ?>

  <div class="container">
  <div class="row">
      <div class="col">
          <!-- <textarea class="codemirrorEdit" name="codigo" id="ed_code"></textarea> -->
      <?php
        // if (isset($_GET["ruta"]) && $_SESSION['iniciarSesion'] == "ok") {
        if (isset($_GET["ruta"])) {
            if (
              $_GET["ruta"] == "javascript" ||
              $_GET["ruta"] == "php" ||
              $_GET["ruta"] == "css" ||
              $_GET["ruta"] == "text" ||
              $_GET["ruta"] == "java" ||
              $_GET["ruta"] == "html" ||
              $_GET["ruta"] == "python" ||
              $_GET["ruta"] == "sql" ||
              $_GET["ruta"] == "inicio" ||
              $_GET["ruta"] == "git" ||
              $_GET["ruta"] == "linux" ||
              $_GET["ruta"] == "arduino" ||
              $_GET["ruta"] == "cmd" ||
              $_GET["ruta"] == "bootstrap" ||
              $_GET["ruta"] == "login" ||
              $_GET["ruta"] == "CerrarSesion"
          ) {
                include "modulos/" . $_GET["ruta"] . ".php";
            } else {
                include "modulos/404.php";
            }
        } else {
            // include "modulos/login.php";
            include "modulos/inicio.php";
        }

        // if (!isset($_GET["ruta"])) {
        //   echo '<script> window.location = "/"; </script>';
        // }
        ?>
      </div>
    </div>
  </div>
  </div>
  </div>

  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/prism.js"></script>
  <!-- <script src="assets/js/codemirror.js"></script> -->
  <script src="assets/js/all.min.js"></script>
  <!-- <script src="assets/js/codeEdit.js"></script> -->
  <!-- <script src="/assets/codemirror/lib/codemirror.js"></script> -->
  <!-- <script src="/assets/codemirror/mode/javascript/javascript.js"></script> -->
</body>

</html>
<!-- Modal -->
<div class="modal fade" id="ModalNuevaNota" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">Nueva nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="nuevaNota.php">
        <div class="form-group">
          <label for="nombre">Titulo</label>
          <input type="text" name="titulo" class="form-control" id="nombre" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <input type="text" name="descripcion" class="form-control" id="descripcion" autocomplete="off" required>
        </div>
        <div class="form-group">
        <label for="lenguaje">Lenguaje</label>
        <select class="custom-select" name="lenguaje" id="lenguaje">
          <option value="text">TEXTO</option>
          <option value="php">PHP</option>
          <option value="javascript">JAVASCRIPT</option>
          <option value="java">JAVA</option>
          <option value="sql">SQL</option>
          <option value="html">HTML</option>
          <option value="css">CSS3</option>
          <option value="python">PYTHON</option>
          <option value="arduino">ARDUINO</option>
          <option value="bootstrap">BOOTSTRAP</option>
          <option value="cmd">CMD</option>
          <option value="git">GIT</option>
          <option value="linux">LINUX</option>
        </select>
        </div>
        <div class="form-group">
          <label for="nota">Codigo</label>
          <textarea class="form-control" contenteditable="true" name="codigo" rows="5" id="nota"></textarea>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="summit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
      </div>
      
    </div>
  </div>
</div>

<!-- MODAL EDITAR -->
<!-- Large modal -->
<!-- <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
  Large modal
</button> -->

<div class="modal fade bd-example-modal-lg ModalEditar" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="nuevaNota.php">
        <div class="form-group">
          <label for="nombre">Titulo</label>
          <input type="text" name="titulo" class="form-control" id="nombre" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <input type="text" name="descripcion" class="form-control" id="descripcion" autocomplete="off" required>
        </div>
        <div class="form-group">
        <label for="lenguaje">Lenguaje</label>
        <select class="custom-select" name="lenguaje" id="lenguaje">
          <option value="text">TEXTO</option>
          <option value="php">PHP</option>
          <option value="javascript">JAVASCRIPT</option>
          <option value="java">JAVA</option>
          <option value="sql">SQL</option>
          <option value="html">HTML</option>
          <option value="css">CSS3</option>
          <option value="python">PYTHON</option>
          <option value="arduino">ARDUINO</option>
          <option value="bootstrap">BOOTSTRAP</option>
          <option value="cmd">CMD</option>
          <option value="git">GIT</option>
          <option value="linux">LINUX</option>
        </select>
        </div>
        <div class="form-group">
          <label for="nota">Codigo</label>
          <textarea class="form-control" contenteditable="true" name="codigo" rows="5" id="nota"></textarea>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
