<?php

namespace App\Models;

use CodeIgniter\Model;

class calendarioModel extends Model
{
	protected $table = 'calendario';

	protected $primaryKey = 'id_calendario';

	protected $allowedFields = ['fecha_inicio', 'fecha_fin'];
}

?>