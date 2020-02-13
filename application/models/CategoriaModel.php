<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaModel extends CI_Model {
public function __construct(){
    parent::__construct();
}

	public function listar()
	{
		return $this->db->query("SELECT * FROM categoria WHERE estado = 1")->result();
	}

    public function ingresar($a){
        $s = "INSERT INTO categoria(nombre, img)VALUES (?,?)";
        $this->db->query($s, $a);
    }

    public function estado($id){

        $b = "UPDATE detalle_categoria SET estado = 0 WHERE id_categoria = $id";
        $this->db->query($b);
        $s = "UPDATE categoria SET estado = 0 WHERE id = $id";
        $this->db->query($s);
    }

    public function obtenerPorId($id){
        return $this->db->query("SELECT * FROM categoria WHERE id = $id")->row();
    }

  
    public function getPaginate($limit, $offset){
        $s = $this->db->get('categoria',$limit,$offset);
        return $s->result();
    }

    public function ProCat($b){
        $s = "INSERT INTO detalle_categoria (id_categoria, id_productos) VALUES (?,?)";
        $this->db->query($s, $b);
    }


    public function editar($a,$id){



   

        $nombre = $_REQUEST['nombre'];

        $tipo = $_FILES['foto']['type'];
    $foto=$_REQUEST["txtnombre"].'.'.explode('/', $tipo)[1];
    $ruta=$_FILES["foto"]["tmp_name"];
    $destino="assets/img/".$foto;
        copy($ruta,$destino);
        

// echo $destino." - ".$ruta = $_POST['foto']["tmp_name"]." - ".$foto = $_REQUEST['txtnombre']."------";
// echo $nombre = $_REQUEST["nombre"]."-".$descripcion = $_REQUEST["descripcion"]."-".$cantidad = $_REQUEST["cantidad"]."-".$f_llegada = $_REQUEST["f_llegada"]."-".$f_expiracion = $_REQUEST["f_expiracion"]."-".$precio = $_REQUEST["precio"]; die();


       
        if ( $ruta == '') {
          
            $s = "UPDATE categoria SET nombre =?, img =? WHERE id = $id";
           
        }else{
            
            $destino="assets/img/".$foto;
            copy($ruta,$destino);

            $s = "UPDATE categoria SET nombre ='$nombre', img ='$destino' WHERE id = $id";
           
        }





        $this->db->query($s, $a);
    }

    public function obtener ()
	{
		return $this->db->get('categoria')->result();
	}


}