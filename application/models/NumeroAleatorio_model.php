<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 25/06/2018
 * Time: 21:48
 */

class NumeroAleatorio_model extends CI_Model
{
    public function get_all_numeros(){

        $query = $this->db->get('numeroaleatorio');

        return $query->result();

    }

    public function ingresarNumerosAleatorios($dataingreso)
    {
        $this->db->insert('numeroaleatorio', $dataingreso);
    }

   

}