 <?php
    class Producto extends CI_Controller{

        public function __construct(){
            parent::__construct();
            
            $this->load->library( 'form_validation' );
          $this->load->model('usuario_model');
          $this->load->model('CategoriaModel');
          
           
        }
        public function index ($offset = 0) {
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
        
                $this->load->view('layout/menu');
            $this->load->view('productos/index', array('productos'=>$page,true));
            $this->load->view('layout/footer');
        }
        
        public function usuario_vista ($offset = 0) {
            $config = array(); #Definicion de variable de conf. 
            $a  = array(
                'productos' => $this->ProductoModel->Listar());
            
            $config['base_url']=base_url('producto/usuario_vista');  #Empieza la paginación 
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
        
                $this->load->view('layout/menu');
            $this->load->view('usuario/index', array('productos'=>$page,true));
            $this->load->view('layout/footer');
        }


        public function eliminar($id)
        {
            $this->ProductoModel->estado($id);
            redirect('producto');
        }

        public function agregar($id = 0)
        {
           
            if ($id == 0) {
               
                $this->load->view('layout/menu');
                $this->load->view('productos/agregar', ['categoria' => $this->CategoriaModel->listar()]);
                $this->load->view('layout/footer');

            }else {
                $u = [
                    'producto' => $this->ProductoModel->Obtenerid($id),
                    'categoria' => $this->CategoriaModel->listar()
                ];
                

                $this->load->view('layout/menu');
                $this->load->view('productos/editar',$u);
                $this->load->view('layout/footer');
            }
        }

        public function ingresar()
        {
           

            $this->form_validation->set_rules('nombre', 'Nombre','required',
            array('required' => 'Usted debe llenar el %s.'));

            $this->form_validation->set_rules('descripcion', 'Descripción','required',
            array('required' => 'Usted debe llenar el %s.'));

            $this->form_validation->set_rules('cantidad', 'Cantidad','required',
            array('required' => 'Usted debe llenar  %s.'));

            $this->form_validation->set_rules('f_llegada', 'Fecha de llegada', 'required',
            array('required' => 'Usted debe llenar el %s.'));

            $this->form_validation->set_rules('f_expiracion', 'Fecha de expiracion', 'required',
            array('required' => 'Usted debe llenar el %s.'));

            $this->form_validation->set_rules('precio', 'precio', 'required',
            array('required' => 'Usted debe llenar el %s.'));
            
            $this->form_validation->set_rules('img', 'imagen', 'required',
            array('required' => 'Usted debe llenar el campo %s.'));

            $this->form_validation->set_rules('categoria[]', 'Categoria', 'required',
            array('required' => 'Usted debe llenar el campo %s.'));


            if ($this->form_validation->run() == TRUE) {
		


            $archivo = $_FILES['archivo']['tmp_name'];
            $tipo = $_FILES['archivo']['type'];
            $nombre = $_POST['img']. '.' .explode('/',$tipo)[1];
            
            $tamaño = $_FILES['archivo']['size'];
      
            $destino = "assets/img/".$nombre;
      
            $subido = move_uploaded_file($archivo,$destino);

            $id = rand(1, 999999999);
            

                $a=
                [
                    $id,
                    $this->input->POST('nombre'),
                    $this->input->POST('descripcion'),
                    $this->input->POST('cantidad'),
                    $this->input->POST('f_llegada'),
                    $this->input->POST('f_expiracion'),
                    $this->input->POST('precio'),
                    $destino
                ];

                $this->ProductoModel->ingresar($a);

                $j = count($this->input->POST('categoria'));
                //  echo $this->input->POST('categoria')[1]; die();
                for ($i=0; $i < $j ; $i++) { 
                   
            
               
                    $b = [
                        $this->input->POST('categoria')[$i],
                        $id
                    ];
                    
                    $this->CategoriaModel->ProCat($b);
                }
               
                redirect('Producto');
        }else {

          
            $this->load->view('layout/menu');
            $this->load->view('productos/agregar', ['categoria' => $this->CategoriaModel->listar()]);
            $this->load->view('layout/footer');
            }	

           
        }

        #######################################################################################################################

        public function Actualizar()
        {
            $this->load->library('form_validation');
            $this->load->model('usuario_model');
            $this->load->model('CategoriaModel');

           

                $a=
                [
                    $this->input->post('nombre'),
                    $this->input->post('descripcion'),
                    $this->input->post('cantidad'),
                    $this->input->post('f_llegada'),
                    $this->input->post('f_expiracion'),
                    $this->input->post('precio'),
                    $this->input->post('txturl')
                ];

                $id = $this->input->post('id');
                
                $this->ProductoModel->editar($a, $id);
           
                redirect('Producto');

         
       
        }

        #######################################################################
 




        public function new_user(){
            $this->load->view('nuevo/user');

        }

        public function user(){
            $this->load->model('usuario_model');

            $this->load->view('layout/menu');
            $this->load->view('usuario/usuarios', ['info' => $this->usuario_model->datos()]);
            $this->load->view('layout/footer');
        }
        
      
      
        public function ingresarActualizar(){
            $this->load->library('form_validation');
      
          $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[5]',
                  array('required' => 'Usted debe llenar el %s.'));
          
          $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email',array('required' => 'El campo %s es requerido', 'valid_email' => 'El campo de %s no cumple con el formato'));

          
      
          $this->form_validation->set_rules('pass', 'contraseña', 'required|min_length[5]',
                  array('required' => 'Usted debe llenar  %s.'));
          
          $this->form_validation->set_rules('passconf', 'Confirmación', 'required|matches[pass]', array('required' => 'Usted debe llenar %s.', 'matches' => 'No coinciden'));            

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
      
                  if ($this->input->post('id') != '') {
                      $a[] = $this->input->post('id');
                      $this->usuario_model->editar($a);
                      redirect('producto/user');
                  }else {
                      $this->usuario_model->ingresar($a);
                      redirect('login/index');
                  }
              
          } else {
            $this->load->view('nuevo/user');
          }
        }

        public function estado($id){
            $this->load->model('usuario_model');
          $this->usuario_model->actualizarEstado($id);
          redirect('producto/user');
        }
      
        public function editar($id = 0){
          if ($id == 0) {
            $this->load->model('usuario_model');
            
            $this->load->view('layout/menu');
              $this->load->view('nuevo/user');
              $this->load->view('layout/footer');
          }else {
            $this->load->model('usuario_model');
              $u = $this->usuario_model->userID($id);
      
              $this->load->view('layout/menu');
              $this->load->view('nuevo/user', ['datos' => $u]);
              $this->load->view('layout/footer');
          }
        }

        


    }

?>