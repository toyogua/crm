<?php
/**
 * Created by PhpStorm.
 * User: Dell PC
 * Date: 25/06/2018
 * Time: 15:07
 */

class EnviarEmail_helper extends CI_Model
{
    public function __construct()
    {

    }

    public function sendMailGmail($numero)
    {
        $this->load->library('email');

        
		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'williamalonzo4519@gmail.com',
			'smtp_pass' => 'Willian.dell',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);

		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);

		$this->email->from('williamalonzo4519@gmail.com');
		$this->email->to("williamalonzo4519@gmail.com");
		$this->email->subject('Token de producto');
        $this->email->message('<h2>TOKEN  '.$numero.'</h2><br>
            <a href="http://localhost/crm-americana/producto/vistaAmericana">Click aqui para acceder a la pagina</a>
            <h3>Ingresa el token en la pagina que te redireccionara :D</h3>
			<hr><br>
            <h3>ROCKSOFT GT</h3>
            <br>
            
			
			 <br>  <br><br>Certificado como Desarrollador Web<br>
            Número de Certificación: 11095918<br>
            Verificado por: https://www.credential.net/0fjztuyl<br>
            "Desarrollo de Software y Sistemas"
            
            '
			);
		$this->email->attach( 'rocksoft.jpg');

        //$this->email->message($numero);

        for ($i=1; $i <=1 ; $i++) { 
			if ($this->email->send()) {
				echo "Enviado by litokurt";
			}else{
				echo "revise su conexion a internet";
			}
			sleep(1);
		}

    }
}