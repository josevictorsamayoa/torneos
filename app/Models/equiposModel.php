<?php

namespace App\Models;

use CodeIgniter\Model;

class equiposModel extends Model
{
	protected $table = 'equipo';

	protected $primaryKey = 'id_equipo';

	protected $allowedFields = ['nombre', 'id_usuario', 'puntos', 'goles_favor', 'goles_contra'];
}

?>