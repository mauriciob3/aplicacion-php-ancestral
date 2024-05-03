<?php  
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID = $_GET['txtID'];

    $sentencia = $conexion->prepare("SELECT * FROM `sistema_de_pago` WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Cedula", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    if($registro){
        $cedula = $registro['Cedula'];
        $nombre = $registro['Nombre'];
        $contrato = $registro['Contrato'];
        $profesion = $registro['Profesion'];
        $monto = $registro['Monto'];
        $genero = $registro['Genero'];
        $fechaingreso = $registro['Fechaingreso'];
    } else {
        header("Location:index.php");
        exit();
    }
} else {
    header("Location:index.php");
    exit();
}

if ($_POST) {
    $cedula = (isset($_POST["Cedula"]) ? $_POST["Cedula"] : "");
    $nombre = (isset($_POST["Nombre"]) ? $_POST["Nombre"] : "");
    $contrato = (isset($_POST["Contrato"]) ? $_POST["Contrato"] : "");
    $profesion = (isset($_POST["Profesion"]) ? $_POST["Profesion"] : "");
    $monto = (isset($_POST["Monto"]) ? $_POST["Monto"] : "");
    $genero = (isset($_POST["Genero"]) ? $_POST["Genero"] : ""); 
    $fechaingreso = (isset($_POST["Fechaingreso"]) ? $_POST["Fechaingreso"] : "");

    $sentencia = $conexion->prepare("UPDATE `sistema_de_pago` SET `Nombre`=:Nombre, `Contrato`=:Contrato, `Profesion`=:Profesion, `Monto`=:Monto, `Genero`=:Genero, `Fechaingreso`=:Fechaingreso WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Cedula", $cedula);
    $sentencia->bindParam(":Nombre", $nombre);
    $sentencia->bindParam(":Contrato", $contrato);
    $sentencia->bindParam(":Profesion", $profesion);
    $sentencia->bindParam(":Monto", $monto);
    $sentencia->bindParam(":Genero", $genero);
    $sentencia->bindParam(":Fechaingreso", $fechaingreso);
    $sentencia->execute();
    header("Location:index.php");
    exit(); 
}
?>

<?php include("../../diseños/header.php"); ?>
<br/>
<div class="container">
    <div class="card">
        <div class="card-header">
            Datos del sistema de pago
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="Cedula" class="form-label">Cedula</label>
                    <input type="text" class="form-control" name="Cedula" id="Cedula" aria-describedby="helpId" placeholder="Cedula" value="<?php echo $cedula; ?>" readonly/>
                </div>

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre" value="<?php echo $nombre; ?>"/>
                </div>

                <div class="mb-3">
                    <label for="Contrato" class="form-label">Contrato</label>
                    <input type="text" class="form-control" name="Contrato" id="Contrato" aria-describedby="helpId" placeholder="Contrato" value="<?php echo $contrato; ?>"/>
                </div>

                <div class="mb-3">
                    <label for="Profesion" class="form-label">Profesión</label>
                    <input type="text" class="form-control" name="Profesion" id="Profesion" aria-describedby="helpId" placeholder="Profesión" value="<?php echo $profesion; ?>"/>
                </div>

                <div class="mb-3">
                    <label for="Monto" class="form-label">Monto</label>
                    <input type="number" class="form-control" name="Monto" id="Monto" aria-describedby="helpId" placeholder="Monto" value="<?php echo $monto; ?>"/>
                </div>

                <div class="mb-3">
                    <label for="Genero" class="form-label">Género</label>
                    <select class="form-select form-select-sm" name="Genero" id="Genero">
                        <option value="Masculino" <?php echo ($genero == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                        <option value="Femenino" <?php echo ($genero == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Fechaingreso" class="form-label">Fecha de ingreso</label>
                    <input type="date" class="form-control" name="Fechaingreso" id="Fechaingreso" aria-describedby="emailHelpId" placeholder="Fecha de ingreso" value="<?php echo $fechaingreso; ?>" />
                </div>

                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php include("../../diseños/footer.php"); ?>
