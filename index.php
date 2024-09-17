<?php 
    require_once "libreria_db.php";
    $stmt = $pdo->query("SELECT PER_ID, PER_Nombre, PER_Carnet FROM Persona");
    $personas = $stmt->fetchAll();
    echo "<h2>Agregar Persona</h2>";
?>
    <form method="POST" action="insertar_db.php">
        <label>Nombre:</label>
        <input type="text" name="PER_Nombre" required><br>
        <label>Carné:</label>
        <input type="text" name="PER_Carnet" required><br>
        <input type="submit" value="Agregar">
    </form>

<?php
    echo "<h2>Lista de Personas</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Carné</th>
                <th>Acciones</th>
            </tr>";

    foreach ($personas as $persona) {
        echo "<tr>";
        echo "<td>" . htmlentities($persona['PER_Nombre']) . "</td>";
        echo "<td>" . htmlentities($persona['PER_Carnet']) . "</td>";
        echo "<td>
                <form method='POST' action='eliminar_db.php' style='display:inline;'>
                    <input type='hidden' name='PER_ID' value='" . $persona['PER_ID'] . "'>
                    <input type='submit' value='Eliminar'>
                </form>
                <form method='GET' action='modificar.php' style='display:inline;'>
                    <input type='hidden' name='PER_ID' value='" . $persona['PER_ID'] . "'>
                    <input type='submit' value='Modificar'>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
?>

