<?php

require_once "conexion.php";

  $sql = "SELECT codigos.id as idCode, codigos.titulo, codigos.descripcion, codigos.codigo, codigos.lenguaje, 
  codigos.estado, codigos.creacion, us.usuario, us.nombre FROM codigos INNER JOIN usuarios AS us ON 
  codigos.usuarios_id=us.id AND lenguaje = 'bootstrap';";
    foreach (Conexion::conectar()->query($sql) as $row) {
        $date = date_create($row['creacion']);
        echo '<div class="card m-3">
        <div class="card-body">
          <h4 class="card-title">'.$row["titulo"].'</h4>
          <h6 class="card-subtitle mb-2 text-muted">'.$row["descripcion"].'</h6>
          <span class="badge badge-success">'.$row['usuario'].'</span>
          <span class="badge" style="background: #5E408A; color: white">'.$row['lenguaje'].'</span>
          <span class="badge badge-dark">'.date_format($date, 'd/m/Y').'</span>
          <pre class="language-html line-numbers"><code>'.str_replace("<", "&lt;", $row["codigo"]).'</code></pre>';
        if (isset($_SESSION['usuario']) && $row['usuario'] == $_SESSION['usuario']) {
          echo '<button type="button" class="btn btn-warning EditarCode" idCode='.$row["idCode"].' data-toggle="modal" data-target="#ModalEditar"  data-controls-modal="ModalEditar" data-backdrop="static" data-keyboard="false">Editar</button>';
            echo'<a href="#!" class="btn btn-danger ml-1">Borrar</a>';
        }
        echo '</div>
      </div>';
    }
