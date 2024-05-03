<?php
// Ruta base
$url_base = "http://localhost/ANCESTRAL/";

// Incluir el encabezado
include('../../Diseños/header.php');
?>

<!-- Estilos adicionales para la interacción -->
<style>
    .imagen-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .imagen-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Contenido principal -->
<div class="container">
    <div class="row">
        <?php
        // Obtener las imágenes de nuestra cultura de la carpeta 'Diseños/img/nuestra_cultura'
        $imagenes = glob('../../Diseños/img/nuestra_cultura/*.png');

        // Mostrar las imágenes
        foreach ($imagenes as $imagen) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card imagen-card">';
            echo '<img src="' . $imagen . '" class="card-img-top" alt="Imagen de nuestra cultura">';
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
