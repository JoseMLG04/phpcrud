<?php 
    require_once "libreria_db.php";
    if (isset($_POST['PER_Nombre']) && isset($_POST['PER_Carnet'])) {
        $nombre = $_POST['PER_Nombre'];
        $carnet = $_POST['PER_Carnet'];
        if (!empty($nombre) && !empty($carnet)) {
            $stmt = $pdo->prepare("INSERT INTO Persona (PER_Nombre, PER_Carnet) VALUES (:nom, :carnet)");
            $stmt->execute(array(
                ':nom' => htmlentities($nombre),
                ':carnet' => htmlentities($carnet)
            ));
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Los campos no son válidos.";
        }
    } else {
        echo "Error: No se enviaron datos válidos.";
    }
?>
