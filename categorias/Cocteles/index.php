<?php
// Ruta base
$url_base = "http://localhost/ANCESTRAL/";

// Incluir el encabezado
include('../../Diseños/header.php');
?>

<!-- Estilos adicionales para la interacción -->
<style>
    .coctel-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .coctel-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Contenido principal -->
<div class="container">
    <div class="row">
        <?php
        // Obtener las imágenes de los cocteles de la carpeta 'Diseños/img/Cocteles'
        $imagenes = glob('../../Diseños/img/Cocteles/*.png');

        // Mostrar las imágenes
        foreach ($imagenes as $imagen) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card coctel-card">';
            echo '<img src="' . $imagen . '" class="card-img-top" alt="Coctel">';
            echo '</div>'; // card
            echo '</div>'; // col-md-4
        }
        ?>
    </div> <!-- row -->
</div> <!-- container -->

<?php
// Incluir el pie de página
include('../../Diseños/footer.php');
?>
