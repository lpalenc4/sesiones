<?php
include_once('../config/config.php');
include('paciente.php');

if (isset($_POST) && !empty($_POST)){
    $p = new paciente();

    if ($_FILES['imagen']['name'] !== ''){
        $_POST['imagen']= saveImage($_FILES);
    }
    $save = $p->save($_POST);
    if($save){
        $mensaje = '<div class="alert alert-success"> Sesión registrada </div>';
    }else{
        $mensaje = '<div class="alert alert-danger"> Error al registrar! </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head> 
<body>
<?php  include ('../menu.php') ?>
    <div class="container">
        <?php
if(isset($mensaje)){
    echo $mensaje;
}
        ?>

    <h2 class="text_center mb-2">Registrar Sesion</h2>
    <form method="POST" enctype="multipart/form-data" >

    <div class="row mb-2">
        <div class="col">
            <input type="text" name="nombres" id="nombres" placeholder="Nombre del paciente" class="form-control"/> 
        </div>
        <div class="col">
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del paciente" class="form-control"/>
        </div>
        <div class="col">
            <input type="email" name="email" id="email" placeholder="Email del paciente" class="form-control"/> 
        </div></div>
        <div class="row mb-2">
        <div class="col">
            <input type="number" name="celular" id="celular" placeholder="Celular del paciente" class="form-control"/>
            <div class="col">
            <textarea name="enfermedades" id="enfermedades" placeholder="Enfermedades del paciente" class="form-control"></textarea>
        </div>
        <div class="col">
            <input type="text" name="duracionSesion" id="duracionSesion" placeholder="Duración de la sesión" class="form-control"/>
        </div> </div>      
        <div class="row mb-2">
        <div class="col">
        <input type="datetime-local" name="fecha" id="fecha" class="form-control"/>
        </div>        
        <div class="col">
            <input type="file" name="imagen" id="imagen" class="form-control"/>
        </div>
    </div>
    <button class="btn btn-success">Registrar</button>
    </form>
</div>
</body>
</html>