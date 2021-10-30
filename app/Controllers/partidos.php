<?php

namespace App\Controllers;

use App\Models\partidosModel;
use App\Models\equiposModel;
use App\Models\calendarioModel;

class partidos extends BaseController
{
	function index()
	{
		return view('Partidos_View');
	}

    
   	//Funcion para llenado de tabla con los datos de los equipos
    function partido(){
        $partidosModel = new partidosModel();
        $db = \Config\Database::connect();        
        $query = $db->query("SELECT p.id_partido, p.nombre, p.id_calendario, p.fecha_hora_juego, p.id_equipo1, p.id_esquipo2, p.jugado, CONCAT('Del ',c.fecha_inico,' al ', c.fecha_fin) as 'Fechas', e.nombre as 'Equipo_1', e2.nombre as 'Equipo_2' FROM partido p INNER JOIN calendario c ON p.id_calendario=c.id_calendario INNER JOIN equipo e ON p.id_equipo1=e.id_equipo INNER JOIN equipo e2 ON p.id_esquipo2=e2.id_equipo;");
		$data['partido_data'] = $partidosModel->orderBy('id_partido', 'DESC')->paginate(10);
        $data['partido_data'] = $query->getResult();

        $data['pagination_link'] = $partidosModel->pager;

        return view('Partidos_View', $data);
    }

	//Funcion que muestra la vista de crear jugadores
	function agregar_partido(){
		$equiposModel = new equiposModel();
        $data['equipo_data'] = $equiposModel->findAll();

        $calendarioModel = new calendarioModel();
        $data['calendario_data'] = $calendarioModel->findAll();

        $partidosModel = new partidosModel();
        $data['partido_data'] = $partidosModel->findAll();

		return view('Crear_Partidos', $data);
    }


	//Funcion para agregar nuevos equipos
	function add_validation_partido(){
		helper(['form', 'url']);
        
        $error = $this->validate([
            'nombre' 	            => 'required',
            'id_calendario'         => 'required',
			'fecha_hora_juego'      => 'required',
			'id_equipo1' 	        => 'required',
            'id_esquipo2' 	        => 'required',
            'jugado'	            => 'required',
        ]);

        if(!$error)
        {
        	echo view('Crear_Partidos', [
                'error' => $this->validator
            ]);
        } 
        else 
        {
            $partidosModel = new partidosModel();
            
            $partidosModel->save([
                'nombre'               => $this->request->getVar('nombre'),
                'id_calendario'        => $this->request->getVar('id_calendario'),
                'fecha_hora_juego'     => $this->request->getVar('fecha_hora_juego'),
				'id_equipo1'           => $this->request->getVar('id_equipo1'),
				'id_esquipo2'           => $this->request->getVar('id_equipo2'),
				'jugado'               => $this->request->getVar('jugado'),
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Partido Agregado');

            return $this->response->redirect(site_url('partidos/partido'));
        }
    }

	//Funcion para editar tarjetas
	 function editar_partido ($id_partido = null)
	 {
         $partidosModel = new partidosModel();
		 $data['partido_data'] = $partidosModel->where('id_partido', $id_partido)->first();
		
        $calendarioModel = new calendarioModel();
        $data['calendario_data'] = $calendarioModel->findAll();

        $equiposModel = new equiposModel();
        $data['equipo_data'] = $equiposModel->findAll();

		 return view('Editar_Partido', $data);
         //return view('hola');
	 }
 
	 function edit_validation_tarjeta()
	 {
		 helper(['form', 'url']);
		 
		 $error = $this->validate([
			'nombre' 	            => 'required',
            'id_calendario'         => 'required',
			'fecha_hora_juego'      => 'required',
			'id_equipo1' 	        => 'required',
            'id_esquipo2' 	        => 'required',
            'jugado'	            => 'required',
		 ]);
 
		 $partidosModel = new partidosModel();
 
		 $id_partido = $this->request->getVar('id_partido');
		
		 if(!$error)
		 {
            $partidosModel = new partidosModel();
            $data['tarjeta_data'] = $partidosModel->orderBy('id_partido', 'DESC')->paginate(10);
            $data['pagination_link'] = $partidosModel->pager;
    
            echo view('Partidos_View', $data);
		 } 
		 else 
		 {
			 $data = [
				'nombre'               => $this->request->getVar('nombre'),
                'id_calendario'        => $this->request->getVar('id_calendario'),
                'fecha_hora_juego'     => $this->request->getVar('fecha_hora_juego'),
				'id_equipo1'           => $this->request->getVar('id_equipo1'),
				'id_esquipo2'           => $this->request->getVar('id_equipo2'),
				'jugado'               => $this->request->getVar('jugado'),
			 ];
 
			 $partidosModel->update($id_partido, $data);
 
			 $session = \Config\Services::session();
 
			 $session->setFlashdata('success', 'Partido actualizado');
 
			 return $this->response->redirect(site_url('/partidos/partido'));
		 }
	 }

	 //Funcion para eliminar jugadores
	 function eliminar_partido ($id)
    {
        $partidosModel = new partidosModel();

        $partidosModel->where('id_partido', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Tarjeta eliminado');

        return $this->response->redirect(site_url('/partidos/partido'));
    }

    
}

?>