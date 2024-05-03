<?php
include ("diseños/header.php"); // Se ha actualizado la ruta del archivo de encabezado

// Supongo que $_SESSION['Nombreusuario'] está definido en tu script de inicio de sesión.

?>

<br/>

<div class="p-5 mb-4 bg-light rounded-3 text-center">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-dark">BIENVENIDOS AL SISTEMA DE LA CASA ANCESTRAL</h1> <!-- Cambiado el color del texto -->
        <p class="col-md-8 fs-4 text-dark"> <!-- Cambiado el color del texto -->
            Usuario: <?php echo isset($_SESSION['Nombreusuario']) ? $_SESSION['Nombreusuario'] : 'Invitado'; ?>
        </p>
    </div>
</div>

<?php include ("diseños/footer.php"); ?> 
