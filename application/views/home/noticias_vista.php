<SCRIPT language="JavaScript" type="text/JavaScript">
<!--
    var max_size = 150;
    var min_size = 75;
    var tamagnoLetras = 100;
    
    function dzIncreaseFontSize(idElemento) {
      if (document.all || document.getElementById) {  
        var elemento = document.all ? document.all[idElemento] : document.getElementById(idElemento);
        if (elemento) { 
          // el valor est&aacute; indicado en porcentaje:
          if(tamagnoLetras >= max_size){
            alert("No es posible seguir aumentando el tamaño ")
          }else{
            tamagnoLetras += 10;
            if (elemento.length) 
              for (i=0; i < elemento.length; i++) {
                elemento[i].style.fontSize = (tamagnoLetras+'%');
              }
            else
              elemento.style.fontSize = (tamagnoLetras+'%');        
          }
        }
      }
    }
    
    function dzDecreaseFontSize(idElemento) {
      if (document.all || document.getElementById) {  
        var elemento = document.all ? document.all[idElemento] : document.getElementById(idElemento);
        if (elemento) { 
          // el valor est&aacute; indicado en porcentaje:
          if(tamagnoLetras <= min_size){
            alert("No es posible seguir bajando el tamaño  ")
          }else{
            tamagnoLetras -= 10;
            if (elemento.length) 
              for (i=0; i < elemento.length; i++) {
                elemento[i].style.fontSize = (tamagnoLetras+'%');
              }
            else
              elemento.style.fontSize = (tamagnoLetras+'%');        
          }
        }
      }
    }
    
    function dzResetFontSize(idElemento) {
      var elemento = document.all[idElemento];
      elemento.body.style.fontSize = '100%';
      document.body.style.fontSize = '100%';
    } 
//-->
</SCRIPT>
<script language="JavaScript" type="text/javascript">

function imprSelec(nombre)

{
  var ficha = document.getElementById(nombre);
  var ventimp = window.open(' ', 'popimpr');
  ventimp.document.write( ficha.innerHTML );
  ventimp.document.close();
  ventimp.print( );
  ventimp.close();
}



function bloque(d1, d2) 
{
    if (d1 != '') DoDiv(d1);
    if (d2 != '') DoDiv(d2);
}

function DoDiv(id) 
{
    var item = null;
    if (document.getElementById) 
    {
    item = document.getElementById(id);
    } 
    else if (document.all)
    {
    item = document.all[id];
    } 
    else if (document.layers)
    {
    item = document.layers[id];
    }
    if (!item) 
    {
    }
    else if (item.style) 
    {
    if (item.style.display == "none")
    { 
        item.style.display = ""; 
    }
    else 
    {
        item.style.display = "none"; 
    }
    }
    else
    { 
        item.visibility = "show"; 
    }
}
</script>

<div class="contenido-izquierda">

  <div class="categoria"> <a href="<?php echo BASE_URI?>">P&aacute;gina Principal</a>&nbsp;&gt;&nbsp;<a href="<?php echo BASE_URI?>noticias">Noticias</a>&nbsp;&gt;&nbsp;Noticias Vista </div>

<br>
<div class="iconos-noticia">

<div class="iconos"><a href="javascript:imprSelec('seleccion')"><img src="<?php echo base_url(); ?>imagenes/icono_imprimir.jpg" title="Imprimir Noticia" alt="Imprimir Noticia" width="18" height="15" border="0" /></a>
</div>


<div class="iconos"><a href="#" onclick="javascript:dzIncreaseFontSize(&#39;cuerpo&#39;); return false;"><img src="<?php echo base_url(); ?>imagenes/icono_aumentar.jpg"  title="Aumentar Letra"alt="Aumentar Letra" width="18" height="14" border="0" /></a>
</div>


<div class="iconos"><a href="#" onclick="javascript:dzDecreaseFontSize(&#39;cuerpo&#39;); return false;"><img src="<?php echo base_url(); ?>imagenes/icono_disminuir.jpg"  title="Disminuir Letras" alt="Disminuir Letras" width="18" height="15" border="0" /></a>
</div>

<div class="iconos">
  <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4abd989b0c8f3c34"></script><!-- AddThis Button END -->
<a href="../rss/rss.xml" target="_blank"><img src="<?php echo base_url(); ?>imagenes/icono_rss.jpg"  title="RSS" width="13" height="13" border="0" /></a>
</div>

<div class="iconos">
  <a href="javascript:imprSelec('seleccion')"><img src="<?php echo base_url(); ?>imagenes/icono_imprimir.jpg" title="Imprimir Noticia" alt="Imprimir Noticia" width="18" height="15" border="0" />
  </a>
</div>


