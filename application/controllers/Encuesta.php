<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Encuesta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Utilerias');
        $this->load->model('Encuesta_model');
        $this->load->model('Municipio_model');
    } // __construct()

    public function get_encuesta()
    {
        if(Utilerias::verifica_sesion_redirige($this)){
            $data = array();
            $id_encuesta = 1;
            $preguntas = $this->Encuesta_model->get_encuesta($id_encuesta);
            $municipios = $this->Municipio_model->get_municipios();
            $data = array("preguntas" => $preguntas, "municipios" => $municipios);
            // echo "<pre>";
            // print_r($data);
            // die();
            $string = $this->load->view('encuesta/encuesta', $data, TRUE);
            $response = array("vista" => $string);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
            redirect('Login/index');
        }
    }//get_encuesta()

    public function set_encuesta(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $sesion = Utilerias::get_cct_sesion($this)[0];
            // Utilerias::set_cct_sesion($this, $datoscct);
            // echo"<pre>";
            // print_r($_POST);
            // die();
            $nombre = $this->input->post('nombre');
            $nombre_id = $this->input->post('nombre_oculto');
            $apellido1 = $this->input->post('ape1');
            $apellido1_id = $this->input->post('ape1_oculto');
            $apellido2 = $this->input->post('ape2');
            $apellido2_id = $this->input->post('ape2_oculto');
            $edad = $this->input->post('edad');
            $edad_id = $this->input->post('edad_oculto');
            $domicilio = $this->input->post('domicilio');
            $domicilio_id = $this->input->post('domicilio_oculto');
            $colonia = $this->input->post('colonia');
            $colonia_id = $this->input->post('colonia_oculto');
            $municipio = $this->input->post('municipio');
            $municipio_id = $this->input->post('municipio_oculto');
            $localidad = $this->input->post('localidad');
            $localidad_id = $this->input->post('localidad_oculto');
            $telefono = $this->input->post('telefono');
            $telefono_id = $this->input->post('telefono_oculto');
            $rezago = $this->input->post('rezago');
            $rezago_id = $this->input->post('rezago_oculto');
            // $respuestas = array();
            $respuestas = array(array("id_pregunta" => $nombre_id, "respuesta" => strtoupper(trim($nombre))),
                                array("id_pregunta" => $apellido1_id, "respuesta" => strtoupper(trim($apellido1))),
                                array("id_pregunta" => $apellido2_id, "respuesta" => strtoupper(trim($apellido2))),
                                array("id_pregunta" => $edad_id, "respuesta" => $edad),
                                array("id_pregunta" => $domicilio_id, "respuesta" => strtoupper(trim($domicilio))),
                                array("id_pregunta" => $colonia_id, "respuesta" => strtoupper(trim($colonia))),
                                array("id_pregunta" => $municipio_id, "respuesta" => $municipio),
                                array("id_pregunta" => $localidad_id, "respuesta" => strtoupper(trim($localidad))),
                                array("id_pregunta" => $telefono_id, "respuesta" => trim($telefono)),
                                array("id_pregunta" => $rezago_id, "respuesta" => $rezago)
                            );

            $save_encuesta = $this->Encuesta_model->set_encuesta($sesion['id_cct'], $sesion['cct'], $respuestas, 1);
            $response = array("save" => $save_encuesta);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
            redirect('Login/index');
        }
    }//set_encuesta()

    public function get_encuestasxcct(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $sesion = Utilerias::get_cct_sesion($this)[0];
            // echo"<pre>";
            // print_r($sesion); die();
            $encuestas = $this->Encuesta_model->get_encuestasxcct($sesion['id_cct']);
                //         echo"<pre>";
                // print_r($encuestas); die();
            $str_table = "";
            $apell1 = "";
            $apell2 = "";
            $nombre ="";
            $haydatos = false;
            if(count($encuestas) > 0){
                $aux = 0;
                $haydatos = true;
                foreach ($encuestas as $encuesta) {
                //         echo"<pre>";
                // print_r($encuesta); die();
                $idencuesta = $encuesta['id_encuesta'];
                $aux = $aux + 1 ;
                $respuestas = explode("&", $encuesta['resp']);

                
                foreach ($respuestas as $respuesta) {
                //     echo"<pre>";
                // print_r($respuesta); //die();
                    $descomp = explode("_", $respuesta);
                //         echo"<pre>";
                // print_r($descomp[1]); //die();
                    $id_pregunta = $descomp[0];
                    $respuesta_des = $descomp[1];
                    if($id_pregunta == 18){
                        $nombre = $respuesta_des;
                    }else if($id_pregunta == 19){
                        $apell1 = $respuesta_des;
                    }else if($id_pregunta == 20){
                        $apell2 = $respuesta_des;
                    }else if($id_pregunta == 21){
                        $edad = $respuesta_des;
                    }else if($id_pregunta == 22){
                        $domicilio = $respuesta_des;
                    }else if($id_pregunta == 24){
                        $municipio = $this->Municipio_model->get_municipio($respuesta_des)[0]['municipio'];
                    }else if($id_pregunta == 27){
                        $rezago = $respuesta_des;
                    }
                    $n_completo = $nombre." ".$apell1." ".$apell2;
                }
                

                $str_table .= "<tr>
                      <th scope='row' class='align-middle'>{$aux}</th>
                      <td class='align-middle'>{$n_completo}</td>
                      <td class='align-middle'>{$edad}</td>
                      <td class='align-middle'>{$domicilio}</td>
                      <td class='align-middle'>{$municipio}</td>
                      <td class='align-middle'>{$rezago}</td>
                      <td class='align-middle'><button class = 'btn btn-md btn-secondary' onclick=obj_registro.edit_encuesta({$idencuesta})><i class='fas fa-edit'></i></button></td>
                      <td class='align-middle'><button class = 'btn btn-md btn-danger' onclick=obj_registro.delete_encuesta({$idencuesta}) ><i class='fas fa-trash-alt'></i></button></td>
                    </tr>";
            }
            }else{
                $str_table .= "<tr>
                      <td colspan='8'><center><H4>SIN DATOS QUE MOSTRAR</H4></center></td>
                    </tr>";
            }
            
            $response = array("str_table" => $str_table, "haydatos" => $haydatos);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
            redirect('Login/index');
        }
    }

    public function delete_encuesta(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $idencuesta = $this->input->post('id_encuesta');
            $delete = $this->Encuesta_model->delete_encuestaxcct($idencuesta);
            $response = array("delete" => $delete);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
            redirect('Login/index');
        }
    }

    public function delete_encuestas(){
        if(Utilerias::verifica_sesion_redirige($this)){
            echo"<pre>";
            print_r($_POST);
            die();
            $response = array("delete" => $delete);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
            redirect('Login/index');
        }
    }

    public function edit_encuesta(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $idencuesta = $this->input->post('id_encuesta');
            $preguntas = $this->Encuesta_model->get_encuesta(1);
            $respuestas = $this->Encuesta_model->get_encuestaxcct($idencuesta);
            $municipios = $this->Municipio_model->get_municipios();
            $data = array("preguntas" => $preguntas, "municipios" => $municipios);
            // echo"<pre>";
            // print_r($data);
            // die();
            $string = $this->load->view('encuesta/encuesta.php', $data, TRUE);
            $response = array("vista" => $string, "respuestas" => $respuestas, "id_encuesta_edit" => $idencuesta);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
            redirect('Login/index');
        }
    }

    public function edit_encuesta_save(){
        if(Utilerias::verifica_sesion_redirige($this)){
            $sesion = Utilerias::get_cct_sesion($this)[0];
            // Utilerias::set_cct_sesion($this, $datoscct);
            $id_editada = $this->input->post('input_editando_encuesta');
            $nombre = $this->input->post('nombre');
            $nombre_id = $this->input->post('nombre_oculto');
            $apellido1 = $this->input->post('ape1');
            $apellido1_id = $this->input->post('ape1_oculto');
            $apellido2 = $this->input->post('ape2');
            $apellido2_id = $this->input->post('ape2_oculto');
            $edad = $this->input->post('edad');
            $edad_id = $this->input->post('edad_oculto');
            $domicilio = $this->input->post('domicilio');
            $domicilio_id = $this->input->post('domicilio_oculto');
            $colonia = $this->input->post('colonia');
            $colonia_id = $this->input->post('colonia_oculto');
            $municipio = $this->input->post('municipio');
            $municipio_id = $this->input->post('municipio_oculto');
            $localidad = $this->input->post('localidad');
            $localidad_id = $this->input->post('localidad_oculto');
            $telefono = $this->input->post('telefono');
            $telefono_id = $this->input->post('telefono_oculto');
            $rezago = $this->input->post('rezago');
            $rezago_id = $this->input->post('rezago_oculto');
            // $respuestas = array();
            $respuestas = array(array("id_pregunta" => $nombre_id, "respuesta" => strtoupper(trim($nombre))),
                                array("id_pregunta" => $apellido1_id, "respuesta" => strtoupper(trim($apellido1))),
                                array("id_pregunta" => $apellido2_id, "respuesta" => strtoupper(trim($apellido2))),
                                array("id_pregunta" => $edad_id, "respuesta" => $edad),
                                array("id_pregunta" => $domicilio_id, "respuesta" => strtoupper(trim($domicilio))),
                                array("id_pregunta" => $colonia_id, "respuesta" => strtoupper(trim($colonia))),
                                array("id_pregunta" => $municipio_id, "respuesta" => $municipio),
                                array("id_pregunta" => $localidad_id, "respuesta" => strtoupper(trim($localidad))),
                                array("id_pregunta" => $telefono_id, "respuesta" => trim($telefono)),
                                array("id_pregunta" => $rezago_id, "respuesta" => $rezago)
                            );

            $save_encuesta_editada = $this->Encuesta_model->set_encuesta_edit($respuestas, $id_editada);
            $response = array("update" => $save_encuesta_editada);
            Utilerias::enviaDataJson(200, $response, $this);
            exit;
        }else{
            redirect('Login/index');
        }
    }

    public function sin_registros_update(){
        if(Utilerias::verifica_sesion_redirige($this)){
            
            $sesion = Utilerias::get_cct_sesion($this)[0];
            $id_cct = $sesion['id_cct'];
            $estatus = $this->input->post("estatus");
            // echo"<pre>";
            // print_r($_POST);
            // die();
            $preguntas = $this->Encuesta_model->sin_registros_update($id_cct, intval($estatus));
            // $data = array("preguntas" => $preguntas, "municipios" => $municipios);
            
            // $string = $this->load->view('encuesta/encuesta.php', $data, TRUE);
            // $response = array("vista" => $string, "respuestas" => $respuestas, "id_encuesta_edit" => $idencuesta);
            // Utilerias::enviaDataJson(200, $response, $this);
            // exit;
        }else{
            redirect('Login/index');
        }
    }
} // class