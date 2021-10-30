<?php

namespace App\Models;

use CodeIgniter\Model;

class CalendarioModel extends Model
{
	protected $table = 'calendario';

	protected $primaryKey = 'id_calendario';

	protected $allowedFields = ['fecha_inico', 'fecha_fin', 'estatus'];
}

?>