<<<<<<< HEAD
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- Add jQuery library -->
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.2"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>





<title>BANCO DE PROYECTOS</title><div id="noticias">
  <div id="categoria"> <a href="http://www.gorecoquimbo.gob.cl/index.php">P&Aacute;gina Principal &gt;</a> <a href="http://www.gorecoquimbo.gob.cl/principal_banco_proyecto.php">b&Uacute;squeda de PROYECTOS REGIONALES&nbsp;</a>| MUESTRA DE PROYECTOS POR COMUNA </div>
          <h1> MUESTRA DE PROYECTOS POR COMUNA</h1>
          <hr />
		  <br />
          <div id="contenido-biblioteca">
		    <h2>poner ac&Aacute; TITULO COMUNA  </h2>
=======
<div id="noticias">
  <div id="categoria"> <a href="http://www.gorecoquimbo.gob.cl/index.php">P&Aacute;gina Principal &gt;</a> <a href="http://www.gorecoquimbo.gob.cl/principal_banco_proyecto.php">b&Uacute;squeda de PROYECTOS REGIONALES&nbsp;</a>| MUESTRA DE PROYECTOS POR COMUNA </div>
          <h1> MUESTRA DE PROYECTOS POR COMUNA</h1>
          <hr />jkdalsjlkdsajlkdasljkasdjkldsajkasdjkdsajkl
		  <br />
          <div id="contenido-biblioteca">
		    <h2>LA SERENA  </h2>
>>>>>>> a803fcd8d17807cb43ca5787c54c86082ee7e5cb
		    <p>Ac&aacute; va el texto
</p>
		    <div id="icono-galeria">
		      <h4>GALER&Iacute;A DE IM&Aacute;GENES</h4>
		    </div>
			<p><a class="fancybox" href="imagenes/galerias-noticias/1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/1_b.jpg" alt="" width="400" height="300" /></a>
          
<a class="fancybox" href="imagenes/galerias-noticias/2.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/2.jpg" alt="" width="100" height="100" /></a>
          
<a class="fancybox" href="imagenes/galerias-noticias/3.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/3.jpg" alt="" width="100" height="100" class="fancybox" /></a> </p>

<div id="fix" style="clear:both"></div>

            <h3>BUSCADOR DE PROYECTOS</h3>
            <form method="post" action="#" id="form-busqueda-noticias">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="33%">COMUNA :</td>
      <td width="67%">
        <select name="mes" id="mes">
			<option value="0">...</option>
				<option value="hola">...</option>
		</select>     </td>
    </tr>
    
    
    <tr>
      <td>FECHA</td>
      <td>
      	<input name="frm_fecha" type="text"  class="textoselectnav" id="frm_fecha" title=" Introduza una fecha a buscar entre las Noticias. "  size="14" maxlength="10" />      </td>
    </tr>
    <tr>
      <td>PALABRA CLAVE</td>
      <td><input name="cadena" type="text"  class="textoselectnav" id="cadena" size="25" maxlength="255" title=" Introduzca Cadena de Texto a Buscar de entre los T&iacute;tulos de Noticias Existentes. " /></td>
    </tr>
    <tr>
      <td>C&Oacute;DIGO BIP </td>
      <td><input name="cadena" type="text"  class="textoselectnav" id="cadena" size="25" maxlength="255" title=" Introduzca Cadena de Texto a Buscar de entre los T&iacute;tulos de Noticias Existentes. " /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" id="btnBuscar" class="btn-vermas" value="Buscar" /></td>
    </tr>
  </table>

 </form>
 
<div id="resultado-proyectos">
  <h3>Resultado de la B&Uacute;squeda </h3>
  <p>N&deg; Registro(s) Encontrado(s)</p>
  <div id="busqueda-noticias"> <a href="http://www.dop.cl/" target="_blank"> Programa Infraestructura Rural </a></div>
  <div id="busqueda-noticias"> <a href="http://www.dop.cl/" target="_blank"> Programa Infraestructura Rural </a></div>
  <div id="busqueda-noticias"> <a href="http://www.dop.cl/" target="_blank"> Programa Infraestructura Rural </a></div>
  <div id="busqueda-noticias"> <a href="http://www.dop.cl/" target="_blank"> Programa Infraestructura Rural </a></div>
  <div id="busqueda-noticias"> <a href="http://www.dop.cl/" target="_blank"> Programa Infraestructura Rural </a></div>
  <div id="busqueda-noticias"> <a href="http://www.dop.cl/" target="_blank"> Programa Infraestructura Rural </a></div>
</div>

<div id="ajax_paging" ><?php echo $pagination; ?></div> 
<div id="fix" style="clear:both"></div>

<div id="mapa-google"><iframe width="465" height="390" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.cl/maps?source=embed&amp;ie=UTF8&amp;hl=es&amp;msa=0&amp;msid=110840075223060265076.00047a612cf5455ae1078&amp;ll=-29.900782,-71.255865&amp;spn=0.044569,0.077162&amp;t=h&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.cl/maps?source=embed&amp;ie=UTF8&amp;hl=es&amp;msa=0&amp;msid=110840075223060265076.00047a612cf5455ae1078&amp;ll=-29.900782,-71.255865&amp;spn=0.044569,0.077162&amp;t=h&amp;z=14" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small></div>
 
 </div>
		  <div id="menu-pmg">
<ul>
<li><a id="titulo">PROYECTOS REGIONALES </a></li>
<li><a href="#"> LA SERENA</a></li>
<li><a href="#"> COQUIMBO</a></li>
<li><a href="#"> VICU&Ntilde;A</a></li>
<li> <a href="http://www.gorecoquimbo.gob.cl/muestra_banco_proyecto.php?id_comuna=4">ANDACOLLO</a></li>
<li> <a href="http://www.gorecoquimbo.gob.cl/muestra_banco_proyecto.php?id_comuna=11">PAIHUANO</a> </li>
<li><a href="#"> LA HIGUERA</a></li>
<li><a href="#"> OVALLE</a></li>
<li><a href="#"> RIO HURTADO</a></li>
<li><a href="#"> MONTE PATRIA</a></li>
<li><a href="#"D> COMBARBALA</a></li>
<li><a href="#"> PUNITAQUI</a></li>
<li><a href="#"> ILLAPEL</a></li>
<li> <a href="http://www.gorecoquimbo.gob.cl/muestra_banco_proyecto.php?id_comuna=13">SALAMANCA</a></li>
<li><a href="#"D> LOS VILOS</a></li>
<li> <a href="http://www.gorecoquimbo.gob.cl/muestra_banco_proyecto.php?id_comuna=15">CANELA</a></li>

<li></li>
</ul>
</div>
		  
<div id="fix" style="clear:both"></div>

		  
		  </div>
