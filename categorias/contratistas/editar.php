<?php  
include("../../bd.php");

// Verificamos si se recibió la variable txtID en la URL
if(isset($_GET['txtID'])){
    $txtID = $_GET['txtID']; // Obtenemos el valor de txtID

    // Preparamos la consulta para obtener los datos del contratista con la cédula correspondiente
    $sentencia = $conexion->prepare("SELECT * FROM `contratista` WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Cedula", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Si se encontró un registro, asignamos los valores a las variables correspondientes
    if($registro){
        $primernombre = $registro['Primernombre'];
        $segundonombre = $registro['Segundonombre'];
        $cedula = $registro['Cedula'];
        $contrato = $registro['Contrato'];
        $genero = $registro['Genero'];
        $fechaingreso = $registro['Fechaingreso'];
    } else {
        // Si no se encontró el registro, redirigimos a la página principal
        header("Location:index.php");
        exit();
    }
} else {
    // Si no se recibió la variable txtID en la URL, redirigimos a la página principal
    header("Location:index.php");
    exit();
}

// Verificamos si se envió el formulario por POST
if ($_POST) {
    // Actualizamos los valores con los datos del formulario
    $primernombre = (isset($_POST["Primernombre"]) ? $_POST["Primernombre"] : "");
    $segundonombre = (isset($_POST["Segundonombre"]) ? $_POST["Segundonombre"] : "");
    $cedula = (isset($_POST["Cedula"]) ? $_POST["Cedula"] : "");
    $contrato = (isset($_POST["Contrato"]) ? $_POST["Contrato"] : "");
    $genero = (isset($_POST["Genero"]) ? $_POST["Genero"] : ""); 
    $fechaingreso = (isset($_POST["Fechaingreso"]) ? $_POST["Fechaingreso"] : "");

    // Preparamos la consulta para actualizar los datos del contratista
    $sentencia = $conexion->prepare("UPDATE `contratista` SET `Primernombre`=:Primernombre, `Segundonombre`=:Segundonombre, `Cedula`=:Cedula, `Contrato`=:Contrato, `Genero`=:Genero, `Fechaingreso`=:Fechaingreso WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Primernombre", $primernombre);
    $sentencia->bindParam(":Segundonombre", $segundonombre);
    $sentencia->bindParam(":Cedula", $cedula);
    $sentencia->bindParam(":Contrato", $contrato);
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
            Datos del contratista
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="Primernombre" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" name="Primernombre" id="Primernombre" aria-describedby="helpId" placeholder="Primer Nombre" value="<?php echo $primernombre; ?>"/>
                </div>

                <div class="mb-3">
                    <label for="Segundonombre" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" name="Segundonombre" id="Segundonombre" aria-describedby="helpId" placeholder="Segundo Nombre" value="<?php echo $segundonombre; ?>"/>
                </div>

                <div class="mb-3">
                    <label for="Cedula" class="form-label">Cedula</label>
                    <input type="text" class="form-control" name="Cedula" id="Cedula" aria-describedby="helpId" placeholder="Cedula" value="<?php echo $cedula; ?>" readonly/>
                </div>

                <div class="mb-3">
                    <label for="Contrato" class="form-label">Contrato</label>
                    <input type="text" class="form-control" name="Contrato" id="Contrato" aria-describedby="helpId" placeholder="Contrato" value="<?php echo $contrato; ?>"/>
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
