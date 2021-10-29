<?php

namespace App\Controllers;

use App\Models\UserModel;

class login extends BaseController
{
	function index()
	{
		return view('Login_View');
	}

    public function login() {

		$correo = $this->request->getPost('correo');
		$password = $this->request->getPost('password');
		$Usuario = new UserModel();

		$datosUsuario = $Usuario->obtenerUsuario(['correo' => $correo]);

		if (count($datosUsuario) > 0 && 
			password_verify($password, $datosUsuario[0]['password'])) {

			$data = [
						"correo" => $datosUsuario[0]['correo'],
						"rol" => $datosUsuario[0]['rol'],
                        "nombre" => $datosUsuario[0]['nombre'],
                        "apellido" => $datosUsuario[0]['apellido'],
                        "id_usuario" => $datosUsuario[0]['id_usuario']

					];

			$session = session();
			$session->set($data);

			return redirect()->to(base_url('Login/test'))->with('mensaje','1');

		} else {
			return redirect()->to(base_url('Login'))->with('mensaje','0');
		}


	}

	public function salir() {
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('Login'));
	}
}

?>