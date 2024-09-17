<?php 
    require_once "libreria_db.php";
    if (isset($_POST['PER_ID'])) {
        $id = $_POST['PER_ID'];
        $stmt = $pdo->prepare("DELETE FROM Persona WHERE PER_ID = :id");
        $stmt->execute(array(':id' => $id));
        header("Location: index.php");
        exit();
    } else {
        echo "Error: No se proporcionó un ID válido.";
    }
?>
