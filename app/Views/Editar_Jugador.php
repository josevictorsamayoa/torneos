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
                <form method="post" action="<?php echo base_url('crud/edit_validation'); ?>">
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" value="<?php/* echo $user_data['nombres']; */?>"> 

                        <!-- Error -->
                        <?php 
                        if($validation->getError('nombres'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('nombres')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                 
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="<?php/* echo $user_data['apellidos']; */?>">

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
                        <input type="text" name="actanac" class="form-control" value="<?php /*echo $user_data['actanac']; */?>">

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
                        <input type="date" name="fecnac" class="form-control" value="<?php /*echo $user_data['fecnac']; */?>">

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
                        <select name="equipo" class="form-control">
                            <option value="">Seleccione un Equipo</option>
                            <option value="Male" <?php /*if($user_data['equipo'] == 'Male') echo 'selected';*/ ?>>1</option>
                            <option value="Female" <?php/* if($user_data['equipo'] == 'Female') echo 'selected';*/ ?>>2</option>
                        </select>

                        <?php 
                        if($validation->getError('equipo'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('equipo')."
                            </div>
                            ";
                        }
                        ?>
                    </div>


                    <div class="form-group">
                        <label>No. Camisola</label>
                        <input type="text" name="camisola" class="form-control" value="<?php /*echo $user_data['camisola']; */?>">

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
                        <input type="hidden" name="id" value="<?php /*echo $user_data["id"];*/ ?>" />
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