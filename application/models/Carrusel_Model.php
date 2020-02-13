<?php

class Carrusel_Model extends CI_Model{

    public function carrusell(){
        return  $this->db->get('carrusel')->result(); 
    }

    public function obtenerPorId($id){
        return $this->db->query("SELECT * FROM carrusel WHERE id = $id")->row();
    }

    public function Eliminar($id){
        $sql = "DELETE FROM carrusel WHERE id = $id";
        $this->db->query($sql);
    }


    public function editar($a,$id){

        $descripcion = $_REQUEST['descripcion'];

        $tipo = $_FILES['foto']['type'];
        $foto=$_REQUEST["txtnombre"].'.'.explode('/', $tipo)[1];
        $ruta=$_FILES["foto"]["tmp_name"];
        $destino="assets/img/".$foto;
        copy($ruta,$destino);

        if ( $ruta == '') {
          
        $s = "UPDATE carrusel SET descripcion = ?, img = ? WHERE id = $id";
           
        }else{
            
            $destino="assets/img/".$foto;
            copy($ruta,$destino);

            $s = "UPDATE carrusel SET descripcion ='$descripcion', img ='$destino' WHERE id = $id";
           
        }

        $this->db->query($s, $a);

    }

    public function ingresar($a){
      
        $s = "INSERT INTO carrusel (descripcion, img) VALUES (?,?)";

       
        $this->db->query($s,$a);
    }
 
}