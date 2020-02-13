<?php

class Buscador extends CI_Controller{
	public function __construct(){
        parent::__construct();
            $this->load->model('usuario_model');
            $this->load->model('CategoriaModel'); 
            $this->load->model('ProductoModel'); 
    }

	public function vistaBuscar()
	{
		$this->load->model('Model_Buscador');

			if ($_POST) {
				$buscar = $this->input->post('busqueda');
				$data['productos'] = $this->Model_Buscador->buscar($buscar);
			}else {
                $buscar = '';
                $data['productos'] = $this->Model_Buscador->buscar($buscar);
			}

		$this->load->view('layout/menu');
		$this->load->view('buscador/vistaBuscar', $data);
		$this->load->view('layout/footer');
	}

	public function estandarshare(){



		$this->load->model('Carrusel_Model');
        $this->load->model('Model_Buscador');
   
			if ($_POST) {
				$buscar = $this->input->post('busqueda');
				$data['productos'] = $this->Model_Buscador->buscar($buscar);
			}else {
                $buscar = '';
                $data['productos'] = $this->Model_Buscador->buscar($buscar);
			}

  $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell()
			
        ];
		$this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/buscador/index',$data);
		$this->load->view('Estandar/layout/footer');
	}


}


?>