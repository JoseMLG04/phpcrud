<?php 
    require_once "libreria_db.php";
    $stmt = $pdo->query("SELECT PER_ID, PER_Nombre, PER_Carnet FROM Persona");
    $personas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Personas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="my-4">Agregar Persona</h2>
                <form method="POST" action="insertar_db.php" class="mb-4">
                    <div class="mb-3">
                        <label for="PER_Nombre" class="form-label">Nombre:</label>
                        <input type="text" name="PER_Nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="PER_Carnet" class="form-label">Carné:</label>
                        <input type="text" name="PER_Carnet" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </form>

                <h2 class="my-4">Lista de Personas</h2>
                <table class="table table-bordered border-primary">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Carné</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($personas as $persona): ?>
                        <tr>
                            <td><?= htmlentities($persona['PER_Nombre']) ?></td>
                            <td><?= htmlentities($persona['PER_Carnet']) ?></td>
                            <td>
                                <form method="POST" action="eliminar_db.php" style="display:inline;">
                                    <input type="hidden" name="PER_ID" value="<?= $persona['PER_ID'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                <form method="GET" action="modificar.php" style="display:inline;">
                                    <input type="hidden" name="PER_ID" value="<?= $persona['PER_ID'] ?>">
                                    <button type="submit" class="btn btn-warning btn-sm">Modificar</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
