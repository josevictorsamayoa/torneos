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
                <form method="post" action="<?php echo base_url('equipos/edit_validation_equipo'); ?>">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $equipo_data['nombre'];?>"> 

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
                        <label>Entrenador</label>
                        <select name="id_usuario" class="form-control">
                            <?php
                                foreach ($usuario_data as $usuario) {
                                    if ($equipo_data['id_usuario'] == $usuario['id_usuario']) {
                                        echo '<option value="'.$usuario['id_usuario'].'" selected>'.$usuario['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$usuario['id_usuario'].'">'.$usuario['nombre'].'</option>';
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Puntos</label>
                        <input type="number" name="puntos" class="form-control" value="<?php echo $equipo_data['puntos']; ?>">

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
                        <input type="number" name="goles_favor" class="form-control" value="<?php echo $equipo_data['goles_favor']; ?>">

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
                        <input type="number" name="goles_contra" class="form-control" value="<?php echo $equipo_data['goles_contra']; ?>">

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

                    <div class="form-group">
                        <input type="hidden" name="id_equipo" value="<?php echo $equipo_data["id_equipo"]; ?>" />
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