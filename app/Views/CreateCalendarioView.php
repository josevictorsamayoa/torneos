<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Agregar Jugadores</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Agregar Jugadores</h2>

        <?php

        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Ingrese los datos del jugador</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>
            
            
            <div class="card-body">
                <form method="post" action="<?php echo base_url("/calendarios/add_validation_calendario")?>">
                    <div class="form-group">
                        <label>Fecha de inicio</label>
                        <input type="date" name="fecha_inico" class="form-control" />
                        <?php
                        if($validation->getError('fecha_inico'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('fecha_inico')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Fecha de fin</label>
                        <input type="date" name="fecha_fin" class="form-control" />
                        <?php
                        if($validation->getError('fecha_fin'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('fecha_fin')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 
</body>
</html>

<style>
body {
	margin: 0;
	background-attachment: fixed;
	background-position: center center;
	background-image: url(../img/estadio.jpg);
	background-repeat: no repeat;
}

</style>