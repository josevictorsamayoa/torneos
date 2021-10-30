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
            'id_equipo2' 	        => 'required',
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
            $tarjetasModel = new tarjetasModel();
            
            $tarjetasModel->save([
                'nombre'               => $this->request->getVar('nombre'),
                'id_calendario'        => $this->request->getVar('id_calendario'),
                'fecha_hora_juego'     => $this->request->getVar('fecha_hora_juego'),
				'id_equipo1'           => $this->request->getVar('id_equipo1'),
				'id_equipo2'           => $this->request->getVar('id_equipo2'),
				'jugado'               => $this->request->getVar('jugado'),
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Partido Agregado');

            return $this->response->redirect(site_url('partidos/partido'));
        }
    }

	//Funcion para editar tarjetas
	 function editar_tarjetas ($id_tarjeta = null)
	 {
         $tarjetasModel = new tarjetasModel();
		 $data['tarjeta_data'] = $tarjetasModel->where('id_tarjeta', $id_tarjeta)->first();
		
         $jugadoresModel = new jugadoresModel();
         $data['jugador_data'] = $jugadoresModel->findAll();
         $partidosModel = new partidosModel();
         $data['partido_data'] = $partidosModel->findAll();

		 return view('Editar_Tarjeta', $data);
         //return view('hola');
	 }
 
	 function edit_validation_tarjeta()
	 {
		 helper(['form', 'url']);
		 
		 $error = $this->validate([
			'id_jugador' 	    => 'required',
			'id_partido'        => 'required',
			'color_tarjeta' 	=> 'required',
            'fecha' 	        => 'required',
            'motivo'	        => 'required',
            'estado' 	        => 'required',
            'cumplio_sansion'	=> 'required'
		 ]);
 
		 $tarjetasModel = new tarjetasModel();
 
		 $id_tarjeta = $this->request->getVar('id_tarjeta');
		
		 if(!$error)
		 {
            $tarjetasModel = new tarjetasModel();
            $data['tarjeta_data'] = $tarjetasModel->orderBy('id_tarjeta', 'DESC')->paginate(10);
            $data['pagination_link'] = $tarjetasModel->pager;
    
            echo view('Trajetas_View', $data);
		 } 
		 else 
		 {
			 $data = [
				'id_jugador'        => $this->request->getVar('id_jugador'),
                'id_partido'        => $this->request->getVar('id_partido'),
				'color_tarjeta'     => $this->request->getVar('color_tarjeta'),
				'fecha'             => $this->request->getVar('fecha'),
				'motivo'            => $this->request->getVar('motivo'),
                'estado'            => $this->request->getVar('estado'),
                'cumplio_sansion'   => $this->request->getVar('cumplio_sansion'),
			 ];
 
			 $tarjetasModel->update($id_tarjeta, $data);
 
			 $session = \Config\Services::session();
 
			 $session->setFlashdata('success', 'Tarjeta actualizada');
 
			 return $this->response->redirect(site_url('/tarjetas/tarjeta'));
		 }
	 }

	 //Funcion para eliminar jugadores
	 function eliminar_tarjeta ($id)
    {
        $tarjetasModel = new tarjetasModel();

        $tarjetasModel->where('id_tarjeta', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Tarjeta eliminado');

        return $this->response->redirect(site_url('/tarjetas/tarjeta'));
    }

    
}

?>