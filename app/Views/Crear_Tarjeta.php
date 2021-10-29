<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Agregar Tarjetas</title>
    <!--  -->
</head>
<body>


    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Agregar Tarjetas</h2>

        <?php
       // print_r($jugador_data) ;
        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Ingrese los datos</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>       
            
            <div class="card-body">
                <form method="post" action="<?php echo base_url("/tarjetas/add_validation_tarjeta")?>">
                    <div class="form-group">
                            <label>Jugador</label>
                            <select name="id_jugador" class="form-control">
                                <option value="">Seleccione un jugador</option>
                                <?php
                                    foreach ($jugador_data as $jugador) {
                                        echo '<option value="'.$jugador['id_jugador'].'">'.$jugador['nombre'].'</option>';
                                    }
                                ?>
                                
                            </select>
                    </div>          
            
                    <div class="form-group">
                        <label>Partido</label>
                        <select name="id_partido" class="form-control">
                            <option value="">Seleccione un partido</option>
                            <?php
                                foreach ($partido_data as $partido) {
                                    echo '<option value="'.$partido['id_partido'].'">'.$partido['nombre'].'</option>';
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Color de Tarjeta</label>
                        <select name="color_tarjeta" class="form-control">
                            <option value="">Seleccione un color</option>
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
                        <input type="date" name="fecha" class="form-control" />
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
                        <input type="text" name="motivo" class="form-control" />
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
                        <select name="estado" class="form-control">
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
                        <select name="cumplio_sansion" class="form-control">
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