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



<link href="css/style.css" rel="stylesheet" type="text/css">

<title>NOTICIAS |GORE COQUIMBO</title>
	<div id="noticias">
<div id="iconos-noticia">
<div class="iconos"><a href="javascript:imprSelec('seleccion')"><img src="imagenes/icono_imprimir.jpg" title="Imprimir Noticia" alt="Imprimir Noticia" width="18" height="15" border="0" /></a></div>
<div class="iconos"><a href="javascript:bloque('enviar_mail','Mostrar')"><img src="imagenes/icono_enviar.jpg"  title="Recomendar Noticia" alt="Recomendar Noticia" width="18" height="15" border="0" /></a></div>
<div class="iconos"><a href="#" onclick="javascript:dzIncreaseFontSize('cuerpo'); return false;"><img src="imagenes/icono_aumentar.jpg"  title="Aumentar Letra"alt="Aumentar Letra" width="18" height="14" border="0" /></a></div>
<div class="iconos"><a href="#" onclick="javascript:dzDecreaseFontSize('cuerpo'); return false;"><img src="imagenes/icono_disminuir.jpg"  title="Disminuir Letras" alt="Disminuir Letras" width="18" height="15" border="0" /></a></div>
<div class="iconos"><!-- AddThis Button BEGIN --><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4abd989b0c8f3c34"></script><!-- AddThis Button END -->
<a href="../rss/rss.xml" target="_blank"><img src="imagenes/icono_rss.jpg"  title="RSS" width="13" height="13" border="0" /></a></div>
<div class="iconos"><a href="http://www.addthis.com/bookmark.php" class="addthis_button"><img src="http://s7.addthis.com/static/btn/v2/lg-share-es.gif" height="16" border="0" alt="Share" /></a></div>


  </div>
<div id="categoria">FUENTE</div>
          <h2>Titulo de la  noticia</h2>
        <hr />
          <div id="fecha-noticia">3 de Septiembre 2012 | Santiago</div>
        <p><img  class="foto-noticia-desarrollo"src="imagenes/noticia1-vista.jpg"  alt=" Orientaci&oacute;n estrategia comercial para cada compa&ntilde;&iacute;a" width="700" height="350"/></p>
        <p>Praesent sagittis nibh a purus dictum elementum. Morbi eget tortor ac leo faucibus dictum. Nam accumsan nisl ut sapien vulputate vitae varius turpis condimentum. Etiam aliquam sollicitudin tellus, vitae iaculis arcu posuere at. Cras nec justo non velit scelerisque faucibus. Maecenas tempor, ante sed rhoncus hendrerit, dui est malesuada massa, ut tincidunt turpis urna non nibh. </p>
        <p>Sed turpis sapien, posuere vitae varius ac, pharetra facilisis odio. Vivamus pellentesque quam at ligula dapibus a lacinia sem euismod. Nunc id dolor tortor. Suspendisse at lorem eros. Duis venenatis scelerisque diam, aliquam iaculis nisi blandit sed. Maecenas arcu neque, iaculis nec mattis ut, adipiscing eget orci. In odio mi, euismod ac tristique a, gravida in est. Morbi ut ipsum justo, sed dictum diam. Aenean mauris elit, molestie vitae hendrerit ac, iaculis a neque. Aenean ligula sapien, dapibus ut iaculis ac, molestie ut tortor. Sed dignissim sapien et eros suscipit id bibendum nunc mollis. </p>
        <p>Duis non cursus elit. Donec<a href="#"> bibendum adipiscing euismod</a>. Sed eget velit lectus, sed fringilla arcu. Quisque mauris ante, vehicula iaculis euismod id, dapibus elementum nibh. Mauris posuere egestas suscipit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ultrices semper enim, ut tincidunt augue tincidunt in. Integer sodales, justo a elementum faucibus, ligula est ornare est, sed varius est arcu sed metus. Nullam gravida cursus velit, vitae volutpat nisl aliquet a. Donec ultricies porta sodales. Vivamus suscipit tincidunt enim, in faucibus lorem imperdiet eget.</p>
		
<div id="icono-galeria"><h4>GALER&Iacute;A DE IM&Aacute;GENES DE LA NOTICIA </h4></div>
       
  <p><a class="fancybox" href="imagenes/galerias-noticias/1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/1_b.jpg" alt="" width="400" height="300" /></a>
          
<a class="fancybox" href="imagenes/galerias-noticias/2.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/2.jpg" alt="" width="100" height="100" /></a>
          
<a class="fancybox" href="imagenes/galerias-noticias/3.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="imagenes/galerias-noticias/3.jpg" alt="" width="100" height="100" class="fancybox" /></a> </p>
<div id="icono-videos">
  <h4>GALER&Iacute;A DE videos</h4>
</div>
<p>poner video aca</p>
<h3>Comentarios</h3>
<div id="comentarios">
  <h5>Escribir comentarios</h5>
  <p>Si&eacute;ntase libre de opinar, para eso existe este espacio. Est&aacute; bien discrepar de las opiniones de otros, pero por favor enfrente ideas y no personas. Los ataques personales no tienen cabida aqu&iacute;. Que sus comentarios no excedan las 350 palabras; de esta forma m&aacute;s gente puede participar. Para mayor informaci&oacute;n vea nuestros&nbsp;<strong><a href="http://www.gorecoquimbo.gob.cl/gore_noticias_vista.php?id_not=3822&amp;noticia=1#" onclick="window.open('terminosycondiciones.html','','width=450,height=480,scrollbars=no');">T&eacute;rminos de Uso</a></strong><a href="http://www.gorecoquimbo.gob.cl/gore_noticias_vista.php?id_not=3822&amp;noticia=1#" onclick="window.open('terminosycondiciones.html','','width=450,height=480,scrollbars=no');">.</a>
  </p>
  <hr />
  <br />
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" bgcolor="#F2F2F2">
    <tbody>
      <tr>
        <td width="13%"><strong>Nombre</strong></td>
        <td><input name="frm_nombre_comentario" type="text" id="frm_nombre_comentario" size="45" /></td>
        </tr>
      <tr>
        <td><label><strong>Email</strong></label>          <label></label></td>
        <td><input name="frm_email_comentario" onblur="valida_mail(document.getElementById('frm_email_comentario').name,document.getElementById('frm_email_comentario').value)" type="text" id="frm_email_comentario" size="45" /></td>
        </tr>
      
      <tr>
        <td valign="top"><strong>Comentario</strong></td>
        <td><textarea name="frm_descripcion_comentario" cols="60" rows="5" id="frm_descripcion_comentario"></textarea></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="middle"><input name="frm_politica" type="checkbox" id="frm_politica" value="1" />
&nbsp;He le&iacute;do y acepto los Terminos de uso.</td>
        </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td><input name="Submit3" type="button" class="btn-enviar" onclick="javascript:validar_comentario(this.form)" value="Enviar Comentarios" /></td>
      </tr>
    </tbody>
  </table>
</div>


<div id="comentario-detalle">
<div id="nombre-comentario">Nombre: <strong>Poner ac&aacute; el nombre</strong> </div>
<div id="fecha-comentario">Fecha: <strong>Poner ac&aacute; el fecha </strong></div>
<div id="mensaje-comentario"> 
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
  <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. </p>
</div>
</div>

</div>