<div class="iconos">
  <a href="javascript:bloque('enviar_mail','Mostrar')">
    <img src="<?php echo base_url(); ?>imagenes/icono_enviar.jpg"  title="Recomendar Noticia" alt="Recomendar Noticia" width="18" height="15" border="0" />
  </a>
</div>


<div class="iconos">
  <a href="#" onclick="javascript:dzIncreaseFontSize('cuerpo'); return false;">
    <img src="<?php echo base_url(); ?>imagenes/icono_aumentar.jpg"  title="Aumentar Letra"alt="Aumentar Letra" width="18" height="14" border="0" /></a>
</div>

<div class="iconos">
  <a href="#" onclick="javascript:dzDecreaseFontSize('cuerpo'); return false;">
    <img src="<?php echo base_url(); ?>imagenes/icono_disminuir.jpg"  title="Disminuir Letras" alt="Disminuir Letras" width="18" height="15" border="0" /></a>
</div>

<div class="iconos"><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4abd989b0c8f3c34"></script><!-- AddThis Button END -->
<a href="../rss/rss.xml" target="_blank"><img src="<?php echo base_url(); ?>imagenes/icono_rss.jpg"  title="RSS" width="13" height="13" border="0" /></a>
</div>

<div class="iconos">
  <a href="http://www.addthis.com/bookmark.php" class="addthis_button">
    <img src="http://s7.addthis.com/static/btn/v2/lg-share-es.gif" height="16" border="0" alt="Share" /></a>
</div>


  </div>

<?php foreach($noticia as $n):?>

<div class="categoria">FUENTE</div>
          <h2><?php echo $n['titulo']?></h2>
        <hr />
          <div class="fecha-noticia"><?php echo $n['fecha'];?> | Santiago</div>
        <p>
          
          <?php $ruta="imagenes/breves/brv_"; ?>

        <?php if($idtabla=="id"):?>
          
          <? if($n['imagen'] == ''):?>
            
            

              <?php foreach($fotoprincipal as $row_galeria):?>

                   <img  class="foto-noticia-desarrollo" src="<?php echo base_url(); ?><? echo $ruta.$id;?>/<? echo $row_galeria['nombre_archivo'];?>" 
               alt="" width="700" height="350"/>
 
              <?php endforeach;?>           

          <?php else: ?>

                 <img  class="foto-noticia-desarrollo" src="<?php echo base_url(); ?>noticias/fotos/<? echo $n['imagen'];?>" 
               alt="" width="700" height="350"/>

          <?php endif;?>

        <?php else: ?> 

            <?php foreach($fotoprincipal as $row_galeria):?>

                <img  class="foto-noticia-desarrollo" src="<?php echo base_url(); ?><? echo $ruta.$id;?>/<? echo $row_galeria['nombre_archivo'];?>" 
               alt="" width="700" height="350"/>
             
            <?php endforeach;?>  

        <?php endif; ?>  

        </p>

       

        <div id="cuerpo">
        <p><?php echo str_replace( ".", "<br><br>", strip_tags($n['cuerpo']));?></p>
      </div>
<?php endforeach;?>
<div id="icono-galeria">

    <h4>GALER&Iacute;A DE IM&Aacute;GENES DE LA NOTICIA </h4>
</div>

       
 <div id="galeria_noticias">
    <?php foreach($fotografias as $row_galeria):?>
      
      <a class="fancybox" href="<?php echo base_url(); ?><? echo $ruta.$id;?>/<? echo $row_galeria['nombre_archivo']; ?>"  title="">

        <img class="fancybox"  width="80" height="60" src="<?php echo base_url(); ?><? echo $ruta.$id;?>/<? echo $row_galeria['nombre_archivo']; ?>" alt="<? echo $row_galeria['nombre_archivo']; ?>" />

      </a>

    <?php endforeach; ?>
 </div>


          
 
<p>

<?php foreach($audios as $row_audio):?>
<iframe src="<?php echo base_url(); ?>archivos/audio/<? echo $id;?>_audio_brv/index<? echo $row_audio['id_audio']; ?>.php?$id=<? echo $row_audio['id_audio']; ?>" width="200" height="20" scrolling="no" frameborder="0"></iframe>

 <?php endforeach; ?>

</p>


<p>

<div id="icono-videos">
  <h4>GALER&Iacute;A DE videos</h4>
 </div> 

  <?php foreach($videos as $row_video):?>


<center>
<div id="flvplayer">Este div es sustituido por el video con javascript</div>
<script type="text/javascript">

// Esto carga el reproductor (pero no el video); 400 es el ancho, 327 el alto:
var so = new SWFObject("<?php echo base_url(); ?>archivos/videos/mpw_player.swf", "swfplayer", "400", "327", "9", "#000000"); 

