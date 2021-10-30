<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Agregar Partidos</title>
    <!--  -->
</head>
<body>


    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Agregar Partidos</h2>

        <?php

        
        print_r($calendario_data) ;


        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Ingrese los datos del partido</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>       
            
            <div class="card-body">
                <form method="post" action="<?php echo base_url("/partidos/add_validation_partido")?>">
                    <div class="form-group">
                            <label>Partido</label>
                            <select name="nombre" class="form-control">
                                <option value="">Seleccione un partido</option>
                                <?php
                                    foreach ($partido_data as $partido) {
                                        echo '<option value="'.$partido['nombre'].'">'.$partido['nombre'].'</option>';
                                    }
                                ?>
                                
                            </select>
                    </div>  
                    
                    <div class="form-group">
                            <label>Fechas</label>
                            <select typer="text" name="id_calendario" class="form-control">
                                <option value="">Seleccione un opción</option>
                                <?php/*
                                    foreach ($calendario_data as $calendario) {
                                        echo '<option value="'.$calendario['id_calendario'].'">'.$calendario['fecha_inicio'].' '.$calendario['fecha_fin'].'</option>';
                                    }*/
                                ?>
                                
                            </select>
                    </div>
            
                    <div class="form-group">
                        <label>Fecha del juego</label>
                        <input type="datetime-local" name="fecha_hora_juego" class="form-control" />
                        <?php
                        if($validation->getError('fecha_hora_juego'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('fecha_hora_juego')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                            <label>Equipo 1</label>
                            <select name="id_equipo1" class="form-control">
                                <option value="">Seleccione un equipo</option>
                                <?php
                                    foreach ($equipo_data as $equipo) {
                                        echo '<option value="'.$equipo['id_equipo'].'">'.$equipo['nombre'].'</option>';
                                    }
                                ?>
                                
                            </select>
                    </div>

                    <div class="form-group">
                            <label>Equipo 2</label>
                            <select name="id_equipo2" class="form-control">
                                <option value="">Seleccione un equipo</option>
                                <?php
                                    foreach ($equipo_data as $equipo) {
                                        echo '<option value="'.$equipo['id_equipo'].'">'.$equipo['nombre'].'</option>';
                                    }
                                ?>
                                
                            </select>
                    </div>

                    <div class="form-group">
                        <label>¿Partido jugado?</label>
                        <select name="jugado" class="form-control">
                            <option value="">Seleccione una opción</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>                            
                        </select>
                        <?php
                        if($validation->getError('jugado'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('jugado')."
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