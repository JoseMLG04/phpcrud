<?php 
    require_once "libreria_db.php";
    if (isset($_POST['PER_ID']) && isset($_POST['PER_Nombre']) && isset($_POST['PER_Carnet'])) {
        $id = $_POST['PER_ID'];
        $nombre = $_POST['PER_Nombre'];
        $carnet = $_POST['PER_Carnet'];
        if (!empty($nombre) && !empty($carnet)) {
            $stmt = $pdo->prepare("UPDATE Persona SET PER_Nombre = :nom, PER_Carnet = :carnet WHERE PER_ID = :id");
            $stmt->execute(array(
                ':nom' => htmlentities($nombre),
                ':carnet' => htmlentities($carnet),
                ':id' => $id
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
