<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Editar Jugador</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <?php 

        $validation = \Config\Services::validation();


        ?>
        <h2 class="text-center mt-4 mb-4">Editar Jugador</h2>
        <div class="card">
            <div class="card-header">Editar datos</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('torneos/edit_validation_jugador'); ?>">
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $jugador_data['nombre'];?>"> 

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
                        <label>Apellidos</label>
                        <input type="text" name="apellido" class="form-control" value="<?php echo $jugador_data['apellido']; ?>">

                        <?php 
                        if($validation->getError('apellido'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('apellido')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Acta de Nacimiento</label>
                        <input type="text" name="acta_nacimiento" class="form-control" value="<?php echo $jugador_data['acta_nacimiento']; ?>">

                        <?php 
                        if($validation->getError('acta_nacimiento'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('acta_nacimiento')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nac" class="form-control" value="<?php echo $jugador_data['fecha_nac']; ?>">

                        <?php 
                        if($validation->getError('fecha_nac'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('fecha_nac')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Equipo</label>
                        <select name="id_equipo" class="form-control">
                            <?php
                                foreach ($equipos_data as $equipo) {
                                    if ($jugador_data['id_equipo'] == $equipo['id_equipo']) {
                                        echo '<option value="'.$equipo['id_equipo'].'" selected>'.$equipo['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$equipo['id_equipo'].'">'.$equipo['nombre'].'</option>';
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>CUI</label>
                        <input type="number" name="cui" class="form-control" value="<?php echo $jugador_data['cui'];?>">

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
                        <input type="number" name="numero" class="form-control" value="<?php echo $jugador_data['numero'];?>">

                        <?php 
                        if($validation->getError('numero'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('numero')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id_jugador" value="<?php echo $jugador_data["id_jugador"]; ?>" />
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
	background-image: url(../../img/estadio.jpg);
	background-repeat: no repeat;
}

</style>