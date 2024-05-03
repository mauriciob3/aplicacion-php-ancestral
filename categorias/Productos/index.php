<?php
// Ruta base
$url_base = "http://localhost/ANCESTRAL/";

// Incluir el encabezado
include('../../Diseños/header.php');
?>

<!-- Estilos adicionales para la interacción -->
<style>
    .producto-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .producto-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Contenido principal -->
<div class="container">
    <div class="row">
        <?php
        // Obtener las imágenes de los productos
        $imagenes = glob('../../Diseños/img/productos/*.jpg');

        // Nombres y precios de los productos
        $productos = array(
            "1" => array("nombre" => "ARRECHON", "precio" => 60000.00),
            "2" => array("nombre" => "CREMA DE VICHE", "precio" => 60000.00),
            "3" => array("nombre" => "TOMASECA", "precio" => 60000.00),
            "4" => array("nombre" => "TUMBACATRE", "precio" => 60000.00),
            "5" => array("nombre" => "VICHE CURAO", "precio" => 60000.00),
            "6" => array("nombre" => "VICHE", "precio" => 60000.00)
        );

        // Mostrar las imágenes y detalles
        foreach ($imagenes as $imagen) {
            // Obtener el nombre del archivo (número de imagen)
            $numero = pathinfo($imagen, PATHINFO_FILENAME);
            // Obtener el nombre y precio del producto
            $nombre = isset($productos[$numero]) ? $productos[$numero]['nombre'] : "Nombre no disponible";
            $precio = isset($productos[$numero]) ? number_format($productos[$numero]['precio'], 2) : "Precio no disponible";

            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card producto-card">';
            echo '<img src="' . $imagen . '" class="card-img-top" alt="' . $nombre . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $nombre . '</h5>';
            echo '<p class="card-text">Precio: $' . $precio . '</p>';
            echo '</div>'; // card-body
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
