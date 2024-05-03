<?php  
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM `evento` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignamos valores a las variables
    $nombreEvento = $registro['NombreEvento'];
    $direccion = $registro['Direccion'];
    $fechaEvento = $registro['FechaEvento'];
}

if ($_POST) {
    // Procesamiento del formulario POST
    $nombreEvento = $_POST['NombreEvento'];
    $direccion = $_POST['Direccion'];
    $fechaEvento = $_POST['FechaEvento'];

    $sentencia = $conexion->prepare("UPDATE `evento` SET NombreEvento=:NombreEvento, Direccion=:Direccion, FechaEvento=:FechaEvento WHERE ID=:ID");
    $sentencia->bindParam(":NombreEvento", $nombreEvento);
    $sentencia->bindParam(":Direccion", $direccion);
    $sentencia->bindParam(":FechaEvento", $fechaEvento);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    header("Location:index.php");
    exit();
}
?>

<?php include("../../diseños/header.php"); ?>
<br/>
<div class="card">
    <div class="card-header">
        Datos del evento
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="NombreEvento" class="form-label">Nombre del evento</label>
                <input type="text" class="form-control" name="NombreEvento" id="NombreEvento" aria-describedby="helpId" placeholder="Nombre del evento" value="<?php echo $nombreEvento; ?>"/>
            </div>

            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="Direccion" id="Direccion" aria-describedby="helpId" placeholder="Dirección" value="<?php echo $direccion; ?>"/>
            </div>

            <div class="mb-3">
                <label for="FechaEvento" class="form-label">Fecha del evento</label>
                <input type="date" class="form-control" name="FechaEvento" id="FechaEvento" aria-describedby="emailHelpId" placeholder="Fecha del evento" value="<?php echo $fechaEvento; ?>" />
            </div>

            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<?php include("../../diseños/footer.php"); ?>
