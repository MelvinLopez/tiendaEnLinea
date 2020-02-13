<?php
class usuario_model extends CI_Model{

    public function datos(){
        return $this->db->get('usuarios')->result(); 
   
    }
    public function ingresar($a){
        $s = "INSERT INTO usuarios (nombre, correo, pass, telefono, direccion) VALUES (?, ?, ?, ?, ?) ";

        $this->db->query($s, $a);
    }

    public function editar($a){
        $s = "UPDATE usuarios SET nombre = ?, correo = ?, pass = ?, telefono = ?, direccion = ? WHERE id = ?";
        $this->db->query($s, $a);
    }

    public function editar2($a,$id){
        $s = "UPDATE usuarios SET nombre = ?, correo = ?, pass = ?, telefono = ?, direccion = ? WHERE id = $id";
        $this->db->query($s, $a);
    }
    public function userID($id){
        return $this->db->query("SELECT * FROM usuarios WHERE id = $id")->row(); 
    }
    public function actualizarEstado($id){
        $this->db->query("UPDATE usuarios SET estado = 0 WHERE id = $id");
    }

    public function eliminar_user($a,$id){

        $correo = $_REQUEST['correo'];


        $email = $correo.'/Eliminado'.'/'.rand(1, 99999999);
        $s = "UPDATE usuarios SET correo = '$email', estado = 0 WHERE id = $id";
        $this->db->query($s);
    }



}

