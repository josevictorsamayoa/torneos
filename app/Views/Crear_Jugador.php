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
    <div class="container col-8">
           <!-- Sidebar-->
    <?php 
        include_once '../app/Views/bodies/sidebar.php';
    ?>
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
                <form method="post" action="<?php echo base_url("/torneos/add_validation_jugador")?>">
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" />
                        <?php
                        if($validation->getError('nombres'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('nombres').'</div>';
                        }
                        ?>
                    </div>
                        
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" />
                        <?php
                        if($validation->getError('apellidos'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('apellidos')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Acta de Nacimiento</label>
                        <input type="text" name="actanac" class="form-control" />
                        <?php
                        if($validation->getError('actanac'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('actanac')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" name="fecnac" class="form-control" />
                        <?php
                        if($validation->getError('fecnac'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('fecnac')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Equipo</label>
                        <select name="id_equipo" class="form-control">
                            <option value="">Seleccione un equipo</option>
                            <?php
                                foreach ($equipos_data as $equipo) {
                                    echo '<option value="'.$equipo['id_equipo'].'">'.$equipo['nombre'].'</option>';
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>CUI</label>
                        <input type="number" name="cui" class="form-control" />
                        <?php
                        if($validation->getError('cui'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('cui')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    

                    <div class="form-group">
                        <label>No. Camisola</label>
                        <input type="number" name="camisola" class="form-control" />
                        <?php
                        if($validation->getError('camisola'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('camisola')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                    
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