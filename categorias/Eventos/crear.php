<?php
include("../../bd.php");

if ($_POST) {
    $nombreEvento = (isset($_POST["NombreEvento"]) ? $_POST["NombreEvento"] : "");
    $direccion = (isset($_POST["Direccion"]) ? $_POST["Direccion"] : "");
    $fechaEvento = (isset($_POST["FechaEvento"]) ? $_POST["FechaEvento"] : "");

    $sentencia = $conexion->prepare("INSERT INTO `evento` (`NombreEvento`, `Direccion`, `FechaEvento`) 
    VALUES (:NombreEvento, :Direccion, :FechaEvento)");
    $sentencia->bindParam(":NombreEvento", $nombreEvento);
    $sentencia->bindParam(":Direccion", $direccion);
    $sentencia->bindParam(":FechaEvento", $fechaEvento);
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
                <label for="NombreEvento" class="form-label">Nombre del Evento</label>
                <input type="text" class="form-control" name="NombreEvento" id="NombreEvento" aria-describedby="helpId" placeholder="Nombre del Evento"/>
            </div>

            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="Direccion" id="Direccion" aria-describedby="helpId" placeholder="Dirección"/>
            </div>

            <div class="mb-3">
                <label for="FechaEvento" class="form-label">Fecha del Evento</label>
                <input type="date" class="form-control" name="FechaEvento" id="FechaEvento" aria-describedby="emailHelpId" placeholder="Fecha del Evento" />
            </div>

            <button type="submit" class="btn btn-success">Agregar evento</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<?php include("../../diseños/footer.php"); ?>
y