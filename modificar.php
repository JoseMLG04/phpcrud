<?php 
    require_once "libreria_db.php";
    if (isset($_GET['PER_ID'])) {
        $id = $_GET['PER_ID'];
        $stmt = $pdo->prepare("SELECT PER_Nombre, PER_Carnet FROM Persona WHERE PER_ID = :id");
        $stmt->execute(array(':id' => $id));
        $persona = $stmt->fetch();
        if ($persona) {
            ?>
            <h2>Modificar Persona</h2>
            <form method="POST" action="modificar_db.php">
                <input type="hidden" name="PER_ID" value="<?php echo $id; ?>">
                <label>Nombre:</label>
                <input type="text" name="PER_Nombre" value="<?php echo htmlentities($persona['PER_Nombre']); ?>"><br>
                <label>Edad:</label>
                <input type="text" name="PER_Carnet" value="<?php echo htmlentities($persona['PER_Carnet']); ?>"><br>
                <input type="submit" value="Modificar">
            </form>
            <?php
        } else {
            echo "Persona no encontrada.";
        }
    } else {
        echo "Error: No se proporcionó un ID válido.";
    }
?>
