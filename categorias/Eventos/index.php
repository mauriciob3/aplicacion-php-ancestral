<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))? $_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM `evento` WHERE ID=:ID");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
    header("Location:index.php");
    exit();
}

$sentencia = $conexion->prepare("SELECT ID, NombreEvento, Direccion, FechaEvento FROM `evento`");
$sentencia->execute();
$lista_eventos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../Diseños/header.php"); ?>

<br/>
<h4>Eventos</h4>
<br/>
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="crear.php" role="button">Agregar evento</a>
    </div>

    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del Evento</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Fecha del Evento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_eventos as $evento) { ?>
                        <tr>
                            <td><?php echo $evento['ID']; ?></td>
                            <td><?php echo $evento['NombreEvento']; ?></td>
                            <td><?php echo $evento['Direccion']; ?></td>
                            <td><?php echo $evento['FechaEvento']; ?></td>
                            <td>
                                <a class="btn btn-light" href="editar.php?txtID=<?php echo $evento['ID']; ?>" role="button">Editar</a>
                                <a class="btn btn-secondary" href="index.php?txtID=<?php echo $evento['ID']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../Diseños/footer.php"); ?>
