<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Willian Alonzo
 * Date: 17/06/2018
 * Time: 18:11
 */

class Producto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        /*if (!$this->session->userdata('s_usuario')){
            $this->session->set_flashdata('no_access', 'No estas autorizado para ingresar a esta dirección!');
            redirect('login/login');
        }*/
        #redirect("inicio/inicio.php");
        $this->load->helper('form');
        $this->load->model('Productos_model');
        $this->load->library('form_validation');
        $this->load->model('Productos_model');
        $this->load->model('NumeroAleatorio_model');
        $this->load->model('EnviarEmail_helper');
        $this->load->model('Reparacion_model');


    }
    function index(){
        //$data['Producto'] = $this->Productos_model->listar_productos();
        $this->load->view('capas/cabecera');
       # $this->load->view('capas/menu');
       // $this->load->view('productos/productos_view', $data);
        if($this->Productos_model->listar_productos()){
            $data['producto_data'] = $this->Productos_model->listar_productos();
        }

        //$data['main_view'] = "tiendas/display_tienda_view";

        $this->load->view('productos/productos_view', $data);

        $this->load->view('capas/footer');
        //$this->load->view('productos/ingresar_producto');

    }
    public function insert(){
        $this->load->view('capas/cabecera');
        $this->load->view('productos/ingresar_producto');
        $this->load->view('capas/footer');

    }
    public function insertarDatos()
    {
        $this->form_validation->set_rules('nombreProducto', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('descripcionProducto', 'Descripcion', 'trim|required');
        $this->form_validation->set_rules('txtReparacion', 'Reparacion', 'trim|required');
        $this->form_validation->set_rules('txtEstado', 'Estado', 'trim|required');

        $this->form_validation->set_message('required', 'El campo %s es requerido');


        $data['producto'] = $this->Productos_model->get_all();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('capas/cabecera');
            $this->load->view('productos/ingresar_producto');
            $this->load->view('capas/footer');

        } else {
            $data = array(
                'nombreProducto' => $this->input->post('nombreProducto'),
                'descripcionProducto' => $this->input->post('descripcionProducto'),
            );
            $idProducto = $this->Productos_model->insertar_producto($data);

            $nombre = $this->input->post('nombreProducto');
            $numero1 = rand(1, 1000);
            $numero2 = rand(1, 100);
            $cadena = substr($nombre, 0, 2);
            $cadena2  = substr($nombre, 3, 5);
            $num = (string)$numero1;
            $num2 = (string)$numero2;
            $numero = $num2.$cadena . $num.$cadena2;

            echo $idProducto;


            if ($idProducto > 0) {
                $data1['numeroaleatorio'] = $this->NumeroAleatorio_model->get_all_numeros();

                $data1 = array(
                    'numeroGenerado' => $numero

                );


                $data1['idProducto'] = $idProducto;
               
                $this->NumeroAleatorio_model->ingresarNumerosAleatorios($data1);


            }

            if ($idProducto > 0) {
                $data2['reparacion'] = $this->Reparacion_model->get_all3();

                $data2 = array(
                    'descripcionReparacion' => $this->input->post('txtReparacion'),
                    'estado' => $this->input->post('txtEstado')

                );
                $data2['idProducto'] = $idProducto;
                $this->Reparacion_model->ingresarReparacion($data2);
                $this->EnviarEmail_helper->sendMailGmail($numero);


            }
            redirect('Producto/index');

            
            #$this->prueba_model->crearUsuario($data);
           

        }

    }

    public function buscar()
    {
        $this->load->view('capas/cabecera');
        $this->load->view('productos/mostrar_producto_view');
        $this->load->view('capas/footer');
    }

    public function vistaAmericana()
    {
        $this->load->view('capas/cabecera');
        $this->load->view('productos/buscar_producto_view');
        $this->load->view('capas/footer');
    }

    public function buscarProducto()
    {       
        $nombreCarrera = $this->input->post('txtBuscar');
        $this->form_validation->set_rules('txtBuscar', 'Estado', 'trim|required');

        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == TRUE) {

        $data['data_Producto'] = $this->Productos_model->buscarProducto($nombreCarrera);
        $this->load->view('capas/cabecera');
        $this->load->view('productos/mostrar_producto_view', $data);

        $this->load->view('capas/footer');
        }
        else {
            
            redirect('producto');
            
        }

    }




    public function eliminar($idProducto)
    {

        $this->Productos_model->eliminar($idProducto);

        redirect('producto/index');
    }

  public function update($id)
   {
        $this->form_validation->set_rules('nombreProducto', 'nombre', 'required');
        $this->form_validation->set_rules('descripcionProducto', 'Description', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('productos/productoEdit_view/'.$id));
        }else{ 
            $data=array(
                'nombreProducto' => $this->input->post('nombreProducto'),
                'descripcionProducto'=> $this->input->post('descripcionProducto')
            );
            $data2 = array(
                'descripcionReparacion' => $this->input->post('txtReparacion'),
                'estado' => $this->input->post('txtEstado')

            );
            $this->Reparacion_model->actualizar_variosr($id, $data2);            
            $this->Productos_model->actualizar_varios($id, $data);
          //$this->Productos_model->update_item($id);
          redirect(base_url('producto'));
        }
   }

    public function edit($id)
   {
       $item['producto'] = $this->Productos_model->buscarProductoId($id);


       $this->load->view('capas/cabecera');
       $this->load->view('productos/productoEdit_view', $item);
       $this->load->view('capas/footer');
   }


}