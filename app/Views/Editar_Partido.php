<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Editar Partido</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <?php 
        $validation = \Config\Services::validation();
        ?>
        <h2 class="text-center mt-4 mb-4">Editar Partido</h2>
        <div class="card">
            <div class="card-header">Editar Partido</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('partidos/edit_validation_partido'); ?>">
                <div class="form-group">
                        <label>Partido</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $partido_data['nombre'];?>"> 

                        <!-- Error -->
                        <?php 
                        if($validation->getError('nombre'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('nombre')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                 
                    <div class="form-group">
                        <label>Fechas</label>
                        <select name="id_calendario" class="form-control">
                            <?php/*
                                foreach ($calendario_data as $calendario) {
                                    if ($partido_data['id_calendario'] == $calendario['id_calendario']) {
                                        echo '<option value="'.$calendario['id_calendario'].'" selected>Del '.$calendario['fecha_inicio'].' al '.$calendario['fecha_fin'].'</option>';
                                    } else {
                                        echo '<option value="'.$calendario['id_calendario'].'">Del '.$calendario['fecha_inicio'].' al '.$calendario['fecha_fin'].'</option>';
                                    }
                                }*/
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Fecha del juego</label>
                        <input type="datetime-local" name="fecha_hora_juego" class="form-control" value="<?php echo $partido_data['fecha_hora_juego'];?>">
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
                            <?php
                                foreach ($equipo_data as $equipo) {
                                    if ($partido_data['id_equipo1'] == $equipo['id_equipo']) {
                                        echo '<option value="'.$equipo['id_equipo'].'" selected>'.$equipo['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$equipo['id_equipo'].'">'.$equipo['nombre'].'</option>';
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Equipo 2</label>
                        <select name="id_esquipo2" class="form-control">
                            <?php
                                foreach ($equipo_data as $equipo) {
                                    if ($partido_data['id_esquipo2'] == $equipo['id_equipo']) {
                                        echo '<option value="'.$equipo['id_equipo'].'" selected>'.$equipo['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$equipo['id_equipo'].'">'.$equipo['nombre'].'</option>';
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>                    

                    <div class="form-group">
                        <label>¿Partido jugado?</label>
                        <select name="jugado" class="form-control" value="<?php echo $partido_data['jugado']; ?>">
                        <?php
                            if ($partido_data['jugado'] == 'Si') { ?>
                                <option value="Si" selected>Si</option>
                                <option value="No">No</option>
                        <?php
                            } else if ($partido_data['jugado'] == 'No'){ ?>
                                <option value="Si">Si</option>
                                <option value="No" selected>No</option>
                        <?php
                            }
                        ?>
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
                        <input type="hidden" name="id_partido" value="<?php echo $partido_data["id_partido"]; ?>" />
                        <button type="submit" class="btn btn-primary">Editar</button> 
                        <!--<button type="submit" href="/tarjetas/tarjeta" class="btn btn-danger btn-sm">Cancelar</button>  -->                     
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
	background-image: url(../../img/estadio.jpg);
	background-repeat: no repeat;
} 

</style>