<?php

namespace App\Models;

use CodeIgniter\Model;

class tarjetasModel extends Model
{
	protected $table = 'tarjeta';

	protected $primaryKey = 'id_tarjeta';

	protected $allowedFields = ['id_jugador', 'id_partido', 'color_tarjeta', 'fecha', 'motivo', 'estado','cumplio_sansion'];

}

?>