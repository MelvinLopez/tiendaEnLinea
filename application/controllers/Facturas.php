<?php

class facturas extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        
        $this->load->model(['productoModel','facturasModel','login_Model']);
    }

    public function ver(){
        $this->load->model('facturasModel');
             $this->load->view('layout/menu');
            $this->load->view('facturas/ver', ['info' => $this->facturasModel->datos()]);
            $this->load->view('layout/footer');
    }
}

?>