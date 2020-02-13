<?php

class Model_buscador extends CI_Model{

    public function buscar($buscar){


        $sql = "SELECT pro.id, pro.nombre, pro.descripcion, pro.cantidad, pro.f_llegada,  pro.f_expiracion, 
        pro.precio, pro.img,  dc.estado ,  pro.estado
        FROM detalle_categoria dc
        INNER JOIN productos pro ON dc.id_productos = pro.id WHERE (pro.nombre LIKE '%$buscar%' OR pro.precio LIKE '%$buscar%') GROUP BY  pro.nombre, pro.precio";

        // $sql = "  SELECT detalle_categoria , id_producto ,  id_categoria , count(*) as estado
        // from detalle_categoria
        // where estado = 1
        // group by UBICACION , ESPECIE , SEXO";

        return $this->db->query($sql)->result();


        //$sql = "SELECT * FROM productos WHERE estado = 1 AND (nombre LIKE '%$buscar%' OR precio LIKE '%$buscar%')";
    //     $this->db->like('nombre', $buscar);
    //     $this->db->or_like('precio', $buscar);
    //    return $this->db->get('productos')->result();

    }


    public function getnew(){

        $sql ="SELECT pro.id, pro.nombre, pro.descripcion, pro.cantidad, pro.f_llegada,  pro.f_expiracion, 
        pro.precio, pro.img,  dc.estado ,  pro.estado, dc.id_categoria, dc.id_productos
        FROM detalle_categoria dc
        INNER JOIN categoria cat ON dc.id_categoria = cat.id 
        INNER JOIN productos pro ON dc.id_productos = pro.id WHERE dc.estado = 1 AND dc.id_categoria = cat.id AND pro.estado = 1";


        return $this->db->query($sql)->result();
    }

    public function cat_pro($id){
        

        $sql ="SELECT pro.id, pro.nombre, pro.descripcion, pro.cantidad, pro.f_llegada,  pro.f_expiracion, 
        pro.precio, pro.img,  dc.estado ,  pro.estado, dc.id_categoria, dc.id_productos
        FROM detalle_categoria dc
        INNER JOIN categoria cat ON dc.id_categoria = cat.id 
        INNER JOIN productos pro ON dc.id_productos = pro.id WHERE cat.id = $id AND dc.id_categoria = $id AND pro.estado = 1";

      

        return $this->db->query($sql)->result();

    }



    public function list1($id){
        $sql ="SELECT * FROM productos WHERE id = $id";
        return $this->db->query($sql)->result();
    }

    public function cat($id){
        return $this->db->query( "SELECT pro.id, pro.nombre, pro.descripcion, pro.cantidad, pro.f_llegada,  pro.f_expiracion, 
            pro.precio, pro.img, dc.id_categoria, pro.estado
            FROM detalle_categoria dc
            INNER JOIN productos pro ON dc.id_productos = pro.id
            INNER JOIN categoria cat ON dc.id_categoria = cat.id WHERE id_categoria = $id  AND pro.estado = 1")->result();
    }




}


?>