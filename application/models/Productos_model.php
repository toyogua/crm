<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 19/06/2018
 * Time: 1:18
 */

class Productos_model extends CI_Model
{
    //leer toda la tabla productos
    public function get_all(){

        $query = $this->db->get('producto');


        return $query->result();

    }

    //insertar productos
    public function insertar_producto($dataingreso){

        $this->db->insert('producto', $dataingreso);
        return $this->db->insert_id();

        redirect('productos/ingresar_producto');
    }

    //me trae los campos select con inner join
    public function listar_productos()
    {

        $this->db->select('p.idProducto, p.nombreProducto, p.descripcionProducto, p.fechaCreacion, r.descripcionReparacion, r.estado, n.numeroGenerado');
        $this->db->from('producto p');
        $this->db->join('numeroaleatorio n', ' n.idProducto = p.idProducto', 'inner');
        $this->db->join('reparacion r', 'r.idProducto = p.idProducto', 'inner');
        $data = $this->db->get();
        return $data->result();

    }

    //me busca un producto por el numero aleatorio o token y me muestra todos sus datos 
    public function buscarProducto($numero)
    {
        $this->db->select('p.nombreProducto, p.descripcionProducto, p.fechaCreacion, r.descripcionReparacion, r.estado');
        $this->db->from('producto p');
        $this->db->join('numeroaleatorio n', ' n.idProducto = p.idProducto', 'inner');
        $this->db->join('reparacion r', 'r.idProducto = p.idProducto', 'inner');
       // $this->db->where('n.numeroGenerado');
        $this->db->like('n.numeroGenerado',$numero);
        $data = $this->db->get();
        return $data->result();
    }

    //me busca un producto mediante su id almacenando los datos de las demas tablas con inner join
    //almacenado y retornando los campos con row(); en la variable $data
    public function buscarProductoId($idProducto)
    {
        $this->db->select('p.idProducto, p.nombreProducto, p.descripcionProducto, r.descripcionReparacion, r.estado');
        $this->db->from('producto p');
        $this->db->join('reparacion r', 'r.idProducto = p.idProducto', 'inner');
       // $this->db->where('n.numeroGenerado');
        $this->db->like('p.idProducto',$idProducto);
        $data = $this->db->get();
        return $data->row();
    }

    //eliminar un producto
    public function eliminar($idProducto){

        $this->db->where('idProducto', $idProducto);
        $this->db->delete('producto');

    }

    
    //Me actualiza los campos de la tabla producto  
    public function actualizar_varios($idProducto,  $data)
    {
        $this->db->where('idProducto', $idProducto);
        $this->db->update('producto', $data);

        return true;
    }
}
?>