// Esto carga el video:
so.addVariable("flv", "<?php echo base_url(); ?>archivos/videos/<? echo $id;?>_video/<? echo $row_video['nombre_archivo'];?>");

//Esto es para permitir pantalla completa. Si no se quiere, poner false:
so.addParam("allowFullScreen","true"); 

//Esto tiene que ser el nombre del div id que se va a sustituir:
so.write("flvplayer");  
</script>
</center>


 <?php endforeach; ?>


</p>
  <p>&nbsp;</p>


</p>

  <h3>Comentarios</h3>
<div id="comentarios">
  <h5>Escribir comentarios</h5>
  <p>Si&eacute;ntase libre de opinar, para eso existe este espacio. Est&aacute; bien discrepar de las opiniones de otros, pero por favor enfrente ideas y no personas. Los ataques personales no tienen cabida aqu&iacute;. Que sus comentarios no excedan las 350 palabras; de esta forma m&aacute;s gente puede participar. Para mayor informaci&oacute;n vea nuestros&nbsp;<strong><a href="http://www.gorecoquimbo.gob.cl/gore_noticias_vista.php?id_not=3822&amp;noticia=1#" onclick="window.open('terminosycondiciones.html','','width=450,height=480,scrollbars=no');">T&eacute;rminos de Uso</a></strong><a href="http://www.gorecoquimbo.gob.cl/gore_noticias_vista.php?id_not=3822&amp;noticia=1#" onclick="window.open('terminosycondiciones.html','','width=450,height=480,scrollbars=no');">.</a>
  </p>
  <hr />
  <br />

<script type="text/javascript">

$(document).ready(function(){

  $("#Submit3").click(function() {

    var base='<?php echo BASE_PATH ?>';

      var url = base+"/comentario"; // the script where you handle the form input.
    //alert($("#mes").val());
    var nombre=$("#nombre").val();
    var email=$("#email").val();
    var comentario=$("#comentario").val();
    var noticia=$("#noticia").val();
    var tipo=$("#tipo_noticia").val();
      $.ajax({
    type: "POST",
    url: url,
    data: "nombre="+nombre+"&email="+email+"&comentario="+comentario+"&noticia="+noticia+"&tipo="+tipo, 
             success: function(data)
             {
                
                 obj = JSON.parse(data);

                 if(obj == false){
                    
                    alert('No se ha podido ingresar tu comentario');

                 }
                 else if(obj =='email' ){

                    alert('Email invalido');
                    $("#nombre").val('');
                    $("#email").val('');
                    $("#comentario").val('');
                    $("#nombre").focus();
                 }
                 else{

                    alert('Comentario enviado');
                    $("#nombre").val('');
                    $("#email").val('');
                    $("#comentario").val('');


                 } 


                 //$("#resultado-proyectos").html(data);
             }
           });
      
      return false; // avoid to execute the actual submit of the form.
  });

})
</script>

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" bgcolor="#F2F2F2">
    <tbody>
      <tr>
        <td width="13%"><label for="nombre"><strong>Nombre</strong></label></td>
        <td><input name="nombre" type="text" id="nombre" size="45" /></td>
        </tr>
      <tr>
        <td><label for="email"><strong >Email</strong></label></td>
        <td><input name="email"  type="text" id="email" size="45" /></td>
        </tr>
      
      <tr>
        <td valign="top"><label for="comentario"><strong>Comentario</strong></label></td>
        <td><textarea name="comentario" cols="60" rows="5" id="comentario"></textarea></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="middle">
          <input name="politica" type="checkbox" id="frm_politica" value="1" />

          <input name="noticia" type="hidden" id="noticia" value="<?php echo $id; ?>" />
          
          <input name="tipo_noticia" type="hidden" id="tipo_noticia" value="<?php echo $tipo_noticia; ?>" />
          
&nbsp;He le&iacute;do y acepto los Terminos de uso.</td>
        </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td><input name="Submit3" id="Submit3" type="button" class="btn-enviar"  value="Enviar Comentarios" /></td>
      </tr>
    </tbody>
  </table>
</div>

<?php foreach($comentarios as $c): ?>
<div id="comentario-detalle">
<div id="nombre-comentario">Nombre: <strong><?php echo $c['usuario'];?></strong> </div>
<div id="fecha-comentario">Fecha: <strong><?php echo fecha_formato_espanol($c['fecha'])." - ".$c['hora'];?> </strong></div>

<div id="mensaje-comentario"> 

  <p> <?php
          $comentario= str_replace( "\n", "<br>", $c['comentario']);
          echo $comentario;
  ?> </p>
</div>

</div>
<?php endforeach; ?>
</div>
