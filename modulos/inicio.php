<?php

require_once "conexion.php";

    //   $sql = 'SELECT * FROM notas ORDER BY id';
      $sql = "SELECT codigos.id, codigos.titulo, codigos.descripcion, codigos.codigo, codigos.lenguaje, codigos.estado, us.usuario, us.nombre FROM codigos INNER JOIN usuarios AS us ON codigos.usuarios_id=us.id ORDER BY codigos.id DESC;";
        foreach (Conexion::conectar()->query($sql) as $row) {
            echo '<div class="card m-3">
            <div class="card-body">
              <h4 class="card-title">'.$row["titulo"].'</h4>
              <h6 class="card-subtitle mb-2 text-muted">'.$row["descripcion"].'</h6>
              <span class="badge badge-info">'.$row['usuario'].'</span>
              <pre class="language-'.$row["lenguaje"].' line-numbers"><code>'.str_replace("<", "&lt;", $row["codigo"]).'</code></pre>';
              if (isset($_SESSION['usuario']) && $row['usuario'] == $_SESSION['usuario']) {
                echo'<a href="#!" class="btn btn-warning">Editar</a>';
                echo'<a href="#!" class="btn btn-danger ml-1">borrar</a>';
              }
             echo '</div>
          </div>';
        }