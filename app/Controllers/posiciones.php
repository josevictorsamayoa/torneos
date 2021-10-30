<?php

namespace App\Controllers;

use App\Models\UserModel;

class posiciones extends BaseController
{
	function index()
	{
        //$userModel = new UserModel();
        //$data['users'] = $userModel->orderBy('id_usuario', 'DESC')->paginate(10);
        //$data['pagination_link'] = $userModel->pager;

		return view('Posiciones_View');
	}

	
}

?>