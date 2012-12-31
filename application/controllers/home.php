<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();
		
	}


	public function index(){

		$data['noticias']=$this->gore_model->getNoticiasPrincipal();
		$data['fuentes']=$this->gore_model->getFuentesPrincipal();
		$data['breves']=$this->gore_model->getBrevesPrincipal();
		$data['galeria']=$this->gore_model->galeriaCarrusel();

		foreach ($data['noticias'] as $n) {
			
			$data['imagenes_noticias'][$n['id']]=$this->gore_model->getImageneFuentesById($n['id']);


		}
		foreach($data['fuentes'] as $f){

			$data['imagenes_fuentes'][$f['id']]=$this->gore_model->getImageneFuentesById($f['id']);
		}

		foreach($data['breves'] as $b){

			$data['imagenes_breves'][$b['id_breves']]=$this->gore_model->getImageneBrevesById($b['id_breves']);
		}
		
		$this->layout->view('home/index',$data);
	}

	

	public function noticiasVista(){


		$id=intval($this->uri->segment(2));
		
		$tabla=intval($this->uri->segment(3));

		$idtabla='';
		$tipo_noticia='';

		switch($tabla){
			
			case 0:
				$tabla="noticia";
				$idtabla="id";
				$tipo_noticia=1;
			break;
			case 1:
				$tabla="noticia";
				$idtabla="id";
				$tipo_noticia=1;
			break;
			case 2:
				$tabla="noticia_breves";
				$idtabla="id_breves";
				$tipo_noticia=2;
			break;
			default:
				$tabla="noticia";
				$idtabla="id";
				$tipo_noticia=1;
			break;

		}

		$data['noticia']=$this->gore_model->getNoticiaById($id,$tabla,$idtabla);
		if(empty($data['noticia'])){

			 echo'
				<script>
				window.location.href = "'.BASE_URI.'";
				</script>
				';
			   exit;
		}
		$data['id']=$id;
		$data['idtabla']=$idtabla;
		$data['comentarios']=$this->gore_model->getComentarios($id);
		$data['tipo_noticia']=$tipo_noticia;
		



		foreach($data['noticia'] as $n){

			$data['videos']=$this->gore_model->getGaleriaVideoById($n[$idtabla]);
			$data['audios']=$this->gore_model->getGaleriaAudioById($n[$idtabla]);
			$data['documentos']=$this->gore_model->getDocumentosById($n[$idtabla]);
			$data['fotografias']=$this->gore_model->getGaleriaFotograficaById($n[$idtabla]);

			if($tabla == "noticia"){

				$data['fotoprincipal']=$this->gore_model->getFotografiaPrincipalById($n[$idtabla]);
			}
			else{

				$data['fotoprincipal']=$this->gore_model->getBrevesPrincipalById($n[$idtabla]);
			}
			

		}
			

		$this->layout->view('home/noticias_vista',$data);
	}

	public function comentario(){

		$success['error']=true;
		$id_noticia=$this->input->post('noticia');
		$nombre=$this->input->post('nombre');
		$email=$this->input->post('email');
		$comentario=$this->input->post('comentario');
		$tipo_noticia=$this->input->post('tipo');
		



		if($nombre && $email && $comentario){

			$this->load->helper('email');
			if (valid_email($email)){
    			
				$this->gore_model->insertarComentario($id_noticia,$nombre,$email,$comentario,$tipo_noticia);
				print json_encode($success['error']);
				exit;	

			}
			else{

			    $success['error']='email';
				print json_encode($success['error']);
				exit;	
			}


			
		}
		else{
			$success['error']=false;
			print json_encode($success['error']);	
		}
		exit;

	}

	public function noticias($start = 0){

		$tabla='';
		$tabla=($this->input->post('tabla'))?$this->input->post('tabla'):'';
		switch($tabla){
			
			case 0:
				$tabla="noticia";
			break;
			case 1:
				$tabla="noticia";
			break;
			case 2:
				$tabla="noticia_breves";
			break;
		}

		$this->load->library('pagination');

		$data_paging =$this->gore_model->getNoticias($tabla);
		
		if($pclave=strip_tags($this->input->post('cadena'))){

			$data_paging =$this->gore_model->buscadorNoticias("","","","",$pclave,"noticia");

		}


		//var_dump($data_paging);
		//exit;

		$config['base_url']   = site_url('home/noticias');
	    $config['total_rows'] = count($data_paging);
	    $config['per_page']   = 5;

	    $data['user'] = array();
	    $data['user']['meses']=$this->gore_model->getMeses();
	    $data['user']['fuentes']=$this->gore_model->getFuentes();

	    for ($i=$start; $i<$start+$config['per_page']; $i++) {
	      if (isset($data_paging[$i])) {

	        $data['user']['name'][] = $data_paging[$i];
	      }
	    }

	    $this->pagination->initialize($config);
	    $data['pagination'] = $this->pagination->create_links();

	    if ($this->input->post('ajax')) {

		$this->layout->setLayout('layout_ajax');
	      $this->layout->view('home/ajax_noticias',$data);

	    } else {
	      $this->layout->view('home/noticias',$data);

	    }

	}



	public function buscadorNoticias($start = 0){

		$tabla=$this->input->post('tabla');
		switch($tabla){
			
			case 0:
				$tabla="noticia";
			break;
			case 1:
				$tabla="noticia";
			break;
			case 2:
				$tabla="noticia_breves";
			break;
		}


		$year=$this->input->post('year');
		$mes=$this->input->post('mes');
		$fuente=$this->input->post('fuente');
		$fecha=$this->input->post('fecha');
		$pclave=$this->input->post('cadena');

		$this->load->library('pagination');

		$data_paging =$this->gore_model->buscadorNoticias($year,$mes,$fuente,$fecha,$pclave,$tabla);

		$config['base_url']   = site_url('home/noticias');
	    $config['total_rows'] = count($data_paging);
	    $config['per_page']   = 5;

	    $data['user'] = array();
	    
	    $data['tabla']=$tabla;

	    for ($i=$start; $i<$start+$config['per_page']; $i++) {
	      if (isset($data_paging[$i])) {

	        $data['user']['name'][] = $data_paging[$i];
	      }
	    }

	    $this->pagination->initialize($config);
	    $data['pagination'] = $this->pagination->create_links();

	

	      if ($this->input->post('ajax')) {
	       $this->layout->setLayout('layout_ajax');
	    $this->layout->view('home/ajax_noticias',$data);
	    } else {
	    	 $this->layout->setLayout('layout_ajax');
	      $this->layout->view('home/ajax_noticias',$data);
	    }

		
	}




	public function core(){

		$this->layout->view('home/core');
	}

	public function contacto(){

		$this->layout->view('home/contacto');

	}

	public function consejoRegional(){

		
		$id=intval($this->uri->segment(2));

		switch ($id) {
					
				case 1:
						$data['id']=1;
						break;
				case 2:
						$data['id']=2;
						break;
								
				default:
						$data['id']=1;
						break;
		}


		$this->layout->view('home/consejo-regional',$data);

	}

	public function enlacesDeInteres(){

		$this->layout->view('home/enlaces-de-interes');
	}

	public function gabineteRegional(){

		$id=intval($this->uri->segment(2));
		$data['id']=$id;
		$this->layout->view('home/gabinete-regional',$data);
	}

	public function gobernadores(){


		$id=intval($this->uri->segment(2));
		$acronimo="";

		switch ($id) {
					
				case 2:
						$data['id']=2;
						$acronimo="ELQUI"; 
						break;
				case 3:
						$data['id']=3;
						$acronimo="LIMARI"; 
						break;
				case 4:
						$data['id']=4;
						$acronimo="CHOAPA"; 
						break;
								
				default:
						$id=1;
						$data['id']=1;
						break;
		}

		if($data['id'] == 1){


			$this->layout->view('home/gobernadores',$data);
		}
		else{
			$data['gob']=$this->gore_model->getGobernadorByAcronimo($acronimo);
			$data['acronimo']=$acronimo;
			$this->layout->view('home/gobernadores',$data);
		}	
		

		
	}

	public function gobiernoRegional(){


		$id=intval($this->uri->segment(2));

		switch ($id) {
			case 1:
				$data['id']=1;
				break;
			case 2:
				$data['id']=2;
				break;
			case 3:
				$data['id']=3;
				break;
			case 4:
				$data['id']=4;
				break;
			case 5:
				$data['id']=5;
				break;
			case 6:
				$data['id']=6;
				break;
			case 7:
				$data['id']=7;
				break;
			case 8:
				$data['id']=8;
				break;
			case 9:
				$data['id']=9;
				break;
						
			default:
				$data['id']=1;
				break;
		}
		$this->layout->view('home/gobierno-regional',$data);
	}

	public function serviciosPublicos(){

		$this->layout->view('home/servicios-publicos');
	}

	public function parlamentarios(){

		$id=intval($this->uri->segment(2));

		switch ($id) {
			case 1:
				$data['id']=1;
				break;
			case 2:
				$data['id']=2;
				break;
			default:
				$data['id']=1;
				break;
		}
		$this->layout->view('home/parlamentarios',$data);
	}

	public function municipalidades(){

		$id=4;

		$data['id']=intval($this->uri->segment(2));

		switch ($data['id']) {
			case 1:
				$data['id']=1;
				break;
			case 2:
				$data['id']=2;
				break;
			case 3:
				$data['id']=3;
				break;
					
			case 4:
				$data['id']=4;
				break;
			case 5:
				$data['id']=5;
				break;
			case 6:
				$data['id']=6;
				break;
			case 7:
				$data['id']=7;
				break;
			case 8:
				$data['id']=8;
				break;
			default:
				$data['id']=1;
				break;					
		}

		$data['comunas']=$this->gore_model->getComunas($id);
		$data['alcaldes']=$this->gore_model->getAlcaldes($id);
		$data['consejales']=$this->gore_model->getConsejales($id);
	
		$data['serena']=$this->gore_model->getComunaByName('La Serena');
		$data['coquimbo']=$this->gore_model->getComunaByName('Coquimbo');
		$data['higuera']=$this->gore_model->getComunaByName('La Higuera');
		$data['vicuña']=$this->gore_model->getComunaByName('Vicuña');
		$data['anacollo']=$this->gore_model->getComunaByName('Andacollo');
		$data['ovalle']=$this->gore_model->getComunaByName('Ovalle');
		$data['monre']=$this->gore_model->getComunaByName('Monte Patria');
		$data['hurtado']=$this->gore_model->getComunaByName('Río Hurtado');
		$data['punitaqui']=$this->gore_model->getComunaByName('Punitaqui');
		$data['combarbala']=$this->gore_model->getComunaByName('Combarbalá');
		$data['illapel']=$this->gore_model->getComunaByName('Illapel');
		$data['vilos']=$this->gore_model->getComunaByName('Los Vilos');
		$data['salamanca']=$this->gore_model->getComunaByName('Salamanca');
		$data['canela']=$this->gore_model->getComunaByName('Canela');
		$data['paihuano']=$this->gore_model->getComunaByName('Paihuano');

		
		$this->layout->view('home/municipalidades',$data);
	}

	public function ajax_caractetisticas_region(){

		$data['id']=$this->input->post('id');
		$this->layout->view('home/ajax_caractetisticas_region',$data);


	}

	public function ajax_municipalidades(){

		$this->layout->setLayout('layout_ajax');
		$id=$this->input->post('id');
		if(!$id){

			redirect('');
		}


		$data['comunas']=$this->gore_model->getComunas($id);
		$data['alcaldes']=$this->gore_model->getAlcaldes($id);
		$data['consejales']=$this->gore_model->getConsejales($id);
		$this->layout->view('home/ajax_municipalidades',$data);

	}

	public function seremis(){

		$data['seremis']=$this->gore_model->getSeremis();
		$this->layout->view('home/seremis',$data);
	}

	public function seremisVista(){

		$id=intval($this->uri->segment(2));
		$ida='';

	
		if($this->uri->segment(3)==0){

				$ida=$id;
		}
		else{
				$ida=$this->uri->segment(3);

		}
		
		$data['seremis']=$this->gore_model->getSeremisById($id);
		$data['enlaces']=$this->gore_model->getSeremisEnlaces($ida);
		$data['id']=$ida;
		$this->layout->view('home/seremis-vista',$data);


	}

	public function descargas(){

		$this->layout->view('home/descargas');
	}

	public function concursos(){

		$this->layout->view('home/concursos');
	}

	public function fondosConcursables(){

		$this->layout->view('home/fondos-concursables');

	}

	public function descargaPlugins(){

		$this->layout->view('home/descarga-plugins');

	}


	public function informeEmpleo(){

		$this->layout->view('home/informe-de-empleo');

	}

	public function  mesaRural(){

		$this->layout->view('home/mesa-rural-campesino');
	}

	public function  mesaSnit(){

		$this->layout->view('home/mesa-snit');
	}




	public function fondoInnovacion(){

		$this->layout->view('home/concurso-ficr');
	}

	public function identidadRegional(){

		$this->layout->view('home/identidad-regional');
	}

	public function biblioteca(){


		$this->layout->view('home/biblioteca');
	}


	public function bancoProyectos(){

		$this->load->model('banco_model');

		
		$fotos=$this->banco_model->getFotosBancoPrincipal(1);
		
		$data['fotos']=array();
		$i=0;
		foreach($fotos as $f){

			$archivos=$this->banco_model->getNombreArchivo($f['id']);
			
			foreach($archivos as $a){

				$data['fotos'][$i]="imagenes/proyectos/pro_".$f['id']."/".$a['nom_archivo'];
				$i++;
			}	 	
		 }



		$data['provincias']=$this->banco_model->getProvincias();
		$i=0;
		$data['comuna']=$this->banco_model->getComunas();

		foreach($data['provincias'] as $p){

			$data['comunas'][$p['id_provincia']]=$this->banco_model->getComunasProyectos($p['id_provincia']);
			
		}
		
		$this->layout->view('home/banco-de-proyectos',$data);
	}


	public function fotosAjax(){


		$this->load->model('banco_model');
		$id=($this->input->post('id'))?$this->input->post('id'):1;
		$fotos=$this->banco_model->getFotosBancoPrincipal($id);
		
		$data['fotos']=array();
		$i=0;
		foreach($fotos as $f){

			$archivos=$this->banco_model->getNombreArchivo($f['id']);
			
			foreach($archivos as $a){

				$data['fotos'][$i]="imagenes/proyectos/pro_".$f['id']."/".$a['nom_archivo'];
				$i++;
			}	 	
		 }
		 $this->layout->setLayout('layout_ajax');
		 $this->layout->view('home/fotos-de-proyectos',$data);
	}





	public function bancoProyectosVista(){

			# 59 y 35
			$this->load->model('banco_model');
			$id=intval($this->uri->segment(2));
			
			
			$data['proyectos']=$this->banco_model->getProyectoByID($id);

			foreach($data['proyectos'] as $p){

				$data['provincia']=$this->banco_model->getInfoProyectoProvincia($p['id_Provincia']);
				$data['comuna']=$this->banco_model->getInfoProyectoComuna($p['id_comuna']);
				$data['financiamiento']=$this->banco_model->getInfoProyectoFinanciaminto($p['id_Provincia']);
				$data['sector']=$this->banco_model->getInfoProyectoSector($p['id_Provincia']);	
				$data['etapa']=$this->banco_model->getInfoProyectoEtapa($p['id_etapa']);
				$data['listado']=$this->banco_model->getListadodeProyectos($p['id_comuna']);
				$data['galeria']=$this->banco_model->getGaleriaProyectoById($p['id']);
				$data['video']=$this->banco_model->getInfoProyectoVideo($p['id']);
				$data['documentos']=$this->banco_model->getInfoProyectoDocumentos($p['id']);
			}
			

			$this->layout->view('home/banco-vista',$data);
	}
		
	public function buscadorBanco($start = 0){

		//echo "ewwwewe";
		//exit;
		$this->load->model('banco_model');
		$frm_palabra=$this->input->post('palabra');
		$frm_fecha=$this->input->post('fecha');
		$frm_comuna=$this->input->post('comuna');
		$frm_codigo=$this->input->post('codigo');
		


		$this->load->library('pagination');

		$data_paging =$this->banco_model->buscadorBanco($frm_palabra,$frm_fecha,$frm_comuna,$frm_codigo);

		$data['cantidad'] =count($data_paging );

		$config['base_url']   = site_url('home/buscadorBanco');
	    $config['total_rows'] = count($data_paging);
	    $config['per_page']   = 5;

	    $data['user'] = array();
	    

	    for ($i=$start; $i<$start+$config['per_page']; $i++) {
	      if (isset($data_paging[$i])) {

	        $data['user']['name'][] = $data_paging[$i];
	      }
	    }

	    $this->pagination->initialize($config);
	    $data['pagination'] = $this->pagination->create_links();

	

	    if ($this->input->post('ajax')) {
	       $this->layout->setLayout('layout_ajax');
	    $this->layout->view('home/ajax_buscador_proyectos',$data);
	    } else {
	    	 $this->layout->setLayout('layout_ajax');
	      $this->layout->view('home/ajax_buscador_proyectos',$data);
	    }

		
	}

	public function agenda(){

		
		$data['f']=(intval($this->uri->segment(2)))?$this->uri->segment(2):time();
		$datevalue=strftime("%Y-%m-%d", $data['f']);
		$data['titulares']=$this->gore_model->getTitularesAgenda($datevalue);
		$mes=strftime("%m", $data['f']);
		$anho=strftime("%Y", $data['f']);
		$dia=strftime("%d", $data['f']);
		$fecha_sql=$anho."-".$mes."-".$dia;
		$this->load->model('agendas_model');
		$data['actividades']=$this->agendas_model->getActividadesAgenda($fecha_sql);


		$this->layout->view('home/agenda',$data);
	}

	public function senalOnline(){

		$this->layout->view('home/senal-online');
	}

	public function intendente(){


		$id=intval($this->uri->segment(2));

		switch ($id) {
			case 1:
				$data['id']=1;
				break;
			case 2:
				$data['id']=2;
				break;
			case 3:
				$data['id']=3;
				break;
					
			default:
				$data['id']=3;
				break;
		}

		$this->layout->view('home/intendente',$data);
	}

	public function informePresupuesto(){

		$this->layout->view('home/informe-presupuesto');
	}



	public function desentralizacion(){

		$this->layout->view('home/desentralizacion');
	}

	public function sendEmail(){

	
		$this->load->library('email');
    	$this->load->library('form_validation');
    	
    	$data['nombre']=$this->input->post('nombre');
    	$data['apellidos']=$this->input->post('apellidos');
    	$data['telefono']=$this->input->post('telefono');
    	$data['proposito']=$this->input->post('proposito');
    	$data['email']=$this->input->post('email');
    	$data['consulta']=$this->input->post('consulta');
    	
    	$this->form_validation->set_rules('nombre','Nombre de Usuario','trim|required|xss-clean|alpha_numeric');
    	$this->form_validation->set_rules('apellidos','Apellidos','trim|required|xss-clean|alpha_numeric');
    	$this->form_validation->set_rules('telefono','Telefono','trim|xss-clean|numeric');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	$this->form_validation->set_rules('proposito','Proposito','trim|required|xss-clean|alpha_numeric');
		$this->form_validation->set_rules('consulta','Consulta','required|xss-clean');
	
    	if ($this->form_validation->run()){
	      
    		$mensaje='<p>Nombre : '.$data['nombre'].' '.$data['apellidos'].'</p>';
	    	$mensaje.='<p>Telefono : '.$data['telefono'].'</p>';
	    	$mensaje.='<p>Email : '.$data['email'].'</p>';
	    	$mensaje.='<p>Proposito : '.$data['proposito'].'</p>';
	    	$mensaje.='<p>Consulta : '.$data['consulta'].'</p>';

	    	$config = array();
	        $config['useragent']           = "CodeIgniter";
	        $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
	        $config['protocol']            = "smtp";
	        $config['smtp_host']           = "localhost";
	        $config['smtp_port']           = "25";
	        $config['mailtype'] = 'html';
	        $config['charset']  = 'utf-8';
	        $config['newline']  = "\r\n";
	        $config['wordwrap'] = TRUE;

	        $this->email->initialize($config);
	    	$this->email->from($data['email'],$data['nombre']);
	    	$list = array( 'ricardo@guinet.cl');
	    	$this->email->to($list);
	    	$this->email->subject('Message from out form');
	    	$this->email->message($mensaje);

	    	//$this->email->send();
	    	//echo $this->email->print_debugger();
  			//echo "aqui estoy";
			//exit;
			if ($this->email->send()) {
			        echo 'Su mensaje ha sido enviado satisfactoriamente;<br />
			  				 Usted recibir&aacute; un correo de confirmaci&oacute;n.';
			} else {
			        echo 'Lo sentimos, pero no se ha podido enviar el email.';
			}


	      }
	    else{ 
	    		 echo 'Lo sentimos, pero nos e ha podido en viar el email.';
	      }

		exit;
	}

	public function normas(){

		$this->layout->view('home/normas-graficas');
	}

	public function mapa(){

		$this->layout->view('home/mapa-sitio');
	}

	public function cohecho(){

		$this->layout->view('home/cohecho');
	}


	public function  fondosCultura(){

		$this->layout->view('home/fondos-cultura');
	}


	public function fondosDeportes(){

		$this->layout->view('home/fondos-deportes');
	}


	public function fondosOrquesta(){

		$this->layout->view('home/fondos-orquesta');
	}


	public function fondoSeguridad(){

		$this->layout->view('home/fondos-seguridad');
	}


	public function fondoTesis(){

		$this->layout->view('home/fondos-tesis');
	}


	public function feriaLibros(){

		$this->layout->view('home/feria-libros');
	}

	public function fondosEditoriales(){

		$this->layout->view('home/fondos-editoriales');
	}

	public function renueva(){

		$this->layout->view('home/renueva');
	}


	public function fic(){

		$this->layout->view('home/fic-r');
	}

	public function feria(){

		$this->layout->view('home/feria');
	}

    public function politica(){

		$this->layout->view('home/politica-privacidad');
	}
}