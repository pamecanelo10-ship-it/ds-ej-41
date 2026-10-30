<?php require_once '../../modelo/auto.php'; 
$Id = $_GET['id'] ?? null;
$Auto = $Id ? Auto::obtenerPorId($Id) : null;
$Titulo = $Auto ? 'Editar Auto' : 'Agregar Auto';
$Accion = $Auto ? 'editar' : 'agregar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $Titulo; ?></h1>

                <form method="POST" action="../acciones.php">
                    <input type="hidden" name="accion" value="<?php echo $Accion; ?>">
                    <?php if ($Auto): ?>
                    <input type="hidden" name="id" value="<?php echo $Auto->Id; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" class="form-control" name="marca" value="<?php echo $Auto ? $Auto->Marca : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Modelo</label>
                        <input type="text" class="form-control" name="modelo" value="<?php echo $Auto ? $Auto->Modelo : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rodado</label>
                        <input type="text" class="form-control" name="rodado" value="<?php echo $Auto ? $Auto->Rodado : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad de Cambios</label>
                        <input type="text" class="form-control" name="cantidadCambios" value="<?php echo $Auto ? $Auto->CantidadCambios : ''; ?>" required>
                    </div>
                    
                    
                   
                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" class="form-control" name="color" value="<?php echo $Auto ? $Auto->Color : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio" value="<?php echo $Auto ? $Auto->Precio : ''; ?>" required>
                    </div>


                    <div class="d-grid gap-2 d-sm-flex">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
