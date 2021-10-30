<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamusqueros Home Page</title>
    <style>
    </style>
</head>
<body>
   
    <div class="wrapper">
     <!--Top Menu & Menu button-->
 
        <div class="sidebar">
            <div class="profile">
                <!--Profile Image-->
                <img src="../img/logosiu.jpg">
                <!--Profile Title & Descruption-->
                <h3>Los Tukis</h3>
                <p>Admin</p>
            </div>
             <!--Menu item-->
             <ul>
                <li>
                    <a href="<?php echo base_url("/equipos/equipo")?>" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Equipos</span>
                    </a>
                </li>
                <li>
                    <a href="torneos.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Partidos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Tarjetas</span>
                    </a>
                </li>
                <li>
                    <a href="pagos.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Posiciones</span>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Salir</span>
                    </a>
                </li>
            </ul>
       </div>
        
    </div>
  <script>
     
  </script>
</body>
</html>
