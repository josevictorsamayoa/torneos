<?php

namespace App\Controllers;

use App\Models\UserModel;

class usuarios extends BaseController
{
	function index()
	{
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id_usuario', 'DESC')->paginate(10);
        $data['pagination_link'] = $userModel->pager;

		return view('UserView', $data);
	}

	//Funcion que muestra la vista de crear jugadores
	function agregar_usuario(){
		return view('CreateUserView');
    }


	//Funcion para agregar nuevos jugadores
	function add_validation_user(){
		helper(['form', 'url']);
        
        $error = $this->validate([
            'nombre' 	=> 'required|min_length[3]',
			'apellido' => 'required|min_length[3]',
			'rol' 	=> 'required',
            'correo' 	=> 'required',
            'password'	=> 'required|min_length[3]'
        ]);

		if(!$error)
        {
        	echo view('CreateUserView', [
                'error' => $this->validator
            ]);
        } 
        else 
        {
            $userModel = new UserModel();
            
            $userModel->save([
                'nombre'   => $this->request->getVar('nombre'),
                'apellido'  => $this->request->getVar('apellido'),
				'rol'   => $this->request->getVar('rol'),
				'correo'   => $this->request->getVar('correo'),
				'password'   => $this->request->getVar('password')
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Usuario Agregado');

            return $this->response->redirect(site_url('usuarios/index'));
        }
    }

	//Funcion para editar jugadores
	 function editar_usuario ($id_user = null)
	 {
		 $userModel = new UserModel();
		 $data['user'] = $userModel->where('id_usuario', $id_user)->first();

		 return view('EditUserView', $data);
	 }
 
	 function edit_validation_user()
	 {
		 helper(['form', 'url']);
		 
		 $error = $this->validate([
            'nombre' 	=> 'required|min_length[3]',
			'apellido' => 'required|min_length[3]',
			'rol' 	=> 'required',
            'correo' 	=> 'required',
            'password'	=> 'required|min_length[3]'
        ]);
 
		 $userModel = new UserModel();
 
		 $id_user = $this->request->getVar('id_user');
		
		 if(!$error)
		 {
			$userModel = new UserModel();
			$data['user'] = $userModel->where('id_usuario', $id_user)->first();
   
			return view('EditUserView', $data);
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
 
			 $userModel->update($id_user, $data);
 
			 $session = \Config\Services::session();
 
			 $session->setFlashdata('success', 'Jugador actualizado');
 
			 return $this->response->redirect(site_url('/torneos/jugadores'));
		 }
	 }

	 //Funcion para eliminar jugadores
	 function eliminar_usuario ($id)
    {
        $userModel = new UserModel();

        $userModel->where('id_usuario', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Jugador eliminado');

        return $this->response->redirect(site_url('/usuarios/index'));
    }
}

?>