<?php

namespace App\Controllers;

use App\Models\equiposModel;
use App\Models\UserModel;

class equipos extends BaseController
{
	function index()
	{
		return view('Equipos_View');
	}


	function main(){

		return view('main.php');
	}

   	//Funcion para llenado de tabla con los datos de los equipos
    function equipo(){
		$db = \Config\Database::connect();
        $equiposModel = new equiposModel();
		$query = $db->query("SELECT e.id_equipo, e.nombre, e.id_usuario, e.puntos, e.goles_favor, e.goles_contra, CONCAT(u.nombre, ' ', u.apellido) as 'entrenador' FROM equipo e INNER JOIN usuario u ON e.id_usuario = u.id_usuario");
		$data['equipo_data'] = $query->getResult();
        $data['pagination_link'] = $equiposModel->pager;

        return view('Equipos_View', $data);
    }

	//Funcion que muestra la vista de crear jugadores
	function agregar_equipos(){
		$UserModel = new UserModel();
        $data['usuario_data'] = $UserModel->findAll();
		return view('Crear_Equipo', $data);
    }


	//Funcion para agregar nuevos equipos
	function add_validation_equipo(){
		helper(['form', 'url']);
        
        $error = $this->validate([
            'nombre' 	=> 'required|min_length[3]',
			'id_usuario' => 'required',
			'puntos' 	=> 'required',
            'goles_favor' 	=> 'required',
            'goles_contra'	=> 'required'
        ]);

        if(!$error)
        {
        	echo view('Crear_Equipo', [
                'error' => $this->validator
            ]);
        } 
        else 
        {
            $equiposModel = new equiposModel();
            
            $equiposModel->save([
                'nombre'   => $this->request->getVar('nombre'),
                'id_usuario'  => $this->request->getVar('id_usuario'),
				'puntos'   => $this->request->getVar('puntos'),
				'goles_favor'   => $this->request->getVar('goles_favor'),
				'goles_contra'   => $this->request->getVar('goles_contra'),
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Equipo Agregado');

            return $this->response->redirect(site_url('equipos/equipo'));
        }
    }

	//Funcion para editar equipos
	 function editar_equipos ($id_equipo = null)
	 {
		 $equiposModel = new equiposModel();
		 $data['equipo_data'] = $equiposModel->where('id_equipo', $id_equipo)->first();
		
		 $UserModel = new UserModel();
         $data['usuario_data'] = $UserModel->findAll();

		 return view('Editar_Equipo', $data);
	 }
 
	 function edit_validation_equipo()
	 {
		 helper(['form', 'url']);
		 
		 $error = $this->validate([
			'nombre' 	=> 'required|min_length[3]',
			'id_usuario' => 'required',
			'puntos' 	=> 'required',
            'goles_favor' 	=> 'required',
            'goles_contra'	=> 'required'
		 ]);
 
		 $equiposModel = new equiposModel();
 
		 $id_equipo = $this->request->getVar('id_equipo');
		
		 if(!$error)
		 {
			 $data['equipo_data'] = $equiposModel->where('id_equipo', $id_equipo)->first();
			 $data['error'] = $this->validator;

			 $UserModel = new UserModel();
         	 $data['usuario_data'] = $UserModel->findAll();
			 echo view('Editar_Equipo', $data);
		 } 
		 else 
		 {
			 $data = [
				'nombre'   => $this->request->getVar('nombre'),
                'id_usuario'  => $this->request->getVar('id_usuario'),
				'puntos'   => $this->request->getVar('puntos'),
				'goles_favor'   => $this->request->getVar('goles_favor'),
				'goles_contra'   => $this->request->getVar('goles_contra'),
			 ];
 
			 $equiposModel->update($id_equipo, $data);
 
			 $session = \Config\Services::session();
 
			 $session->setFlashdata('success', 'Equipo actualizado');
 
			 return $this->response->redirect(site_url('/equipos/equipo'));
		 }
	 }

	 //Funcion para eliminar jugadores
	 function eliminar_equipo ($id)
    {
        $equiposModel = new equiposModel();

        $equiposModel->where('id_equipo', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Equipo eliminado');

        return $this->response->redirect(site_url('/equipos/equipo'));
    }

    
}

?>