<?php
class Cct_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function getdatoscct($cct, $id_turno){
      $str_query = "SELECT ct.id_cct, ct.cct, ct.nombre_ct, ct.turno, sr.registro FROM seguridad s
      INNER JOIN cct ct on ct.id_cct =  s.id_cct
      LEFT JOIN sin_registro sr on sr.id_cct = ct.id_cct
      WHERE ct.cct = ? AND s.id_turno = ?";
      return $this->db->query($str_query, array($cct, $id_turno))->result_array();
    }// getdatoscct()

    function get_turnos(){
      $str_query = "SELECT * FROM turno 
      WHERE estatus = 1";
      return $this->db->query($str_query)->result_array();
    }// get_turnos()

    function get_estatus_registros($id_cct){
      $str_query = "SELECT registro FROM sin_registro WHERE id_cct = ?";
      return $this->db->query($str_query, array($id_cct))->result_array();
    }

}// Prioridad_model
