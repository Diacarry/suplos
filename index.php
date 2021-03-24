<?php
  include ('data.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="index.php" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php
                foreach ($cities as $city) {
                  echo '<option value="'.str_replace (' ', '_', $city).'">'.$city.'</option>';
                 }
              ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
              <?php
                foreach ($types as $typ) {
                  echo '<option value="'.str_replace (' ', '_', $typ).'">'.$typ.'</option>';
                 }
              ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
        <li><a href="#tabs-3">Reporte</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusquedaA">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>
            <div class="divider"></div>
            <?php
              foreach ($products as $product) {
                echo'<div class="itemMostrado">';
                echo '<img src="img/home.jpg" class="itemMostrado">';
                echo '<form action="index.php" method="post" id="savee">';
                echo '<input type="hidden" name="casa_item" value="'.$product['Id']."|".$product['Direccion']."|".$product['Ciudad']."|".$product['Telefono']."|".$product['Codigo_Postal']."|".$product['Tipo']."|".$product['Precio'].'">';
                echo 'Direccion: '.$product['Direccion'].'<br>';
                echo 'Ciudad: '.$product['Ciudad'].'<br>';
                echo 'Telefono: '.$product['Telefono'].'<br>';
                echo 'Codigo_Postal: '.$product['Codigo_Postal'].'<br>';
                echo 'Tipo: '.$product['Tipo'].'<br>';
                echo 'Precio: '.$product['Precio'].'<br>';
                echo '<input type="submit" class="btn green" value="Guardar" id="btn_'.$product['Id'].'">';
                echo '</form>';
                echo '</div>';
              }
            ?>
          </div>
        </div>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusquedaB">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes Guardados:</h5>
            <div class="divider"></div>
            <?php
              foreach ($registros as $product) {
                echo'<div class="itemMostrado">';
                echo '<img src="img/home.jpg" class="itemMostrado">';
                echo '<form action="index.php" method="post" id="view">';
                echo '<input type="hidden" name="casa_item_del" value="'.$product['id'].'">';
                echo 'Direccion: '.$product['direccion'].'<br>';
                echo 'Ciudad: '.$product['ciudad'].'<br>';
                echo 'Telefono: '.$product['telefono'].'<br>';
                echo 'Codigo_Postal: '.$product['codigo_postal'].'<br>';
                echo 'Tipo: '.$product['tipo'].'<br>';
                echo 'Precio: '.$product['precio'].'<br>';
                echo '<input type="submit" class="btn red" value="Eliminar" id="btn_'.$product['id'].'">';
                echo '</form>';
                echo '</div>';
              }
            ?>
          </div>
        </div>
      </div>

      <div id="tabs-3" >
        <div class="colContenido" id="divResultadosBusquedaC">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Exportar Reporte</h5>
            <div class="divider"></div>
            <form action="index.php" method="post" id="formularioC">
              <div class="filtrosContenido">
                <div class="tituloFiltros">
                  <h5>Filtros</h5>
                </div>
                <div class="filtroCiudad input-field">
                  <p><label for="selectCiudad">Ciudad:</label><br></p>
                  <select name="ciudadB" id="selectCiudadB">
                    <option value="" selected>Elige una ciudad</option>
                    <?php
                      foreach ($cities as $city) {
                        echo '<option value="'.str_replace (' ', '_', $city).'">'.$city.'</option>';
                       }
                    ?>
                  </select>
                </div>
                <div class="filtroTipo input-field">
                  <p><label for="selecTipo">Tipo:</label></p>
                  <br>
                  <select name="tipoB" id="selectTipoB">
                    <option value="">Elige un tipo</option>
                    <?php
                      foreach ($types as $typ) {
                        echo '<option value="'.str_replace (' ', '_', $typ).'">'.$typ.'</option>';
                       }
                    ?>
                  </select>
                </div>
                <div class="botonField">

                  <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn green">Exportar a Excel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
