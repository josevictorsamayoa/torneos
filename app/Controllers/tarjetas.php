<?php

namespace App\Controllers;

use App\Models\partidosModel;
use App\Models\jugadoresModel;
use App\Models\tarjetasModel;

class tarjetas extends BaseController
{
	function index()
	{
		return view('Trajetas_View');
	}

    
   	//Funcion para llenado de tabla con los datos de los equipos
    function tarjeta(){
        $tarjetasModel = new tarjetasModel();
        
        $data['tarjeta_data'] = $tarjetasModel->orderBy('id_tarjeta', 'DESC')->paginate(10);

       // print_r($data['tarjeta_data']) ;

        $data['pagination_link'] = $tarjetasModel->pager;

        return view('Trajetas_View', $data);
    }

	//Funcion que muestra la vista de crear jugadores
	function agregar_tarjetas(){
		$jugadoresModel = new jugadoresModel();
        $data['jugador_data'] = $jugadoresModel->findAll();
        $partidosModel = new partidosModel();
        $data['partido_data'] = $partidosModel->findAll();
		return view('Crear_Tarjeta', $data);
    }


	//Funcion para agregar nuevos equipos
	function add_validation_tarjeta(){
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

        if(!$error)
        {
        	echo view('Crear_Tarjeta', [
                'error' => $this->validator
            ]);
        } 
        else 
        {
            $tarjetasModel = new tarjetasModel();
            
            $tarjetasModel->save([
                'id_jugador'        => $this->request->getVar('id_jugador'),
                'id_partido'        => $this->request->getVar('id_partido'),
				'color_tarjeta'     => $this->request->getVar('color_tarjeta'),
				'fecha'             => $this->request->getVar('fecha'),
				'motivo'            => $this->request->getVar('motivo'),
                'estado'            => $this->request->getVar('estado'),
                'cumplio_sansion'   => $this->request->getVar('cumplio_sansion'),
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Tarjeta Agregada');

            return $this->response->redirect(site_url('tarjetas/tarjeta'));
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
		
		 if($error)
		 {
			 $data['tarjeta_data'] = $tarjetasModel->where('id_tarjeta', $id_tarjeta)->first();
			 $data['error'] = $this->validator;
			 echo view('Editar_Equipo', $data);
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