<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 14:11
 */

class Login_model extends CI_Model
{


    public function get_all(){

        $query = $this->db->get('persona');


        return $query->result();

    }

    public function get_allp(){

        $query = $this->db->get('login');

        return $query->result();

    }

    public function ingresarPersona($dataingreso)
    {
        $this->db->insert('persona', $dataingreso);

        return $this->db->insert_id();
    }

    public function ingresarUsuario($dataingreso)
    {
        $this->db->insert('login', $dataingreso);

        //redirect('login');
    }

    public function login($user, $pass)
    {
        $this->db->select('p.idPersona, l.idLogin, p.nombre, p.apellido');
        $this->db->from('login l');
        $this->db->join('persona p', 'l.idPersona = p.idPersona' ,'inner');
        $this->db->where('l.usuario', $user);
        $this->db->where('l.password', $pass);

        $resultado = $this->db->get();

        if($resultado->num_rows() == 1)
        {
            $r = $resultado->rows();

            $s_usuario = array(
                's_idPersona' => $r->idPersona,
                's_idLogin' => $r->idLogin,
                's_usuario' => $r->nombre. ",".$r->apellido
            );

            $this->session->set_userdata($s_usuario);

            return 1;
        }

        else
        {
            return 0;
        }

        return $resultado->result();
    }
    public function login_user($username, $password){
        $this->db->where('usuario', $username);
        $result = $this->db->get('login');

        $db_password = $result->row(2)->password;

        if(password_verify($password, $db_password)){
            return $result->row(0)->id;
        }
        else{
            return FALSE;
        }
    }

    public function registro($usuario, $password)
    {
        $query = $this->db->get_where('login', array('usuario' => $usuario));
        if($query->num_rows() == 1)
        {
            $row=$query->row();
            if(password_verify($password, $row->password))
            {
                $data=array('user_data'=>array(
                    'usuario'=>$row->usuario,
                    'password'=>$row->password)
                );
                $this->session->set_userdata($data);
                return true;
            }
        }
        $this->session->unset_userdata('user_data');
        return true;


    }




}
?>