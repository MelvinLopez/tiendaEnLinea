<?php 

class Carrusel_Controller extends CI_Controller{

    public function __construct(){
		parent::__construct();
		
		/*if(!$this->session->user){
            redirect('login');
        }*/
        $this->load->model('Carrusel_Model');
	}
	
    public function Index(){

       
        $this->load->view('layout/menu');
        $this->load->view('carrusel/index',['carrusel' => $this->Carrusel_Model->carrusell()]);
        $this->load->view('layout/footer');
    }

    public function Eliminar($id){
     
        $this->Carrusel_Model->Eliminar($id);
        redirect('Carrusel_Controller');
    }

    public function accion($id = 0){

        if ($id == 0){

			$this->load->view('layout/menu');
            $this->load->view('carrusel/Agregar');
			$this->load->view('layout/footer');
		}else {
           
			$this->load->view('layout/menu');
            $this->load->view('carrusel/Editar', ['Carrusel' => $this->Carrusel_Model->obtenerPorId($id)]);
			$this->load->view('layout/footer');
			
        }
    }



    public function ingresar(){

      
	
	
		$this->form_validation->set_rules('descripcion', 'descripcion', 'required|min_length[5]',
                  array('required' => 'Usted debe llenar el Campo %s.')); 
        $this->form_validation->set_rules('img', 'Nombre de la imagen', 'required|min_length[5]', array('required' => 'Usted debe llenar el Campo %s.'));

		if ($this->form_validation->run() == TRUE) 
		{
			$archivo = $_FILES['archivo']['tmp_name'];
			$tipo = $_FILES['archivo']['type'];
			$nombre = $_POST['img']. '.' .explode('/',$tipo)[1];
			
			$tamaño = $_FILES['archivo']['size'];
	  
			$destino = "assets/img/".$nombre;
	  
			$subido = move_uploaded_file($archivo,$destino);


        $a = [
			$this->input->post('descripcion'),
			$destino
		];

	
			
		
            $this->Carrusel_Model->ingresar($a);
            redirect('carrusel_Controller');
        }else {
            $this->load->view('layout/menu');
            $this->load->view('carrusel/Agregar');
            $this->load->view('layout/footer');
            }	
    
          
    }

    public function Editar(){
     
        $this->load->library('form_validation');
		$this->load->model('CategoriaModel');
	
		$this->form_validation->set_rules('descripcion', 'Descripción', 'required|min_length[5]', ['required' => 'El campo %s es requerido']);
        $this->form_validation->set_rules('txtnombre', 'Nombre de la imagen', 'required|min_length[5]', ['required' => 'El campo %s es requerido']);

		if ($this->form_validation->run() == TRUE) 
		{
		

        $a = [
			$this->input->post('descripcion'),
			$this->input->post('txturl')
		];

	
			
			$id = $this->input->post('id');
            $this->Carrusel_Model->editar($a, $id);

            redirect('carrusel_Controller');
        }else {
            $this->load->view('layout/menu');
            $this->load->view('carrusel/Editar');
            $this->load->view('layout/footer');
            }	
    
            
    }


}


?>