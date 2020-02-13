<?php
class FacturasModel extends CI_Model
{
	public function datos()
	{
		return $this->db->query( "SELECT f.id, f.f_creacion, f.total,u.nombre, u.correo FROM factura f 
		INNER JOIN usuarios u ON f.id_usuario = u.id ORDER BY f_creacion DESC")->result();
	}
	
	public function generarFactura ($id) {
		
		$id_user= $this->session->user->id;
		
		$s = "INSERT INTO factura (id,id_usuario) VALUES ($id,$id_user)";

		$this->db->query($s);
	}

	public function agregarDetallesFactura ($id, $productos) {

		$s = "INSERT INTO registro (id_factura, id_producto, cantidad, precioUnitario, subtotal) VALUES ";

		$total = 0;
		foreach ($productos as $producto) {
			$s .= "($id, $producto->id, $producto->fcantidad, $producto->precio, $producto->subtotal),";
			$total += $producto->subtotal;
		}

		$s = substr($s, 0, strlen($s) - 1);
		$this->db->query($s);
		return $total;
	}

	public function actualizarTotalFactura ($id, $total)
	{

		$s = "UPDATE factura SET Total = $total WHERE id = $id";

		$this->db->query($s);
	}

	public function actualizarStocksFactura ($producto)
	{
		$nuevaCantidad = $producto->cantidad - $producto->fcantidad;
		$s = "UPDATE productos SET cantidad = $nuevaCantidad WHERE id = $producto->id";
		$this->db->query($s);
	}
}