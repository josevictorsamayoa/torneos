<?php

namespace App\Controllers;

use App\Models\CalendarioModel;

class calendarios extends BaseController
{
	function index()
	{
        $calendarioModel = new CalendarioModel();
        $data['calendario_data'] = $calendarioModel->orderBy('id_calendario', 'DESC')->paginate(10);
        $data['pagination_link'] = $calendarioModel->pager;

		return view('CalendarioView', $data);
	}

	function agregar_calendario(){
		return view('CreateCalendarioView');
    }


	function add_validation_calendario(){
		helper(['form', 'url']);
        
        $error = $this->validate([
            'fecha_inico' 	=> 'required|valid_date',
            'fecha_fin' 	=> 'required|valid_date'
        ]);

		if(!$error)
        {
        	echo view('CreateCalendarioView', [
                'error' => $this->validator
            ]);
        } 
        else 
        {
            $calendarioModel = new CalendarioModel();
            
            $calendarioModel->save([
                'fecha_inico'   => $this->request->getVar('fecha_inico'),
                'fecha_fin'  => $this->request->getVar('fecha_fin')
            ]);          
            
            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Calendario Agregado');

            return $this->response->redirect(site_url('calendarios/index'));
        }
    }

	 function editar_calendario ($id_calendario = null)
	 {
		 $calendarioModel = new CalendarioModel();
		 $data['calendario'] = $calendarioModel->where('id_calendario', $id_calendario)->first();

		 return view('EditCalendarioView', $data);
	 }
 
	 function edit_validation_calendario()
	 {
		 helper(['form', 'url']);
		 
		 $error = $this->validate([
            'fecha_inico' 	=> 'required|valid_date',
            'fecha_fin' 	=> 'required|valid_date'
        ]);
 
		 $calendarioModel = new CalendarioModel();
 
		 $id_calendario = $this->request->getVar('id_calendario');
		
		 if(!$error)
		 {
			$calendarioModel = new CalendarioModel();
            $data['calendario'] = $calendarioModel->where('id_calendario', $id_calendario)->first();

            return view('EditCalendarioView', $data);
		 } 
		 else 
		 {
			 $data = [
				'fecha_inico'   => $this->request->getVar('fecha_inico'),
                'fecha_fin'   => $this->request->getVar('fecha_fin')
			 ];
 
			 $calendarioModel->update($id_calendario, $data);
 
			 $session = \Config\Services::session();
 
			 $session->setFlashdata('success', 'Calendario actualizado');
 
			 return $this->response->redirect(site_url('/calendarios/index'));
		 }
	 }

	//  //Funcion para eliminar jugadores
	//  function eliminar_usuario ($id)
    // {
    //     $calendarioModel = new CalendarioModel();

    //     $calendarioModel->where('id_usuario', $id)->delete($id);

    //     $session = \Config\Services::session();

    //     $session->setFlashdata('success', 'Jugador eliminado');

    //     return $this->response->redirect(site_url('/usuarios/index'));
    // }
}

?>