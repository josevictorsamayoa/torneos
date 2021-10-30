<div class="wrapper">
     <!--Top Menu & Menu button-->
 
        <div class="sidebar">
            <div class="profile">
                <!--Profile Image-->
                <img src="../../img/logosiu.jpg">
                <!--Profile Title & Descruption-->
                <h3>Los Tukis</h3>
                <p>Admin</p>
            </div>
             <!--Menu item-->
             <ul>
                <li>
                    <a href="<?php echo base_url("/equipos/equipo")?>">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Equipos</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("/partidos/partido")?>">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Partidos</span>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url("/tarjetas/tarjeta")?>">
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
                    <a href="<?php echo base_url("/calendarios/index")?>">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Calendario</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("/usuarios/index")?>">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("/usuarios/login")?>">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Salir</span>
                    </a>
                </li>
            </ul>
       </div>
        
    </div>