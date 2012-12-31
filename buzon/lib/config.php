
	      <?php  
			if (defined(__config__ ) == false )
			   define(__config__ , "__config__");
			else
			return;
		 
		   /***********************************************************************************************
		   * Nombre Archivo	 : config.php
		   * Descripción	 : Archivo que contiene la definicion de los colores que tendra en la lista los
		   *				   estados de las transacciones
		   *             
		   * F. Creacion	 : 2 de Noviembre de 2005
		   * Autor 			 : 
		   ***********************************************************************************************/
		   
		  /*seccion de definicion del titulo del sitio*/ 
		  define("_titulo_","");
		  define("_cabecera_","Buzon Ciudadano"); 
		  define("_imagen_","imagenes/titulo.gif");
		  
		  /*seccion de definicion del menu sel sitio*/
		  define("_bgMenu_","#D6E7F7");
		  define("_bgMenuFont_","#333333");
		  define("_bgMenuBorder_","#94bede");
		  
		  define("_bgMenuSel_","#2171a5");
		  define("_bgMenuFontSel_","#FFFFFF"); 
		  define("_bgMenuBorderSel_","#94bede");        
		  
		  /*seccion de definicion de columnas de tablas*/
		  define("_colorSelect_","#94BEDE");
		  
		  /*seccion de definicion de donde estara hospedado el sitio en Internet*/
		  define("_direccionSitio_","http://www.gorecoquimbo.gob.cl/buzon");
		  
		  /*seccion de definicion de nombre de administracion y correo de administracion*/
		  define("_administrador_","Informatica GORE");
		  define("_correoAdministrador_","informatica@gorecoquimbo.cl");
		  define("_nombreUsuario_","manager");
  		  define("_contrasenaAdministrador_","");
		  
		  /*setea si llegaran correos a las instituciones */
		  /*1 se enviaran correos a las instituciones*/
		  /*0 no se enviaran correos a las instituciones*/
		  define("_enviarCorreoInstitucion_","1");
		  
		  /*define la direccion de las carpetas del sitio*/
		  define("_rutaServidor_","../../imagenes/imagenes_noticia/"); 
		 
		  /*define cuantos seran los elementos del menu de la administracion*/
		  define("_numeroItems_",3); 
		
		  /*define cuantos seran las noticias que se mostraran en la portada*/
		  define("_numeroNoticias_",2); 
		  
		  /*define cuantos dias tendran las intituciones para responder una opinion*/
		  define("_plazo_",4320);

		 ?>
