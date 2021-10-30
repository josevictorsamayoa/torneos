<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Agregar Jugadores</title>
    <!--  -->
</head>
<body>

   <!-- Sidebar-->
   <?php 
        include_once '../app/Views/bodies/sidebar.php';
    ?>
    <div class="container  col-8">
        
        <h2 class="text-center mt-4 mb-4">Agregar Jugadores</h2>

        <?php        
        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Ingrese los datos del equipo</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>
            
            
            <div class="card-body">
                <form method="post" action="<?php echo base_url("/equipos/add_validation_equipo")?>">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" />
                        <?php
                        if($validation->getError('nombre'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('nombre').'</div>';
                        }
                        ?>
                    </div>
                               
                    <div class="form-group">
                        <label>Entrenador</label>
                        <select name="id_usuario" class="form-control">
                            <option value="">Seleccione un entrenador</option>
                            <?php
                                foreach ($usuario_data as $usuario) {
                                    echo '<option value="'.$usuario['id_usuario'].'">'.$usuario['nombre'].'</option>';
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Puntos</label>
                        <input type="number" name="puntos" class="form-control" />
                        <?php
                        if($validation->getError('puntos'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('puntos')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Goles a Favor</label>
                        <input type="number" name="goles_favor" class="form-control" />
                        <?php
                        if($validation->getError('goles_favor'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('goles_favor')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Goles en Contra</label>
                        <input type="number" name="goles_contra" class="form-control" />
                        <?php
                        if($validation->getError('goles_contra'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('goles_contra')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                                                          
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Agregar</button>
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