<?php

namespace App\Controllers;

use App\Models\jugadoresModel;
use App\Models\equiposModel;
use App\Models\UserModel;

class equipos extends BaseController
{
	function index()
	{
		return view('Equipos_View');
	}

   	//Funcion para llenado de tabla con los datos de los equipos
    function equipo(){
        $equiposModel = new equiposModel();
        
        $data['equipo_data'] = $equiposModel->orderBy('id_equipo', 'DESC')->paginate(10);

        //print_r($data['equipo_data']) ;

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
	 function editar_equipos ($id_jugador = null)
	 {
		 $jugadoresModel = new jugadoresModel();
		 $data['jugador_data'] = $jugadoresModel->where('id_jugador', $id_jugador)->first();
		
		 $equiposModel = new equiposModel();
         $data['equipos_data'] = $equiposModel->findAll();

		 return view('Editar_Jugador', $data);
	 }
 
	 function edit_validation_equipo()
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