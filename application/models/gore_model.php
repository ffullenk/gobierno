<?php

class Gore_model extends CI_Model {


	public function getNoticiasPrincipal(){

		$sql="SELECT id, fecha, dstc, titulo, encabezado, cuerpo, imagen, descimg, 
             fuente FROM noticia INNER JOIN fuente ON 
             noticia.idfuente = fuente.idfuente WHERE principal = '1' 
             ORDER BY fecha DESC limit 0,1"; 
      	$query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;	

	}
	       
    public function getFuentesPrincipal(){

        $sql="SELECT id, fecha, dstc, titulo, encabezado, imagen, descimg, fuente 
             FROM noticia INNER JOIN fuente ON noticia.idfuente = fuente.idfuente 
             WHERE dstc=1 and principal=0 order by fecha desc limit 0,3"; 
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 

    }


    public function getImageneFuentesById($idNoticia){

        $sql="select * from galeria_fotografica where id_noticias=".$idNoticia." 
                         and id_tipo_galeria=1 and foto_principal=1 ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
            
     } 

    public function getBrevesPrincipal(){

        $sql="SELECT id_breves, fecha, dstc, titulo, cuerpo, imagen, descimg, fuente 
             FROM noticia_breves INNER JOIN fuente ON noticia_breves.idfuente = fuente.idfuente 
             WHERE dstc=1 and principal=1 order by id_breves desc limit 0,4"; 
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
    }

       
     public function getImageneBrevesById($idBreve){

        $sql="SELECT * FROM galeria_fotografica WHERE id_noticias ='".$idBreve."'
                AND id_tipo_galeria =2 AND foto_principal =1
                ORDER BY foto_principal DESC LIMIT 0 , 30";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
            
     } 

     public function galeriaCarrusel(){

        $sql="SELECT * FROM galeria_fotografica
                WHERE id_tipo_galeria =2 AND foto_principal =1
                ORDER BY id_galeria DESC LIMIT 0 , 10";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
            
     } 

     public function noticiasVistaBreves($id_not){

         $sql="SELECT id_breves, fecha, dstc, titulo,
                 imagen, descimg, fuente, cuerpo
                 FROM noticia_breves INNER JOIN fuente 
                 ON noticia_breves.idfuente = fuente.idfuente 
                 WHERE id_breves =".$id_not;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
     }

     public function noticiasVistaFuentes($id_not){

        $sql="SELECT id, fecha, dstc, titulo, encabezado, 
            imagen, descimg, fuente, cuerpo, embed 
             FROM noticia INNER JOIN fuente ON noticia.idfuente = fuente.idfuente 
             WHERE id =".$id_not;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
     }

       public function  getComunas($id){

        $sql="SELECT id_com, comuna FROM comuna WHERE id_com='".$id."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
     }


       public function getAlcaldes($id){

        $sql="SELECT * FROM alcaldes WHERE idcom = '".$id."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
     }

      public function getConsejales($id){

        $sql="SELECT * FROM concejales WHERE idcom='".$id."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 
      }
                                                                                                    
      
      public function getComunaByName($name){


        $sql="SELECT id_com, comuna FROM comuna WHERE comuna='".$name."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
      }


      public function getSeremis(){

        $sql="SELECT id, acronimo, jefe, foto FROM servpub WHERE tiposerv='1'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
      }

      public function getSeremisById($id){

      $sql="SELECT id, acronimo, servicio, ub_dir, ub_ciu, ub_fon,
                     ub_fax, ub_ema, ub_web, jefe, foto, biografia, hitos, 
                     objetivos FROM servpub WHERE id=".$id;
      $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
      }



      public function getMeses(){

        $sql="select * from mes";
        $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
      } 

      public function getFuentes(){

        $sql="SELECT idfuente, fuente FROM fuente ORDER BY fuente ASC";
        $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
      } 



        public function getNoticias($tabla){

        $sql = "select * FROM ".$tabla." INNER JOIN fuente 
                ON ".$tabla.".idfuente = fuente.idfuente 
                 ORDER BY fecha DESC";


        /*$sql="SELECT id, fecha, dstc, titulo, encabezado, cuerpo, imagen, descimg, 
             fuente FROM noticia INNER JOIN fuente ON 
             noticia.idfuente = fuente.idfuente 
             ORDER BY fecha DESC ";*/ 
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result; 

    }


