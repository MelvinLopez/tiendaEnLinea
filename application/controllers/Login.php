<?php
class login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library( 'form_validation' );
    }
    public function index(){
        $this->load->view('login/index');
    }
    public function validar()
    {
        $this->form_validation->set_rules('correo', 'Correo', 'required|regex_match[/[a-z]{5,35}/]', ['required' => 'El campo %s es requerido', 'regex_match' => 'El campo %s no cumple el formato']);
        $this->form_validation->set_rules('pass', 'Contraseña', 'required', ['required' => 'El campo %s es requerido']);

        if ($this->form_validation->run() == TRUE) 
        {
            $a = [
                $this->input->post('correo'),
                $this->input->post('pass')
            ];

            $u = $this->login_model->validar($a);

            if (!is_null($u)) 
            {
                if ($u->estado == 1) 
                {


if ($u->tipo == 'Administrador' ) {
    

            $this->session->set_userdata('user', $u);
            if (isset($_POST['recordar'])) 
            {
                setcookie('correo', $this->input->post('correo'),time() + 60 * 60);
                setcookie('pass', $this->input->post('pass'),time() + 60 * 60);
            }else 
            {
                setcookie('correo','',time() - 60);
                setcookie('pass','',time() - 60);
            }
       
       

            redirect('categoria');

        }else {
           
            $this->session->set_userdata('user', $u);
            if (isset($_POST['recordar'])) 
            {
                setcookie('correo', $this->input->post('correo'),time() + 60 * 60);
                setcookie('pass', $this->input->post('pass'),time() + 60 * 60);
            }else 
            {
                setcookie('correo','',time() - 60);
                setcookie('pass','',time() - 60);
            }
       
       

            redirect('user_controller');
        }


        }



                }
                
            }
        redirect('user_controller/login');
    }

    public function salir(){
        $this->session->unset_userdata('user');
        redirect('user_controller');
    }

}
?>