<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("DELETE FROM `contratista` WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Cedula", $txtID);
    $sentencia->execute();
    header("Location:index.php");
    exit();
}

$sentencia = $conexion->prepare("SELECT Cedula, Primernombre, Segundonombre, Contrato, Genero, Fechaingreso FROM `contratista`");
$sentencia->execute();
$lista_contratistas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../diseños/header.php"); ?>

<br/>
<h4>Contratistas</h4>
<br/>
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>

    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Contrato</th>
                        <th scope="col">Género</th>
                        <th scope="col">Fecha ingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_contratistas as $registro) { ?>
                        <tr>
                            <td><?php echo isset($registro['Cedula']) ? $registro['Cedula'] : ''; ?></td>
                            <td><?php echo (isset($registro['Primernombre']) && isset($registro['Segundonombre'])) ? $registro['Primernombre'] . ' ' . $registro['Segundonombre'] : ''; ?></td>
                            <td><?php echo isset($registro['Contrato']) ? $registro['Contrato'] : ''; ?></td>
                            <td><?php echo isset($registro['Genero']) ? $registro['Genero'] : ''; ?></td>
                            <td><?php echo isset($registro['Fechaingreso']) ? $registro['Fechaingreso'] : ''; ?></td>
                            <td>
                                <a class="btn btn-warning" href="editar.php?txtID=<?php echo isset($registro['Cedula']) ? $registro['Cedula'] : ''; ?>" role="button">Editar</a>
                                <a class="btn btn-secondary" href="index.php?txtID=<?php echo isset($registro['Cedula']) ? $registro['Cedula'] : ''; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../diseños/footer.php"); ?>
