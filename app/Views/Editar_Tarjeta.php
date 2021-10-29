<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Editar Tarjeta</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <?php 
        $validation = \Config\Services::validation();
        ?>
        <h2 class="text-center mt-4 mb-4">Editar Tarjeta</h2>
        <div class="card">
            <div class="card-header">Editar Tarjeta</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('tarjetas/edit_validation_tarjeta'); ?>">
                <div class="form-group">
                        <label>Jugador</label>
                        <select name="id_jugador" class="form-control">
                            <?php
                                foreach ($jugador_data as $jugador) {
                                    if ($tarjeta_data['id_jugador'] == $jugador['id_jugador']) {
                                        echo '<option value="'.$jugador['id_jugador'].'" selected>'.$jugador['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$jugador['id_jugador'].'">'.$jugador['nombre'].'</option>';
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>
                 
                    <div class="form-group">
                        <label>Partido</label>
                        <select name="id_partido" class="form-control">
                            <?php
                                foreach ($partido_data as $partido) {
                                    if ($tarjeta_data['id_partido'] == $partido['id_partido']) {
                                        echo '<option value="'.$partido['id_partido'].'" selected>'.$partido['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$partido['id_partido'].'">'.$partido['nombre'].'</option>';
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Color de Tarjeta</label>
                        <select name="color_tarjeta" class="form-control" value="<?php echo $tarjeta_data['color_tarjeta']; ?>">                            
                            <option value="">Amarilla</option>
                            <option value="">Roja</option>                            
                        </select>
                        <?php
                        if($validation->getError('color_tarjeta'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('color_tarjeta')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="<?php echo $tarjeta_data['fecha']; ?>">

                        <?php 
                        if($validation->getError('fecha'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('fecha')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Motivo</label>
                        <input type="text" name="motivo" class="form-control" value="<?php echo $tarjeta_data['motivo']; ?>">
                        <?php
                        if($validation->getError('motivo'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('motivo')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" class="form-control" value="<?php echo $tarjeta_data['estado']; ?>">
                            <option value="">Seleccione una opción</option>
                            <option value="">Pagada</option>
                            <option value="">No Pagada</option>                            
                        </select>
                        <?php
                        if($validation->getError('estado'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('estado')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Sansión Cumplida</label>
                        <select name="cumplio_sansion" class="form-control" value="<?php echo $tarjeta_data['cumplio_sansion']; ?>">
                            <option value="">Seleccione una opción</option>
                            <option value="">Si</option>
                            <option value="">No</option>                            
                        </select>
                        <?php
                        if($validation->getError('cumplio_sansion'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('cumplio_sansion')."
                            </div>
                            ";
                        }
                        ?>
                    </div>                    

                    <div class="form-group">
                        <input type="hidden" name="id_tarjeta" value="<?php echo $tarjeta_data["id_tarjeta"]; ?>" />
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