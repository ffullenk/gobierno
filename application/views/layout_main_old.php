 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Gobierno Regional de Coquimbo</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>css/menus.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>css/galeria.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/mosaic.css" type="text/css" media="screen" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/example2.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/agenda.css" >

 
<script type="text/javascript">
document.write('<style type="text/css">.tabber{display:none;}<\/style>'); 
</script>


<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" >
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js" ></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.1/jquery-ui.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/mosaic.1.0.1.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tabber.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jMyCarousel.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>source/jquery.fancybox.js?v=2.1.1" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/swfobject.js" ></script>



<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.fancybox.css" media="screen" >

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/helpers/jquery.fancybox-buttons.css?v=1.0.4" >
<script type="text/javascript" src="<?php echo base_url(); ?>source/helpers/jquery.fancybox-buttons.js?v=1.0.4"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" >
<script type="text/javascript" src="<?php echo base_url(); ?>source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo base_url(); ?>source/helpers/jquery.fancybox-media.js?v=1.0.4"></script>


<script type="text/javascript">  
    
        jQuery(function($){
            $('.circle').mosaic({
              opacity   : 0.4     //Opacity for overlay (0-1)
            });
    });


    $(function() {

        $(".jMyCarousel").jMyCarousel({
            visible: '4',
            eltByElt: true,
            evtStart: 'mousedown',
            evtStop: 'mouseup'
        });

    });


    $(function() {
        $( "#fecha" ).datepicker({ dateFormat: 'yy-mm-dd' } );
    });

$(document).ready(function() { 
  
  $(".fancybox").fancybox({
      'showCloseButton' : true
      
  });


  
});
</script>


</head>
<body>
<div id="wrap">
  <div id="menu-links">
<a href="<?php echo BASE_URI?>">Inicio</a>
<a href="#">Mail Privado</a>
<a href="<?php echo BASE_URI?>politica-privacidad">Políticas de privacidad</a>
<a href="<?php echo BASE_URI?>mapa-sitio">Mapa del sitio</a>
  
  </div>
<div id="redes-sociales">
<a href="#"><img alt="icono TWITTER" title="Síguenos en TWITTER"src="<?php echo base_url(); ?>imagenes/twitter.png"></a>
<a href="#"><img alt="icono FACEBOOK" title="Búscanos en FACEBOOK" src="<?php echo base_url(); ?>imagenes/facebook.png"></a>
<a href="#"><img alt="icono RSS" title="Síguenos mediante RSS" src="<?php echo base_url(); ?>imagenes/rss.png"></a>
<a href="#"><img alt="icono Intendente" title="Tu Foto con el Intendente"src="<?php echo base_url(); ?>imagenes/flickr.png"></a>
  
  </div>
  <div id="header">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="42%" ><div id="logo"><a href="<?php echo BASE_URI?>"><img src="<?php echo base_url(); ?>imagenes/cabecera.jpg" alt="Consejo Regional de Coquimbo" width="460" height="131" title="Consejo Regional de Coquimbo" ></a></div></td>
    <td width="43%" ><div id="buscador">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="tabla-buscador">
        <tr>
          <td colspan="4"><img  alt="icono buscador"src="<?php echo base_url(); ?>imagenes/buscador.png" width="12" height="12"> Buscar en el sitio </td>
        </tr>
        
        <tr>
          <td colspan="4"><form name="form2" method="post" action="<?php echo BASE_URI?>noticias">
              
              <input type="text" name="cadena"/>
             
      
              <input name="Submit" type="submit" class="btn" value="Buscar"/>
            
          </form></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><div id="nav">
		<ul>
			<li><a href="<?php echo BASE_URI?>" class="span" >Inicio</a></li>
			<li><a href="<?php echo BASE_URI?>noticias">Noticias</a></li>
			<li><a href="<?php echo BASE_URI?>agenda/<?php echo time()?>">Agenda</a></li>
			<li><a href="<?php echo BASE_URI?>senal-online">Señal Online</a></li>
			<li><a href="<?php echo BASE_URI?>banco-de-proyectos">Banco de Proyectos</a></li>
			<li><a href="<?php echo BASE_URI?>contacto">Contacto</a></li>
		</ul>
	</div></td>
  </tr>
</table>

	  
  </div>
 <?php $this->load->view('sidebar_left'); ?>
<div id="main">
	<?php echo $content_for_layout; ?>
</div>
 <?php $this->load->view('sidebar_right'); ?>

 <div id="gobierno">
	
		<div id="footer"><p> Consejo Regional de Coquimbo. <br>
		  Dirección: Arturo Prat 350, primer piso, La Serena, República de Chile. <br>
		  Fonos: +56 51 207240 - 207263 Correo Electrónico: consejo@gorecoquimbo.cl <br> 
	     </p></div>
		<div id="w3c"><img alt="icono-w3c" title="W3C VALIDATOR"src="<?php echo base_url(); ?>imagenes/w3c.png"></div>
  </div>
</div>

</body></html>		