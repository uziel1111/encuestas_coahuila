<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Utilerias');
        $this->load->model('Cct_model');
        $this->cct = array();
    } // __construct()

    public function index()
    {
        if(Utilerias::verifica_sesion_redirige($this)){
            $this->sesion = Utilerias::get_cct_sesion($this);
            if(isset($this->sesion['tipoUser']) && $this->sesion['tipoUser'] == CENTRALUSER){
                $data = array();
                $data['cct'] = array('cct'=>"CENTRAL", 'turno'=>"CENTRAL", 'nombre_ct'=>"CENTRAL");
                Utilerias::pagina_basica($this,"central/index", $data);
            }else{
                $data = array();
                $data['turnos'] = $this->Cct_model->get_turnos();
                $this->cct = Utilerias::get_cct_sesion($this)[0];
                $data['cct'] = $this->cct;
                $estatus = $this->Cct_model->get_estatus_registros($this->cct['id_cct']);
                if(count($estatus) > 0){
                    $data['sinregistros'] = $estatus[0]['registro'];
                }else{
                    $data['sinregistros'] = "sin";
                }
                Utilerias::pagina_basica($this,"principal/index", $data);
            }
        }


    }




} // class