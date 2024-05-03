<?php
include("../../bd.php");

if ($_POST) {
    $primernombre = (isset($_POST["Primernombre"]) ? $_POST["Primernombre"] : "");
    $segundonombre = (isset($_POST["Segundonombre"]) ? $_POST["Segundonombre"] : "");
    $cedula = (isset($_POST["Cedula"]) ? $_POST["Cedula"] : "");
    $contrato = (isset($_POST["Contrato"]) ? $_POST["Contrato"] : "");
    $genero = (isset($_POST["Genero"]) ? $_POST["Genero"] : ""); 
    $fechaingreso = (isset($_POST["Fechaingreso"]) ? $_POST["Fechaingreso"] : "");

    $sentencia = $conexion->prepare("INSERT INTO `contratista` (`Primernombre`, `Segundonombre`, `Cedula`, `Contrato`, `Genero`, `Fechaingreso`) 
    VALUES (:Primernombre, :Segundonombre, :Cedula, :Contrato, :Genero, :Fechaingreso)");
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
<div class="card">
    <div class="card-header">
        Datos del contratista
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="Primernombre" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" name="Primernombre" id="Primernombre" aria-describedby="helpId" placeholder="Primer Nombre"/>
            </div>

            <div class="mb-3">
                <label for="Segundonombre" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" name="Segundonombre" id="Segundonombre" aria-describedby="helpId" placeholder="Segundo Nombre"/>
            </div>

            <div class="mb-3">
                <label for="Cedula" class="form-label">Cedula</label>
                <input type="text" class="form-control" name="Cedula" id="Cedula" aria-describedby="helpId" placeholder="Cedula"/>
            </div>

            <div class="mb-3">
                <label for="Contrato" class="form-label">Contrato</label>
                <input type="text" class="form-control" name="Contrato" id="Contrato" aria-describedby="helpId" placeholder="Contrato"/>
            </div>

            <div class="mb-3">
                <label for="Genero" class="form-label">Género</label>
                <select class="form-select form-select-sm" name="Genero" id="Genero">
                    <option selected>Seleccione género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Fechaingreso" class="form-label">Fecha de ingreso</label>
                <input type="date" class="form-control" name="Fechaingreso" id="Fechaingreso" aria-describedby="emailHelpId" placeholder="Fecha de ingreso" />
            </div>

            <button type="submit" class="btn btn-success">Agregar registro</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<?php include("../../diseños/footer.php"); ?>
