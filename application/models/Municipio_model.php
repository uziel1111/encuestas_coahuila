<?php
class Municipio_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_municipios(){
      $str_query = "SELECT * FROM municipio";
      return $this->db->query($str_query)->result_array();
    }// get_municipios()

    function get_municipio($idmunicipio){
      $str_query = "SELECT * FROM municipio WHERE id_municipio = ?";
      return $this->db->query($str_query, array($idmunicipio))->result_array();
    }// get_municipios()

}// Prioridad_model
