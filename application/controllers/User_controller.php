<?php 
class user_controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
            $this->load->model('usuario_model');
            $this->load->model('CategoriaModel'); 
            $this->load->model('ProductoModel'); 
            
        $this->load->model('Carrusel_Model');
        $this->load->model('Model_Buscador');
    }

    
    public function index(){
        
        
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
      
        ];

        #echo "<pre>"; print_r($b); die;

		$this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/index',$b);
		$this->load->view('Estandar/layout/footer');
    }
    
    public function catVista(){
      
        
        $b = [
            'productos' => $this->ProductoModel->Listar(),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell()
        
        ];


		$this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/categorias/index');
		$this->load->view('Estandar/layout/footer');
	}
    
    public function usuario_vista ($offset = 0) {
        $config = array(); #Definicion de variable de conf. 
        $a  = array(
            'productos' => $this->ProductoModel->Listar());
        
        $config['base_url']=base_url('producto/index');  #Empieza la paginación 
        $config['per_page']= 26;
        $config['total_rows']= count($a['productos']);
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
            $this->pagination->initialize($config);
            $page= $this->ProductoModel->getPaginate($config['per_page'], $offset);
    
            $this->load->view('Estandar/layout/header');
        $this->load->view('productos/index', array('productos'=>$page,true));
        $this->load->view('Estandar/layout/footer');
    }

    public function Eliminar(){

        $a = [
			$this->input->post('correo')
		];
            $id = $this->input->post('id');
            $this->usuario_model->eliminar_user($a,$id);

      redirect('login/salir');
    }
  


    public function catt($id){
     
        
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
        'productosporcat' => $this->Model_Buscador->cat_pro($id)
        ];

        #echo "<pre>"; print_r($b); die;

		$this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/categorias/index',$b);
		$this->load->view('Estandar/layout/footer');
    }

    public function productos(){

   
        
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
      
        ];

        $this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/productos/index',$b);
		$this->load->view('Estandar/layout/footer');
    }


    public function producto($id){

        
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'productos' => $this->Model_Buscador->list1($id),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
          
      
        ];

        $this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/productos/inicio',$b);
		$this->load->view('Estandar/layout/footer');
    }


    public function productos_categoria($id){

        
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'categorrias' => $this->Model_Buscador->cat($id),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
          
      
        ];

        $this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/categorias/inicio',$b);
		$this->load->view('Estandar/layout/footer');
    }

    
    public function login(){
        
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
        
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
        ];

        $this->load->view('Estandar/layout/header',$b);
		$this->load->view('login/index');
		$this->load->view('Estandar/layout/footer');
    }

    public function nuevo_usuario(){
    $this->load->library('form_validation');
      
    $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[5]',
        array('required' => 'Usted debe llenar el %s.'));
    $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email',
        array('required' => 'El campo %s es requerido', 'valid_email' => 'El campo de %s no cumple con el formato'));
    $this->form_validation->set_rules('pass', 'contraseña', 'required|min_length[5]',
        array('required' => 'Usted debe llenar  %s.'));
    $this->form_validation->set_rules('passconf', 'Confirmación', 'required|matches[pass]', 
        array('required' => 'Usted debe llenar %s.', 'matches' => 'No coinciden'));            
    $this->form_validation->set_rules('telefono', 'Telefono', 'required|min_length[5]',
        array('required' => 'Usted debe llenar el %s.'));
    $this->form_validation->set_rules('direccion', 'Direccion', 'required|min_length[5]',
        array('required' => 'Usted debe llenar el %s.'));
    if ($this->form_validation->run() == TRUE) {

        $a = [
            $this->input->post('nombre'),
            $this->input->post('correo'),
            hash('sha1',$this->input->post('pass')),
            $this->input->post('telefono'),
            $this->input->post('direccion')
            
        ];
        $this->usuario_model->ingresar($a);
        redirect('user_controller/login');
    } else {
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
        
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
          
      
        ];

        $this->load->view('Estandar/layout/header',$b);
        $this->load->view('Estandar/login/index');
        $this->load->view('Estandar/layout/footer');
            }
    
    }

    public function editinfouser(){
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
        ];

        $this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/usuario/editar_info');
		$this->load->view('Estandar/layout/footer');
    }

    public function editar_usuario(){

        $a = [
            $this->input->post('nombre'),
            $this->input->post('correo'),
            hash('sha1',$this->input->post('pass')),
            $this->input->post('telefono'),
            $this->input->post('direccion')
            
        ];

                $a[] = $this->input->post('id');
                $this->usuario_model->editar($a);
                redirect('user_controller/index');
            
        }

    public function carrito_vew(){
        $b = [
            'productoss' => $this->ProductoModel->Listar(),
            'categorias' => $this->CategoriaModel->listar(),
            'sub_productos' => $this->ProductoModel->list_new(),
            'carrusel' => $this->Carrusel_Model->carrusell(),
        ];

        $this->load->view('Estandar/layout/header',$b);
		$this->load->view('Estandar/carrito_user/index');
		$this->load->view('Estandar/layout/footer');
    }
  
       

    

}
?>