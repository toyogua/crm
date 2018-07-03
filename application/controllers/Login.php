<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 24/06/2018
 * Time: 13:51
 */

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('Login_helper');

    }
    public function index()
    {
        $this->load->view('capas/cabecera');
        $this->load->view('login/login_view');
    }
    public function index1()
    {
        $this->load->view('capas/cabecera');
        $this->load->view('login/registrar_view');
    }

    #registrar usuarios en el sistema
    public function registrar()
    {
        $this->load->model('Login_model');
        $options = ['cost'=>12];
        $encripted_pass = password_hash($this->input->post('txtClave'), PASSWORD_BCRYPT,  $options);

        //$encripted_pass = $this->encrypt->sha1($this->input->post('txtClave'));

        $data['persona'] = $this->Login_model->get_all();
        $data = array(
            'nombre' => $this->input->post('txtNombre'),
            'apellido' => $this->input->post('txtApellido'),
            'email' => $this->input->post('txtEmail'));

        $lastId = $this->Login_model->ingresarPersona($data);
        #$this->prueba_model->crearUsuario($data);

        echo $lastId;

        if($lastId>0)
        {
            $data1['login'] = $this->Login_model->get_allp();
            $data1 = array(
                'usuario' => $this->input->post('txtUsuario'),
                'password' => $encripted_pass
            );
            $data1['idPersona'] = $lastId;
            $this->Login_model->ingresarUsuario($data1);


        }
        echo $lastId;
        //$this->load->view('login/registrar_view');


    }


    #ingresar al sistema
    public function login()
    {
        $this->load->model('Login_model');

        $options = ['cost'=>12];
        $usuario = $this->input->post('txtUsuario');
        $pass = $this->input->post('txtClave');
        $encripted_pass = password_hash($this->input->post('txtClave'), PASSWORD_BCRYPT,  $options);
        //$encripted_pass = $this->encrypt->sha1($this->input->post('txtClave'));

        $res = $this->Login_model->login($usuario, $pass);

        if($res == 1)
        {
            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('login_success', 'Bienvenido al sistema');
            $this->load->view('capas/cabecera');
            $this->load->view('inicio/inicio');
            $this->load->view('capas/footer');

        }else{
            $data['mensaje'] = "datos incorrectos";
           redirect('Login/index');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();


        if (!$this->session->userdata('logged_admin')){
            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('Login/index');
        }

        $this->session->sess_destroy();
        redirect('Login/index');

    }



    public function login1()
    {

        $this->load->model('Login_model');

        $usuario = $this->input->post('txtUsuario');
        $pass = $this->input->post('txtClave');



            if($this->input->post('txtUsuario') && $this->input->post('txtClave')){
                $username = $this->input->post('txtUsuario');
                $password = $this->input->post('txtClave');

                $user_id = $this->Login_model->login_user($username, $password);

                if ($user_id) {
                    $user_data = array(
                        'idLogin' => $user_id,
                        'usuario' => $username,
                        'logged_admin' => true
                    );

                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('login_success', 'Bienvenido al sistema');

                    $this->load->view('capas/cabecera');
                    $this->load->view('inicio/inicio');
                    $this->load->view('capas/footer');


                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('login_failed', 'Lo sentimos, no lograste ingresar al sistema');
                    redirect('Login/index');
                }

            }

    }




}
?>