<?php
 include "conexion.php";
//LEER
 $sql_leer="SELECT * FROM colores";
 $gsent= $pdo->prepare($sql_leer);
 $gsent->execute();
 $resultado = $gsent->fetchAll();
 //AGREGAR
if ($_POST) {
    $color = $_POST["color"];
    $descripcion = $_POST["descripcion"];
    if ($color != "" && $descripcion != "") {
      $sql_agregar="INSERT INTO colores (color,descripcion) VALUES (?,?)";
      $sentencia_agregar= $pdo->prepare($sql_agregar);
      $sentencia_agregar->execute(array($color,$descripcion));
      echo "Agregado";
      header("location:index.php");
    }
}
if ($_GET) {
  $id = $_GET["id"];
  $sql_leer_unico="SELECT * FROM colores WHERE id=?";
  $sentencia_unico= $pdo->prepare($sql_leer_unico);
  $sentencia_unico->execute(array($id));
  $resultado_unico = $sentencia_unico->fetch();
}
 ?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
            <?php 
              foreach ($resultado as $dato) {
                
            ?>
              <div class="alert alert-<?php echo $dato["color"];?> text-uppercase" role="alert">
                    <?php echo $dato["color"]." - ".$dato["descripcion"];?>
                    
                    <a href="delete.php?id=<?php echo $dato["id"]; ?>"><i class="far fa-trash-alt float-right ml-2"></i></a>
                    <a href="index.php?id=<?php echo $dato["id"]; ?>"><i class="fas fa-edit float-right "></i></a>
              </div>
            <?php 
            }
            ?>
            </div>
            <div class="col-md-6">
            <?php if (!$_GET) {
             ?>
            <h2>Agregar Color</h2>
              <form method="POST">
                  <input type="text" class="form-control mt-3" name="color">
                  <input type="text" class="form-control mt-3" name="descripcion">
                  <button class="btn btn-primary mt-3">Agregar</button>
              </form>
            <?php }else{?>
              <h2>Editar Color</h2>
              <form method="GET" action="edit.php">
                  <input type="text" class="form-control mt-3" name="color" value="<?php echo $resultado_unico["color"]?>">
                  <input type="text" class="form-control mt-3" name="descripcion" value="<?php echo $resultado_unico["descripcion"]?>">
                  <input type="hidden" name="id" value="<?php echo $resultado_unico["id"]?>">
                  <button class="btn btn-primary mt-3">Agregar</button>
              </form>
            <?php }?>
            </div>
        </div>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>