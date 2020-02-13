<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library(['pagination']);
		$this->load->model(['ProductoModel', 'CategoriaModel']);
	}
	public function index()
	{

		
		$this->load->model('Carrusel_Model');
		$this->load->view('layout/menu');
		$this->load->view('categoria/index', ['categorias' => $this->CategoriaModel->listar(), 'carrusel' => $this->Carrusel_Model->carrusell()]);
		$this->load->view('layout/footer');
	}
	public function vista($id, $id_categoria = 0, $pagina = 0)
	{
		$config['base_url'] = base_url('categoria/vista/' . $id_categoria);
		$config['uri_segment'] = 4;
		$config['total_rows'] = $this->ProductoModel->obtenerTotal($id_categoria);
		$config['per_page'] = 14;
		/*-------------Estilo de la paginación-----------------------*/ 
		$config['full_tag_open']= '<div class="pagging text-center"> <nav><ul class="pagination">'; 
		$config['full_tag_close']= '</ul></nav></div>';
		$config['num_tag_open']= '<li class="page-item"><span class="page-link"> '; 
		$config['num_tag_close']= '</span></li>';
		$config['cur_tag_open']= '<li class="page-item active"><span class="page-link">'; 
		$config['cur_tag_close']= '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']= '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']= '</span></li>';
		$config['first_tag_open']= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']= '</span></li>';
		$config['last_tag_open']= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']= '</span></li>';
		/*------------------------------------------------------------------ */
		$datos = ['productos' => $this->ProductoModel->obtener($id_categoria, $config["per_page"], $pagina)];
		$datos['categorias'] = $this->CategoriaModel->obtener();

		$this->pagination->initialize($config);
		$this->load->model('ProductoModel');
		$this->load->view('layout/menu');
		$this->load->view('categoria/vista',['productos' => $this->ProductoModel->productosID($id)]);
		$this->load->view('layout/footer');
	}
	public function ingresar()
	{	
		$this->load->library('form_validation');
		$this->load->model('CategoriaModel');
	
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[5]', ['required' => 'El campo %s es requerido']);

		if ($this->form_validation->run() == TRUE) 
		{
			$archivo = $_FILES['archivo']['tmp_name'];
			$tipo = $_FILES['archivo']['type'];
			$nombre = $_POST['img']. '.' .explode('/',$tipo)[1];
			
			$tamaño = $_FILES['archivo']['size'];
	  
			$destino = "assets/img/".$nombre;
	  
			$subido = move_uploaded_file($archivo,$destino);


		$a = [
			$this->input->post('nombre'),
			$destino
		];

	
			$this->CategoriaModel->ingresar($a);
		
	
	}else {
		$this->load->view('layout/menu');
		$this->load->view('categoria/ingresar');
		$this->load->view('layout/footer');
		}	

		redirect('categoria');
	}
		


	public function agregar($id = 0){

        if ($id == 0){

			$this->load->view('layout/menu');
			$this->load->view('categoria/ingresar');
			$this->load->view('layout/footer');
		}else {
            $u = $this->CategoriaModel->obtenerPorId($id);
			$a['categoria'] = $u;
			
			$this->load->view('layout/menu');
			$this->load->view('categoria/editar', $a);
			$this->load->view('layout/footer');
			
        }
    }

	public function eliminar($id){
		$this->CategoriaModel->estado($id);
		redirect('categoria');
	}
	



	###############################################################################################
	public function Editar()
	{	
		$this->load->library('form_validation');
		$this->load->model('CategoriaModel');
	
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[5]', ['required' => 'El campo %s es requerido']);

		if ($this->form_validation->run() == TRUE) 
		{
		

		$a = [
			$this->input->post('nombre'),
			$this->input->post('txturl')
		];

	
			
			$id = $this->input->post('id');
			$this->CategoriaModel->editar($a, $id);
		


	}else {
		$this->load->view('layout/menu');
		$this->load->view('categoria/editar');
		$this->load->view('layout/footer');
		}	

		redirect('categoria');

	}

}