    public function buscadorNoticias($year,$mes,$fuente,$fecha,$cadena,$tabla){

        $year=($year==0)?date('Y'):$year;
        $mes=($mes==0)?date('m'):$mes;

        $sql = "select * FROM ".$tabla." INNER JOIN fuente 
                ON ".$tabla.".idfuente = fuente.idfuente 
                WHERE dstc=1";
                                                                   
        if($fecha<>""){
                                      
            $sql .= " AND fecha = '$fecha' ";
         }
                                     
        if($fuente<> 0){
            
            $sql .= " AND $tabla.idfuente = '$fuente' ";
        }
                                    
        if($cadena<>""){
            
            $cadena = strtoupper( $cadena );
            $sql .= " AND titulo LIKE '%" . $cadena . "%'";
        }

         if($fecha == ""){

            $sql.= " AND month(fecha)=".$mes." and year(fecha)=".$year." ";

         }

        $sql.= " ORDER BY fecha DESC";
        //echo $sql;
        //exit;       
        $query = $this->db->query($sql);
        $datos = $query->result_array();

        return $datos;

    }




    /**
     * Muestra la galeria de videos por noticia
     * @var string
     */
    public function getGaleriaVideoById($id_not){


        $sql="SELECT * FROM galeria_video where id_noticias=".$id_not;
        $query = $this->db->query($sql);
        $datos = $query->result_array();

        return $datos;      

    }




    /**
     * [muestra las imagenes de la galeria de cada noticia ]
     * @var string
     */
    
     public function getGaleriaFotograficaById($id_not){


         $sql="SELECT * FROM galeria_fotografica WHERE 
            id_noticias=".$id_not." order by foto_principal desc";  
        $query = $this->db->query($sql);
        $datos = $query->result_array();

        return $datos;      

    }
     

    /**
     * [Muestra imagen principal en noticia ]
     * @var string
     */
    
     public function getFotografiaPrincipalById($id_not){


        $sql="SELECT * FROM galeria_fotografica WHERE 
          id_noticias=".$id_not." and id_tipo_galeria=1 
          and foto_principal=1";
        $query = $this->db->query($sql);
        $datos = $query->result_array();

        return $datos;      

    }

    
    
     /**
     * [Muestra imagen principal en noticia breves ]
     * @var string
     */
    
     public function getBrevesPrincipalById($id_not){


        $sql="SELECT * FROM galeria_fotografica WHERE 
          id_noticias=".$id_not." and id_tipo_galeria=2 and 
          foto_principal=1"; 
        $query = $this->db->query($sql);
        $datos = $query->result_array();

        return $datos;      

    }


    public function getDocumentosById($id_not){
  

        $sql="SELECT * FROM documentos_noticia WHERE id_noticias =".$id_not;  
        $query = $this->db->query($sql);
        $datos = $query->result_array();
        return $datos;      


    }



      public function getSeremisEnlaces($id){

        $sql="SELECT id, dependencia, acronimo FROM servpub WHERE dependencia=".$id;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
      }






    public function getNoticiaById($id,$tabla,$idtabla){


        $sql = "select * FROM ".$tabla." INNER JOIN fuente 
                ON ".$tabla.".idfuente = fuente.idfuente 
                WHERE ".$tabla.".".$idtabla."=".$id;
        //echo $sql;
        //exit;
        $query = $this->db->query($sql);
        $datos = $query->result_array();

        return $datos;      



    }





    /**
     * Muestra la galeria  de audio por noticia
     * @var string
     */
    public function getGaleriaAudioById($id_not){


        $sql="SELECT * FROM galeria_audio WHERE id_noticias =".$id_not;  
        $query = $this->db->query($sql);
        $datos = $query->result_array();

        return $datos;      

    }




    public function getTitularesAgenda($datevalue){

        $sql="select * from titulares_agenda where fecha_titular='".$datevalue."' and estado=1";
        $query = $this->db->query($sql);
        $datos = $query->result_array();
        return $datos;      

    }

   
    public function getComentarios($id){

           $sql="select * from comentarios_noticias  where id_noticia=".$id." 
                    AND estado=1 order by fecha, hora desc";
         $query = $this->db->query($sql);
        $datos = $query->result_array();
        return $datos;            

    }

    public function insertarComentario($id,$nombre,$email,$comentario,$noticia){

        $fecha_ingreso=date("Y-m-d");
        $hora_ingreso=date("H:i:s");

        $sql = "INSERT INTO comentarios_noticias (id_noticia, usuario, email_usuario, comentario,
                fecha, hora, estado,id_tipo_noticia) VALUES";
        $sql.= "('".$id."','".$nombre."','".$email."',
                        '".$comentario."','".$fecha_ingreso."',
                        '".$hora_ingreso."',0,'".$noticia."')";
        $this->db->query($sql);
    }
    


    public function getGobernadorByAcronimo($acronimo){

           $sql="SELECT * FROM goberna WHERE acronimo='".$acronimo."'";
         $query = $this->db->query($sql);
        $datos = $query->result_array();
        return $datos;            

    }

    

}