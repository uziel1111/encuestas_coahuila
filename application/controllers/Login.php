<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Utilerias');
        $this->load->model('Cct_model');
        $this->load->model('Encuesta_model');
        $this->cct = array();
        $this->sesion = Utilerias::get_cct_sesion($this)[0];
    } // __construct()

    public function index(){
        if(Utilerias::haySesionAbiertacct($this)){
            redirect('Panel', 'refresh');
        }else{
            $data = array();
            $data['turnos'] = $this->Cct_model->get_turnos();
            Utilerias::pagina_basica($this,"index", $data);                
        }
    }

    public function acceso(){
        // var_dump($_POST);
        // die();
        $data = array();
            if(Utilerias::haySesionAbiertacct($this)){
                    redirect('Panel', 'refresh');
            }else{
                $cct = strtoupper($this->input->post('txt_cct_login'));
                if($cct == "admin@central" || $cct == "ADMIN@CENTRAL"){
                    $passuser = $this->input->post('inputPasswordcentral');
                    if(md5($passuser) == md5('c4l1s4')){
                        $datoscct = array("id_cct" =>"1", "cct"=>"CENTRAL", "nombre_ct"=>"CENTRAL", "turno"=>"ST", "registro"=>1, "tipoUser"=>CENTRALUSER);
                        Utilerias::set_cct_sesion($this, $datoscct);
                        $this->sesion = Utilerias::get_cct_sesion($this);
                        redirect('Panel', 'refresh');
                    }else{
                        $mensaje = "¡Los datos son incorrectos!";
                        $tipo    = ERRORMESSAGE;
                        $this->session->set_flashdata(MESSAGEREQUEST, Utilerias::get_notification_alert($mensaje, $tipo));
                        $data['turnos'] = $this->Cct_model->get_turnos();
                        Utilerias::pagina_basica($this,"index", $data);
                    }
                }else{
                    $turno = (int)$this->input->post('txt_turno_login');
                    $datoscct = $this->Cct_model->getdatoscct($cct, $turno);
                    if(count($datoscct) > 0){
                        Utilerias::set_cct_sesion($this, $datoscct);
                        $this->sesion = Utilerias::get_cct_sesion($this)[0];
                        $estatus = $this->Encuesta_model->acceso_sistema($this->sesion['id_cct']);
                        if($estatus){
                            redirect('Panel', 'refresh');
                        }
                    }else{
                        $mensaje = "¡Los datos son incorrectos!";
                        $tipo    = ERRORMESSAGE;
                        $this->session->set_flashdata(MESSAGEREQUEST, Utilerias::get_notification_alert($mensaje, $tipo));
                        $data['turnos'] = $this->Cct_model->get_turnos();
                        Utilerias::pagina_basica($this,"index", $data);
                    }
                }
        }
    }// index()

    public function cerrar_sesion(){
        if(Utilerias::destroy_all_session_cct($this)){
            redirect('Login/index');
        }
        
    }



} // class