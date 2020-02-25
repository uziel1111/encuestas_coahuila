<?php
defined('BASEPATH') or exit('No direct script access allowed');

define("ZONAHORARIA", "America/Mexico_City");
// define('DATOSUSUARIO', "datos_usuario");
define('DATOCCT', "datos_cct");
define('MESSAGEREQUEST', 'message_request');
define('SUCCESMESSAGE', '1');
define('ERRORMESSAGE', '2');

define('CENTRALUSER', '1');
define('CCTUSER', '2');

class Utilerias
{
    public function __construct()
    {
        date_default_timezone_set(ZONAHORARIA);
    }

    /**
     * Carga la vista básica del Visor de  propiedades, vista y footer.
     *
     * @param CONTROLLER $contexto   Desde dónde se llamará a la vista
     * @param VISTA $vista      El nombre de la vista que se cargará después del header
     * @param DATA  $data       Arreglo con los campos que usará templates/header y $vista
     */
    public static function pagina_basica($contexto, $vista = '', $data)
    {
        $contexto->load->view('templates/header', $data);
        $contexto->load->view($vista, $data);
        $contexto->load->view('templates/footer', $data);
    } // pagina_basica_visorp()

    /*
    Función para retornar datos a peticiones ajax
     */
    public static function enviaDataJson($status, $data, $contexto)
    {
        return $contexto->output
            ->set_status_header($status)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
    } // enviaDataJson()

    public static function set_cct_sesion($contexto, $datoscct){
        $contexto->session->set_userdata(DATOCCT, $datoscct);
    } // set_cct_sesion()

    public static function get_cct_sesion($contexto) {
        if (Utilerias::haySesionAbiertacct($contexto)) {
            return $contexto->session->userdata(DATOCCT);
        } else {
            return null;
        }
    }//get_cct_sesion()


    public static function get_terminosycondiciones()
    {
        return "
                <ul>
                  <li>Omivende no acepta depósitos via OXXO, 7-Eleven o cualquier tienda de conveniencia.</li>
                  <li>Omivende no se hace responsable de transacciones realizadas con el propietario o contratante.</li>
                <ul>
        ";
    } // get_terminosycondiciones()

    public static function haySesionAbiertacct($contexto) {
        if($contexto->session->has_userdata(DATOCCT)){
            return true;
        }else{
            return false;
        }
    }


    public static function verifica_sesion_redirige($contexto) {
        if (Utilerias::haySesionAbiertacct($contexto)) {
            return true;
            // redirect('Panel', 'refresh');
        }else{
            // return false;
            redirect('/', 'refresh');
        }
        
    }

    public static function destroy_all_session_cct($contexto){
        // echo "vaciamos la sesion";die();
            // Vacio los datos
            $contexto->session->unset_userdata(DATOCCT);
            $contexto->session->sess_destroy();
            // echo "murio la sesion"; die();
            return true;
            
        } // destroy_all_session_cct()
    
    public static function get_notification_alert($mensaje, $tipo, $cerrar = true)
        {
            $type = "alert-info";

            switch ($tipo) {
                case SUCCESMESSAGE:
                    $type = "alert-success ";
                    break;
                case ERRORMESSAGE:
                    $type = "alert-danger ";
                    break;
            }

            return "
                <div class='alert " . $type . " alert-dismissable'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <center>" . $mensaje . "</center>
                </div>
                ";
        } // get_notification_alert()




} // class Utilerias
