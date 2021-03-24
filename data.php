<?php
include ('conexion.php');
/**
  DEFINICION variables post
*/
if (isset($_POST['ciudad']) && !empty($_POST['ciudad'])) {
  $cty = $_POST['ciudad'];
}
if (isset($_POST['tipo']) && !empty($_POST['tipo'])) {
  $tip = $_POST['tipo'];
}
if (isset($_POST['precio']) && !empty($_POST['precio'])) {
  $prc = $_POST['precio'];
}
if (isset($_POST['ciudadB']) && !empty($_POST['ciudadB'])) {
  $ctyB = $_POST['ciudadB'];
}
if (isset($_POST['tipoB']) && !empty($_POST['tipoB'])) {
  $tipB = $_POST['tipoB'];
}

/**
  Carga inicial de la base de datos
*/
$consult = "SELECT * FROM inmuebles";
$registros= $conn->query($consult);

/**
  Rutina para almacenar los datos en base de datos
*/
if (isset($_POST['casa_item']) && !empty($_POST['casa_item'])) {
  $id_data = $_POST['casa_item'];
  $house_data = explode ("|", $id_data);
  $sql = "INSERT INTO inmuebles (direccion, ciudad, telefono, codigo_postal, tipo, precio)
      VALUES ('".$house_data[1]."', '".$house_data[2]."', '".$house_data[3]."','".$house_data[4]."','".$house_data[5]."','".$house_data[6]."')";
  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

/**
  Rutina para eliminar datos de la base de datos
*/
if (isset($_POST['casa_item_del']) && !empty($_POST['casa_item_del'])) {
  $id_house = $_POST['casa_item_del'];
  $sqlD = "DELETE FROM inmuebles WHERE id=".$id_house;
  if ($conn->query($sqlD) === TRUE) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

/**
  Manego del archivo data-1.jspn
*/
$data = file_get_contents("data-1.json");
$items = json_decode($data, true);
$products = array();
$product_export = array();
$cities = array ();
$types = array ();
$houses = array ();
foreach ($items as $info) {
  array_push ($cities, $info['Ciudad']);
  array_push ($types, $info['Tipo']);
  array_push ($products, $info);
  array_push ($product_export, $info);
}

/**
  Filtro para apllicar la informacion
*/
$i = 0;
foreach ($products as $info) {
  if (!empty($cty)) {
    $city_filter = str_replace ('_', ' ', $cty);
    if ($city_filter != $info ['Ciudad']) {
      unset ($products [$i]);
    }
  }
  if (!empty($tip)) {
    $tipo_filter = str_replace ('_', ' ', $tip);
    if($tipo_filter != $info['Tipo']) {
      unset ($products [$i]);
    }
  }
  if (!empty($prc)) {
    $valor = explode (";", $prc);
    $min_filter = $valor [0];
    $max_filter = $valor [1];
    $precio_inmueble = str_replace ('$', '', str_replace (',', '', $info ['Precio']));
    if ($precio_inmueble < $min_filter || $precio_inmueble > $max_filter) {
      unset ($products [$i]);
    }
  }
  if (!empty($ctyB)) {
    $city_filterB = str_replace ('_', ' ', $ctyB);
    if ($city_filterB != $info ['Ciudad']) {
      unset ($product_export [$i]);
    }
  }
  if (!empty($tipB)) {
    $tipo_filterB = str_replace ('_', ' ', $tipB);
    if($tipo_filterB != $info['Tipo']) {
      unset ($product_export [$i]);
    }
  } 
  $i++;
}

/**
  Generacion de informe en excel
*/
if(isset($_POST['export_data'])) {
  if(!empty($registros)) {
    $filename = 'libros.xls';
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$filename);
    $mostrar_columnas = false;
    foreach($product_export as $libro) {
      if(!$mostrar_columnas) {
        echo implode("\t", array_keys($libro)) . "\n";
        $mostrar_columnas = true;
      }
      echo implode("\t", array_values($libro)) . "\n";
    }
  } else {
    echo 'No hay datos a exportar';
  }
  exit;
}

$cities = array_unique($cities);
$types = array_unique($types);
?>