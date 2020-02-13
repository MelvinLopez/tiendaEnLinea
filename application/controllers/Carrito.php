<?php
class Carrito extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model(['productoModel','facturasModel','login_Model']);
        $this->load->library('email');
    }

    public function agregar()
    {
        
        $productos = [];
        $id = $this->$_POST['id'];
        $obj = $this->productoModel->Obtenerid($this->input->post('id'));

        $obj->fcantidad = $this->input->post('cantidad');
        $obj->subtotal = $obj->fcantidad * $obj->precio;

        $productos[] = $obj;
        if ($this->session->carrito) 
        {
            $productos = $this->session->carrito;
            $existe=false;

            foreach ($this->session->carrito as $produc) 
            {
                if ($obj->id == $produc->id) 
                {
                  $produc->fcantidad += $obj->fcantidad;
                  $produc->subtotal = $produc->fcantidad * $produc->precio;
                  $existe=true;
                }
            }

            if (!$existe) 
            {
                $productos[]=$obj;
                $this->session->set_userdata('carrito', $productos);
            }
        }else {
            $produc[]=$obj;
            $this->session->set_userdata('carrito', $productos);
        
        }
        redirect('user_controller/productos');
    }

    public function ver()
    {
        $this->load->view('layout/menu');
        $this->load->view('carrito/ver');
        $this->load->view('layout/footer');
    }

    public function factura()
    {
        $this->facturasModel->datos();
        $this->load->view('carrito/factura');
        
    }

    public function  paypal()
    {
        $totalpaypal = 0;
        foreach($this->session->carrito as $pay){
          $totalpaypal += $pay->subtotal;
        }

        $v = ['total' => $totalpaypal];
        $this->load->view('layout/menu');
        $this->load->view('carrito/pagar',$v);
        $this->load->view('layout/footer');
    }

    public function pagar(){
       if ($this->session->user) {

        $id = rand(1, 99999999); # Generar id factura
		# Inicializando la factura
		$this->facturasModel->generarFactura($id);

		# Agregando detalles a factura
		$total = $this->facturasModel->agregarDetallesFactura ($id, $this->session->carrito);

		# Actualizando el total
		$this->facturasModel->actualizarTotalFactura ($id, $total);
        
		foreach($this->session->carrito as $producto) {
			$this->facturasModel->actualizarStocksFactura($producto);
        }
        
        $config =[
            'mailtype' => 'html',
            'protocol' => 'smtp', //smtp es plenamente para el envio en correo electronico esxiten diferentes protocolos (pop3  IMAP)
            'smtp_host'=> 'smtp.gmail.com',// es el servidor de gmail 
            'smtp_user' => 'infocdsfgkss@gmail.com', // como ingreso a la cuenta
            'smtp_pass' => 'Abcd.123',
            'smtp_crypto' =>'ssl',//ssl son los que se utilizan para utiliza rllaves publicas y privadas para desencripatar el mensaje 
            'smtp_port' => 465, //25 por defecto el puerto de smtp existen puertos conocidos, pococ conocidos, dinamicos 3306 puerto para base de datos,
            'smtp_timeout' => 60,//segundos que se van  espera antes finalizar la conexion 
            'crlf'=> '\r\n'
        ];
    
            #INicializamos la configuracion que realizamos al primcipio para formato y credenciales 
    
            $this->email->initialize($config);
    
            #Configuramos la informacion del emisor qeu aparecera en el correo.
    
            $this->email->from('infocdsfgkss@gmail.com','Info');
    
            #La cabecera del mensaje.
            $this->email->subject('!False Shop');
    
            #Salto de linea
            $this->email->set_newline("\r\n");
    
            #Todos los vaores son tomados como texto e introducidos en el campo de destino(solo es necesario uno dependiendo de la necesida).
            $this->email->to($this->session->user->correo);
            #$this->email->bcc('');
            date_default_timezone_set('America/El_Salvador'); $hoy= date('dmyhis') ;
            // $cid = $this->email->attachmet_cid($filename);
            #Se asigna el mensaje cmo cuerpo del correo.

          
            $this->email->message($this->load->view('pdf/factura'));
             // $filename = base_url('assets/img/logo.jpeg');
            $this->email->attach(base_url('assets/files/false'.$hoy.'.pdf'));
            #Se envia el correo a el o los destinatarios.
            if($this->email->send())
            {
                echo "Se envio correctamente";
            }else{
                echo $this->email->print_debugger().'error';
            }

           
        unset($_SESSION['carrito']);

        redirect('user_controller/index');
        
       }else{
        redirect('user_controller/login');
       }
          

    }

    public function eliminar($c)
    {
        unset($_SESSION['carrito'][$c]);
        redirect('user_controller/carrito_vew');
    }

    public function pdf(){
        $this->load->view('pdf/factura');
    }
    

}
    





















