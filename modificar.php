<?php 
    require_once "libreria_db.php";
    if (isset($_GET['PER_ID'])) {
        $id = $_GET['PER_ID'];
        $stmt = $pdo->prepare("SELECT PER_Nombre, PER_Carnet FROM Persona WHERE PER_ID = :id");
        $stmt->execute(array(':id' => $id));
        $persona = $stmt->fetch();
        if ($persona) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Modificar Persona</title>
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <h2 class="my-4">Modificar Persona</h2>
                            <form method="POST" action="modificar_db.php" class="mb-4">
                                <input type="hidden" name="PER_ID" value="<?php echo $id; ?>">
                                
                                <div class="mb-3">
                                    <label for="PER_Nombre" class="form-label">Nombre:</label>
                                    <input type="text" name="PER_Nombre" class="form-control" value="<?php echo htmlentities($persona['PER_Nombre']); ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="PER_Carnet" class="form-label">Carné:</label>
                                    <input type="text" name="PER_Carnet" class="form-control" value="<?php echo htmlentities($persona['PER_Carnet']); ?>" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Modificar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>
            <?php
        } else {
            echo "<div class='container'><div class='row justify-content-center'><div class='col-md-6 text-center'><h4 class='my-4 text-danger'>Persona no encontrada.</h4></div></div></div>";
        }
    } else {
        echo "<div class='container'><div class='row justify-content-center'><div class='col-md-6 text-center'><h4 class='my-4 text-danger'>Error: No se proporcionó un ID válido.</h4></div></div></div>";
    }
?>
