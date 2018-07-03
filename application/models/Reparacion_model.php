<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 25/06/2018
 * Time: 23:48
 */

class Reparacion_model extends CI_Model
{
    public function get_all3(){

        $query = $this->db->get('reparacion');

        return $query->result();

    }

    public function ingresarReparacion($dataingreso)
    {
        $this->db->insert('reparacion', $dataingreso);
    }

    public function actualizar_variosr($idProducto,  $data)
    {
        $this->db->where('idProducto', $idProducto);
        $this->db->update('reparacion', $data);

        return true;
    }

    public function find_itemr($id)
    {
        return $this->db->get_where('reparaciones', array('idProducto' => $id))->row();
    }
}