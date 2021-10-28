<?php

namespace App\Models;

use CodeIgniter\Model;

class jugadoresModel extends Model
{
	protected $table = 'jugador';

	protected $primaryKey = 'id_jugador';

	protected $allowedFields = ['id_equipo', 'nombre', 'apellido', 'acta_nacimiento', 'fecha_nac', 'numero'];

}

?>