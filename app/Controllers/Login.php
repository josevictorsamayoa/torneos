<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
	function index()
	{
		return view('Login_View');
	}

    function test()

	{
		return view('hola');
	}

    function partido(){
        return view('partido');
    }

    // show single user
    function fetch_single_data($id = null)
    {
        $crudModel = new CrudModel();

        $data['user_data'] = $crudModel->where('id', $id)->first();

        return view('edit_data', $data);
    }

    function edit_validation()
    {
    	helper(['form', 'url']);
        
        $error = $this->validate([
            'name' 	=> 'required|min_length[3]',
            'email' => 'required|valid_email',
            'gender'=> 'required'
        ]);

        $crudModel = new CrudModel();

        $id = $this->request->getVar('id');

        if(!$error)
        {
        	$data['user_data'] = $crudModel->where('id', $id)->first();
        	$data['error'] = $this->validator;
        	echo view('edit_data', $data);
        } 
        else 
        {
	        $data = [
	            'name' => $this->request->getVar('name'),
	            'email'  => $this->request->getVar('email'),
	            'gender'  => $this->request->getVar('gender'),
	        ];

        	$crudModel->update($id, $data);

        	$session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');

        	return $this->response->redirect(site_url('/crud'));
        }
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