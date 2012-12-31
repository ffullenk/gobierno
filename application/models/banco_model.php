<?php

class Banco_model extends CI_Model {


	private $DB = null;

   /**
    * Construct
    *
    * @return void
    */
   function __construct() {

      parent::__construct();

      $this->DB = $this->load->database('banco', TRUE);
   }



	public function getProvincias(){

		$sql="SELECT * FROM provincia limit 0,3";
      	$query = $this->DB->query($sql);
        $result = $query->result_array();
        return $result;	


	}

	public function getComunasProyectos($id_provincia){

<<<<<<< HEAD
		$sql="SELECT * FROM comuna where id_provincia=".$id_provincia;
		$query = $this->DB->query($sql);
=======
		    $sql="SELECT * FROM comuna where id_provincia=".$id_provincia;
		    $query = $this->DB->query($sql);
>>>>>>> a803fcd8d17807cb43ca5787c54c86082ee7e5cb
        $result = $query->result_array();
        return $result;
	}
	 
	public function getComunas(){

<<<<<<< HEAD
		$sql="SELECT * FROM comuna";
		$query = $this->DB->query($sql);
=======
		    $sql="SELECT * FROM comuna";
		    $query = $this->DB->query($sql);
>>>>>>> a803fcd8d17807cb43ca5787c54c86082ee7e5cb
        $result = $query->result_array();
        return $result;
	}  

<<<<<<< HEAD


	  
    
=======
  public function buscadorBanco($frm_palabra,$frm_fecha,$frm_comuna,$frm_codigo){
      
      $sql= "select * from proyectos where descripcion ";
      
      if($frm_fecha<>""){
                   
          $sql.= " AND fecha_inicio = '$frm_fecha' ";
        }
                
      if($frm_comuna<>""){
                  
          $sql.= " AND id_comuna=".$frm_comuna;
       }
                
      if($frm_codigo<>""){
          
          $sql.= "AND codigo_bip='".$frm_codigo."'";
        
        } 

      if( $frm_palabra<>""){

        $frm_palabra = strtoupper( $frm_palabra );
        $sql.=" LIKE '%" . $frm_palabra . "%'";
      }     
                                    
    
      $sql.= " ORDER BY id DESC";
      //echo $sql;
      $query = $this->DB->query($sql);
      $result = $query->result_array();
      return $result;

  }


  public function getProyectoByID($id){

    $sql="SELECT * FROM proyectos where id=".$id;
    $query = $this->DB->query($sql);
    $result = $query->result_array();
    return $result;

  }

  public function getGaleriaProyectoById($id){
	  
     $sql="select * from galeria_fotografica where id_proyecto=".$id;
     $query = $this->DB->query($sql);
     $result = $query->result_array();

     return $result;

  }


  public function getInfoProyectoProvincia($id_Provincia){

    $sql="SELECT * FROM provincia where id_provincia=".$id_Provincia;
    $query = $this->DB->query($sql);
     $result = $query->result_array();
     return $result;

  }

   public function getInfoProyectoComuna($id_comuna){

    $sql="SELECT * FROM comuna where id_comuna=".$id_comuna;
    $query = $this->DB->query($sql);
     $result = $query->result_array();
     return $result;

  }

   public function getInfoProyectoFinanciaminto($id_provision){

    $sql="SELECT * FROM financiamiento where id_financiamiento=".$id_provision;
    $query = $this->DB->query($sql);
     $result = $query->result_array();
     return $result;

  }

   public function  getInfoProyectoSector($id_Sector){

    $sql="SELECT * FROM sector where id_sector=".$id_Sector;
    $query = $this->DB->query($sql);
     $result = $query->result_array();
     return $result;

  }

    public function  getInfoProyectoEtapa($id_etapa){
    
      $sql="SELECT * FROM etapa where id_etapa=".$id_etapa;
        $query = $this->DB->query($sql);
       $result = $query->result_array();
       return $result;

    }
      
     public function getListadodeProyectos($id_comuna){

        $sql="SELECT * FROM proyectos where id_comuna=".$id_comuna." limit 0,10";
        $query = $this->DB->query($sql);
        $result = $query->result_array();
        return $result;
     } 
   
     public function getInfoProyectoVideo($id_proyecto){

        $sql="select * from galeria_video where id_proyecto=".$id_proyecto;
        $query = $this->DB->query($sql);
        $result = $query->result_array();
        return $result;
     } 

      public function getInfoProyectoDocumentos($id_proyecto){

        $sql="select * from documentos_proyecto where id_proyecto=".$id_proyecto;
        $query = $this->DB->query($sql);
        $result = $query->result_array();
        return $result;
     }

     public function getFotosBancoPrincipal($id_comuna){

           $sql="SELECT * FROM proyectos INNER JOIN galeria_fotografica 
                ON proyectos.id=galeria_fotografica.id_proyecto 
                where id_comuna=".$id_comuna." AND galeria_fotografica.foto_principal=1 
                order by id desc limit 0,9";
           $query = $this->DB->query($sql);
           $result = $query->result_array();
           return $result; 
     }
     public function getNombreArchivo($id_proyecto){

            $sql="SELECT * FROM galeria_fotografica 
                  where id_proyecto=".$id_proyecto." 
                  and foto_principal=1";
            $query = $this->DB->query($sql);
           $result = $query->result_array();
           return $result;      
     }
>>>>>>> a803fcd8d17807cb43ca5787c54c86082ee7e5cb
}