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



<title>VISTA FICHA TECNICA PROYECTO</title>
<div id="noticias">
  <div id="categoria"> <a href="http://www.gorecoquimbo.gob.cl/principal_banco_proyecto.php">PROYECTOS REGIONALES</a>&nbsp;&gt;&gt; VISTA FICHA TECNICA PROYECTO </div>
  <div id="categoria"> ELQUI &gt;&gt; VICU&Ntilde;A &gt;&gt; EDUCACI&Oacute;N Y CULTURA &gt;&gt; FNDR LIBRE DISPOSICI&Oacute;N </div>
          <h1> MUESTRA NACIONAL DE CAMPEONES DE CUECA </h1>
          <hr />
		  <h2>
		  <br />
		  </h2>
		  <div id="contenido-biblioteca">
		    <h2>descripci&Oacute;n:</h2>
		    <p>Poner ac&aacute; el texto </p>
		    <h3>Antecendentes t&eacute;cnicos </h3>
		    <div id="antecedentes-tecnicos">
            <div id="numero-sesion">NOMBRE : <strong>Primer Encuentro Rotativo De Bailes Religiosos De La Comuna De Canela.</strong> </div>
			<div id="numero-acuerdo">PRESUPUESTO :  <strong>$3.500</strong></div>
			<div id="tipo-acuerdo"> SECTOR :  <strong>Educaci&oacute;n Y Cultura</strong></div>
			<div id="fecha-acuerdo">FINANCIAMIENTO : <strong>fndr libre disposici&oacute;n</strong></div>
			<div id="descripcion-acuerdo">FECHA DE INICIO :<strong> 01/07/2009</strong></div>
			<div id="descripcion-acuerdo">CODIGO BIP : <strong>transferencia cultura</strong></div>
			<div id="descripcion-acuerdo">ETAPA :   <strong>Ejecuci&oacute;n</strong></div>
			<div id="descripcion-acuerdo">BENEFICIARIOS :   Hombres:<strong> 0 | </strong>Mujeres:<strong> 0 | Total: 0 </strong></div>
			</div>
			<div id="mas-info">
			  <p>Para mayor Informaci&oacute;n contactarse con Unidad T&eacute;cnica :<br />
			    <a href="mailto:unidadtecnica@gorecoquimbo.cl">unidadtecnica@gorecoquimbo.cl</a></p>
			</div>
			
			<div id="icono-galeria">
		      <h4>GALER&Iacute;A DE IM&Aacute;GENES</h4>
		    </div>
<p><a class="fancybox" href="imagenes/galerias-noticias/1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/1_b.jpg" alt="" width="400" height="300" /></a>
          
<a class="fancybox" href="imagenes/galerias-noticias/2.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/2.jpg" alt="" width="100" height="100" /></a>
          
<a class="fancybox" href="imagenes/galerias-noticias/3.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/3.jpg" alt="" width="100" height="100" class="fancybox" /></a> </p>
<div id="fix" style="clear:both"></div>
	

<div id="ver-video"><a class="video-interne" href="#">VER VIDEO </a></div>

<h3><br />
  documentos: </h3>
<div id="descarga-pdf"><a href="http://www.corecoquimbo.cl/fondos/FNDR_2010.pdf" target="_blank">T&Iacute;TULO DE DESCARGA DE PDF </a> |   Descripci&oacute;n</div>
		    <div id="descarga-doc"><a href="http://www.corecoquimbo.cl/fondos/FNDR_2010.pdf" target="_blank">T&Iacute;TULO DE DESCARGA TIPO WORD </a></div>
			<div id="descarga-excel"><a href="http://www.corecoquimbo.cl/fondos/FNDR_2010.pdf" target="_blank">T&Iacute;TULO DE DESCARGA TIPO EXCEL </a></div>
			<div id="descarga-imagen"><a href="http://www.corecoquimbo.cl/fondos/FNDR_2010.pdf" target="_blank">T&Iacute;TULO DE DESCARGA TIPO IMAGEN </a></div>		

</div>
		  <div id="menu-pmg">
<ul>
<li><a id="titulo">ENLACES</a></li>
<li><a href="#">Ambiente</a></li>
<li><a href="#">Cultura </a></li>
<li><a href="#">Discapacidad</a></li>
<li><a href="#">Documentos generales </a></li>
<li><a href="#" >Docs. Gobierno Regional  </a></li>
<li><a href="#">Documentos Sernam </a></li>
<li><a href="#">Econom&iacute;a y Empleo </a></li>
<li><a href="#">Estad&iacute;sticas</a></li>
<li><a href="#">Etnias  </a></li>
<li><a href="#"D>Normativa y leyes </a></li>
<li><a href="#">Municipal</a></li>
<li><a href="#">Planificaci&oacute;n</a></li>
<li><a href="#">Salud y Psicolog&iacute;a   </a></li>
<li><a href="#"D>Seminarios Tem&aacute;ticos </a></li>
<li></li>
</ul>
</div>
		  <h2>&nbsp;</h2>
		  <h4>&nbsp;</h4>
		  <p>&nbsp;</p>
		  <div id="fix" style="clear:both">
  </div>

		  
		  </div>
