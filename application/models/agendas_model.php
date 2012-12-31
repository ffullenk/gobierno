<?php

class Agendas_model extends CI_Model {


	 private $DB = null;

   /**
    * Construct
    *
    * @return void
    */
	   function __construct() {

	      parent::__construct();

	      $this->DB = $this->load->database('agendas', TRUE);
	   }




	 public function getActividadesAgenda($datevalue){

        $sql="select * from rp_resa where DateRs='".$datevalue."'";
        $query = $this->DB->query($sql);
        $datos = $query->result_array();
        return $datos;      

    }
}