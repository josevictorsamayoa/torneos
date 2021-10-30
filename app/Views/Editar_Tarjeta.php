<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Editar Tarjeta</title>
    <!--  -->
</head>
<body>
    <div class="container">
        <!-- Sidebar-->
        <?php 
            include_once '../app/Views/bodies/sidebar.php';
        ?>
        
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
                                        echo '<option value="'.$jugador['id_jugador'].'" selected>'.$jugador['nombre'].' '.$jugador['apellido'].'</option>';
                                    } else {
                                        echo '<option value="'.$jugador['id_jugador'].'">'.$jugador['nombre'].' '.$jugador['apellido'].'</option>';
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
                            <?php
                                if ($tarjeta_data['color_tarjeta'] == 'Amarilla') { ?>
                                    <option value="Amarilla" selected>Amarilla</option>
                                    <option value="Roja">Roja</option>
                            <?php
                                } else if ($tarjeta_data['color_tarjeta'] == 'Roja'){ ?>
                                <option value="Amarilla">Amarilla</option>
                                <option value="Roja" selected>Roja</option>
                            <?php
                                }
                            ?>
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
                        <?php
                            if ($tarjeta_data['estado'] == 'Pagada') { ?>
                                <option value="Pagada" selected>Pagada</option>
                                <option value="No pagada">No Pagada</option>
                        <?php
                            } else if ($tarjeta_data['estado'] == 'No pagada'){ ?>
                            <option value="Pagada">Pagada</option>
                            <option value="No pagada" selected>No Pagada</option>
                        <?php
                            }
                        ?>                           
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
                        <?php
                            if ($tarjeta_data['cumplio_sansion'] == 'Si') { ?>
                                <option value="Si" selected>Si</option>
                                <option value="No">No</option>
                        <?php
                            } else if ($tarjeta_data['cumplio_sansion'] == 'No'){ ?>
                                <option value="Si">Si</option>
                                <option value="No" selected>No</option>
                        <?php
                            }
                        ?>
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