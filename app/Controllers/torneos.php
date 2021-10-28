<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\jugadoresModel;
use App\Models\equiposModel;

class torneos extends BaseController
{
	function index()
	{
		return view('Login_View');
	}

    function test()

	{
		return view('hola');
	}

	//Funcion para llenado de tabla con los datos de los jugadores
    function jugadores(){
        $jugadoresModel = new jugadoresModel();

        $data['jugador_data'] = $jugadoresModel->orderBy('id_jugador', 'DESC')->paginate(10);

        $data['pagination_link'] = $jugadoresModel->pager;

        return view('Jugadores_View', $data);
    }

	//Funcion que muestra la vista de crear jugadores
	function agregar_jugadores(){
		$equiposModel = new equiposModel();
        $data['equipos_data'] = $equiposModel->findAll();
		return view('Crear_Jugador', $data);
    }


	//Funcion para agregar nuevos jugadores
	function add_validation_jugador(){
		helper(['form', 'url']);
        
        $error = $this->validate([
            'nombres' 	=> 'required|min_length[3]',
			'apellidos' => 'required|min_length[3]',
			'actanac' 	=> 'required|min_length[3]',
            'fecnac' 	=> 'required|valid_date',
            'equipo'	=> 'required',
			'camisola'	=> 'required'
        ]);

        if(!$error)
        {
        	echo view('Crear_Jugador', [
                'error' => $this->validator
            ]);
        } 
        else 
        {
            $jugadoresModel = new jugadoresModel();
            
            $jugadoresModel->save([
                'nombre'   => $this->request->getVar('nombres'),
                'apellido'  => $this->request->getVar('apellidos'),
				'acta_nacimiento'   => $this->request->getVar('actanac'),
				'fecha_nac'   => $this->request->getVar('fecnac'),
				'id_equipo'   => $this->request->getVar('equipo'),
				'numero'   => $this->request->getVar('camisola'),
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Usuario Agregado');

            return $this->response->redirect(site_url('torneos/jugadores'));
        }
    }

	//Funcion para editar jugadores
	 function editar_jugadores ($id_jugador = null)
	 {
		 $jugadoresModel = new jugadoresModel();
		 $data['jugador_data'] = $jugadoresModel->where('id_jugador', $id_jugador)->first();
		
		 $equiposModel = new equiposModel();
         $data['equipos_data'] = $equiposModel->findAll();

		 return view('Editar_Jugador', $data);
	 }
 
	 function edit_validation_jugador()
	 {
		 helper(['form', 'url']);
		 
		 $error = $this->validate([
			'nombre' 	=> 'required|min_length[3]',
			'apellidos' => 'required|min_length[3]',
			'acta_nacimiento' 	=> 'required|min_length[3]',
            'fecha_nac' 	=> 'required|valid_date',
            'id_equipo'	=> 'required',
			'numero'	=> 'required'
		 ]);
 
		 $jugadoresModel = new jugadoresModel();
 
		 $id_jugador = $this->request->getVar('id_jugador');
		
		 if($error)
		 {
			 $data['jugador_data'] = $jugadoresModel->where('id_jugador', $id_jugador)->first();
			 $data['error'] = $this->validator;
			 echo ('Error');
			 echo view('Editar_Jugador', $data);
		 } 
		 else 
		 {
			 $data = [
				'nombre'   => $this->request->getVar('nombre'),
                'apellido'  => $this->request->getVar('apellido'),
				'acta_nacimiento'   => $this->request->getVar('acta_nacimiento'),
				'fecha_nac'   => $this->request->getVar('fecha_nac'),
				'id_equipo'   => $this->request->getVar('id_equipo'),
				'numero'   => $this->request->getVar('numero'),
			 ];
 
			 $jugadoresModel->update($id_jugador, $data);
 
			 $session = \Config\Services::session();
 
			 $session->setFlashdata('success', 'Jugador actualizado');
 
			 return $this->response->redirect(site_url('/torneos/jugadores'));
		 }
	 }

	 //Funcion para eliminar jugadores
	 function eliminar_jugador ($id)
    {
        $jugadoresModel = new jugadoresModel();

        $jugadoresModel->where('id_jugador', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Jugador eliminado');

        return $this->response->redirect(site_url('/torneos/jugadores'));
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