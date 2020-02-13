<?php
    class ProductoModel extends CI_Model
    {
        public function Listar()
        {

            return $this->db->query('SELECT * FROM productos WHERE estado = 1')->result(); 
        }

        public function estado($id)
        {
            $b = "UPDATE detalle_categoria SET estado = 0 WHERE id_productos = $id";
            $this->db->query($b);

            $s = "UPDATE productos SET estado = 0 WHERE id = $id";
            $this->db->query($s);
        }

        public function ingresar($a)
        {
            $s= "INSERT INTO productos (id,nombre, descripcion, cantidad, f_llegada, f_expiracion, precio, img) VALUES (?,?,?,?,?,?,?,?)";
            $this->db->query($s, $a);
        }

        public function Obtenerid($id)
        {
            return $this->db->query("SELECT * FROM productos WHERE id = $id")->row();
        }

        public function editar($a,$id)
        {

            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $cantidad = $_REQUEST['cantidad'];
            $f_llegada = $_REQUEST['f_llegada'];
            $f_expiracion = $_REQUEST['f_expiracion'];
            $precio = $_REQUEST['precio'];

            $tipo = $_FILES['foto']['type'];
        $foto=$_REQUEST["txtnombre"].'.'.explode('/', $tipo)[1];
        $ruta=$_FILES["foto"]["tmp_name"];
        $destino="assets/img/".$foto;
            copy($ruta,$destino);
            

// echo $destino." - ".$ruta = $_POST['foto']["tmp_name"]." - ".$foto = $_REQUEST['txtnombre']."------";
// echo $nombre = $_REQUEST["nombre"]."-".$descripcion = $_REQUEST["descripcion"]."-".$cantidad = $_REQUEST["cantidad"]."-".$f_llegada = $_REQUEST["f_llegada"]."-".$f_expiracion = $_REQUEST["f_expiracion"]."-".$precio = $_REQUEST["precio"]; die();


           
            if ( $ruta == '') {
                $s = "UPDATE productos SET nombre = ?, descripcion=?, cantidad = ?, f_llegada = ?, f_expiracion = ?, precio = ?, img =? WHERE id = $id";
            
              
               
            }else{
                
                $destino="assets/img/".$foto;
                copy($ruta,$destino);

                $s = "UPDATE productos SET nombre ='$nombre', descripcion='$descripcion', cantidad ='$cantidad', f_llegada ='$f_llegada', f_expiracion ='$f_expiracion', precio ='$precio', img ='$destino' WHERE id = $id";
            
               
            }





            
            $this->db->query($s,$a);
        }

        public function productosID($id)
        {
          

            return $this->db->query( "SELECT pro.id, pro.nombre, pro.descripcion, pro.cantidad, pro.f_llegada,  pro.f_expiracion, 
                            pro.precio, pro.img, dc.id_categoria, pro.estado
            FROM detalle_categoria dc
            INNER JOIN productos pro ON dc.id_productos = pro.id
            INNER JOIN categoria cat ON dc.id_categoria = cat.id WHERE id_categoria = $id  AND pro.estado = 1")->result();

            
        }

        public function getPaginate($limit, $offset){
            $s= $this->db->get('productos',$limit,$offset);
            return $s->result();
        }

        public function obtener($id_categoria, $limite, $inicio)
	{
		$s = "SELECT * FROM productos P INNER JOIN detalle_categoria CP ON P.Id = CP.id_productos ";
		
		$s .= $id_categoria != 0 ? "WHERE CP.id_categoria = $id_categoria " : '';

		$s .= "LIMIT $inicio, $limite";

		return $this->db->query($s)->result();
	}

	public function obtenerTotal($id_categoria)
	{
		$s = "SELECT count(*) total FROM productos P INNER JOIN detalle_categoria CP ON P.Id = CP.id_productos ";

		$s .= $id_categoria != 0 ? "WHERE CP.id_categoria = $id_categoria " : '';

		return $this->db->query($s)->row()->total;
    }
    
    public function list_new(){
            return $this->db->query('SELECT * FROM detalle_categoria WHERE estado = 1')->result(); 
        }

}
?>