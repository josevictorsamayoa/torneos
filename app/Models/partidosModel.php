<?php

namespace App\Models;

use CodeIgniter\Model;

class partidosModel extends Model
{
	protected $table = 'partido';

	protected $primaryKey = 'id_partido';

	protected $allowedFields = ['nombre', 'id_calendario', 'fecha_hora_juego', 'id_equipo1', 'id_esquipo2', 'goles_equipo1','goles_equipo2'];

}

?>