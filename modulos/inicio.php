<?php

require_once "conexion.php";

    //   $sql = 'SELECT * FROM notas ORDER BY id';
      $sql = "SELECT codigos.id, codigos.titulo, codigos.descripcion, codigos.codigo, codigos.creacion, codigos.lenguaje, codigos.estado, us.usuario, us.nombre FROM codigos INNER JOIN usuarios AS us ON codigos.usuarios_id=us.id ORDER BY codigos.id DESC;";
        foreach (Conexion::conectar()->query($sql) as $row) {
          $date = date_create($row['creacion']);
          // echo var_dump($row);
          $strLenguaje = $row["lenguaje"];
          // echo $strLenguaje;
          $coloresLenguaje = array(
            'javascript' => 'background: #F1DA4E; color: black',
            'text' => 'background: #363942; color: white',
            'sql' => 'background: #E68F07; color: white',
            'git' => 'background: #F05036; color: white',
            'php' => 'background: #767BB3; color: white',
            'arduino' => 'background: #00979C; color: white',
            'bootstrap' => 'background: #5E408A; color: white',
            'cmd' => 'background: black; color: #2CF334',
            'css' => 'background: #3799D6; color: white',
            'html' => 'background: #E54D26; color: white',
            'java' => 'background: #DE0000; color: white',
            'linux' => 'background: black; color: #2CF334',
            'python' => 'background: #FFD140; color: black'            
           );
          
          echo '<div class="card m-3">
            <div class="card-body">
              <h4 class="card-title">'.$row["titulo"].'</h4>
              <h6 class="card-subtitle mb-2 text-muted">'.$row["descripcion"].'</h6>
              <span class="badge badge-success">'.$row['usuario'].'</span>
              <span class="badge" style="'.$coloresLenguaje[$strLenguaje] .'">'.$row['lenguaje'].'</span>
              <span class="badge badge-dark">'.date_format($date, 'd/m/Y').'</span>
              <pre class="language-'.$row["lenguaje"].' line-numbers"><code>'.str_replace("<", "&lt;", $row["codigo"]).'</code></pre>';
              if (isset($_SESSION['usuario']) && $row['usuario'] == $_SESSION['usuario']) {
                echo'<a href="#!" class="btn btn-warning">Editar</a>';
                echo'<a href="#!" class="btn btn-danger ml-1">Borrar</a>';
              }
            echo '</div>
          </div>';
        }