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

	function main(){

		return view('main.php');
	}

	
	function torneos(){

		return view('torneos.php');
	}

	function pagos(){
		return view('pagos.php');
	}
	//Funcion para llenado de tabla con los datos de los jugadores
    function jugadores($id_equipo = null){
        $jugadoresModel = new jugadoresModel();

        $data['jugador_data'] = $jugadoresModel->where('id_equipo', $id_equipo)->orderBy('id_jugador', 'DESC')->paginate(10);

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
			'cui'		=> 'required',
            'id_equipo'	=> 'required',
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
				'cui'   => $this->request->getVar('cui'),
				'id_equipo'   => $this->request->getVar('id_equipo'),
				'numero'   => $this->request->getVar('camisola'),
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Jugador Agregado');

            return $this->response->redirect(site_url('torneos/jugadores/'.$this->request->getVar('id_equipo')));
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
			'cui'		=> 'required',
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
				'cui'   => $this->request->getVar('cui'),
				'id_equipo'   => $this->request->getVar('id_equipo'),
				'numero'   => $this->request->getVar('numero'),
			 ];
 
			 $jugadoresModel->update($id_jugador, $data);
 
			 $session = \Config\Services::session();
 
			 $session->setFlashdata('success', 'Jugador actualizado');
			 
			 return $this->response->redirect(site_url('torneos/jugadores/'.$this->request->getVar('id_equipo')));
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

}

?>