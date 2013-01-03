  <script>
  $(function() {
    applyPagination();

    function applyPagination() {

      $("#ajax_paging a").live('click',function() {

        var url = $(this).attr("href");
        $.ajax({
          type: "POST",
          data: "ajax=1",
          url: url,
          beforeSend: function() {
            $("#resultado-proyectos").html("");
            $("#resultado-proyectos").html("Cargando");
          },
          success: function(msg) {
            $("#resultado-proyectos").html(msg);
            applyPagination();
          }
        });
        return false;
      });
    }


  });

function fotos(id,name){

      var base='<?php echo BASE_PATH ?>';
      var url = base+"/fotos-proyectos";
      $.ajax({
             type: "POST",
             url: url,
             data: "id="+id, // serializes the form's elements.
             success: function(data)
             {
                 //alert(data); 
                 $("#fotospro").html(data);
                $("#titulocomuna").html(name);
             }
           }); 

}

$(document).ready(function() {
            
            $("#btnBuscar").click(function() {

    
    var base='<?php echo BASE_PATH ?>';

      var url = base+"/buscadorBanco"; // the script where you handle the form input.
    //alert($("#mes").val());
    var palabra=$("#cadena").val();
    var fecha=$("#fecha").val();
    var codigo=$("#codigo").val();
    var comuna=$("#comuna").val();
  
      $.ajax({
             type: "POST",
             url: url,
             data: "palabra="+palabra+"&fecha="+fecha+"&codigo="+codigo+"&comuna="+comuna, // serializes the form's elements.
             success: function(data)
             {
                 //alert(data); 
                 $("#resultado-proyectos").html(data);
             }
           });
      
      return false; // avoid to execute the actual submit of the form.
  });

  });
	


 </script>

<div class="contenido-izquierda">
  <div class="categoria"> 
    <a href="<?php echo BASE_URI?>">P&Aacute;gina Principal </a> &gt; Banco Proyectos Regionales&nbsp;</div>
          <h1> MUESTRA DE PROYECTOS POR COMUNA</h1>
          <hr />
		  <br />
		    <h2 id="titulocomuna" >LA SERENA</h2>
	
		    <div id="icono-galeria">
		      <h4>GALER&Iacute;A DE IM&Aacute;GENES</h4>
		    </div>
			<p id="fotospro">
       
        <?php for($i=0;$i<sizeof($fotos);$i++){?>

          <a class="fancybox" href="<?php echo base_url(); ?><?php echo $fotos[$i];?>" style="text-decoration:none" title="Galeria de imagenes">

            <img src="<?php echo base_url(); ?><?php echo $fotos[$i];?>" alt="" style="text-decoration:none" class="fancybox" />
          </a> 
        <?php }?>
    
			</p>

<div id="fix" style="clear:both"></div>

            <h3>BUSCADOR DE PROYECTOS</h3>
            <form method="post" action="#" id="form-busqueda-noticias">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="33%">COMUNA :</td>
      <td width="67%">
        <select name="comuna" id="comuna">
			<option value="0">...</option>
					
			<?php foreach($comuna as $co):?>

				<option value="<?php echo $co['id_comuna']?>"><?php echo $co['nom_comuna'] ?></option>

			<?php endforeach;?>

		</select>     </td>
    </tr>
    
    
    <tr>
      <td>FECHA</td>
      <td>
      	<input name="fecha" type="text"  class="textoselectnav" id="fecha" title=" Introduza una fecha a buscar entre las Noticias. "  size="14" maxlength="10" />      </td>
    </tr>
    <tr>
      <td>PALABRA CLAVE</td>
      <td><input name="cadena" type="text"  class="textoselectnav" id="cadena" size="25" maxlength="255" title=" Introduzca Cadena de Texto a Buscar de entre los T&iacute;tulos de Noticias Existentes. " /></td>
    </tr>
    <tr>
      <td>C&Oacute;DIGO BIP </td>
      <td><input name="codigo" type="text"  class="textoselectnav" id="codigo" size="25" maxlength="255" title=" Introduzca Cadena de Texto a Buscar de entre los T&iacute;tulos de Noticias Existentes. " /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" id="btnBuscar" class="btn-vermas" value="Buscar" /></td>
    </tr>
  </table>

 </form>
 
<div id="resultado-proyectos">
 
</div>



<div id="mapa-google"><iframe width="740" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.cl/maps?source=embed&amp;ie=UTF8&amp;hl=es&amp;msa=0&amp;msid=110840075223060265076.00047a612cf5455ae1078&amp;ll=-29.900782,-71.255865&amp;spn=0.044569,0.077162&amp;t=h&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.cl/maps?source=embed&amp;ie=UTF8&amp;hl=es&amp;msa=0&amp;msid=110840075223060265076.00047a612cf5455ae1078&amp;ll=-29.900782,-71.255865&amp;spn=0.044569,0.077162&amp;t=h&amp;z=14" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small></div>
		  
<div id="fix" style="clear:both"></div>

		  
		  </div>

    <?php if(isset($home)  && ($home)):?>
<div id="contenido-derecha-index">
      <?php else: ?>
<div id="contenido-derecha">
      <?php endif;?>


 </div>
 <!--fin de div noticias-->
</div>
 <!--fin de div izquierda-->

<div id="contenido-derecha">
    <div id="menu-sidebar">
      <ul>
      <li><a id="titulo">PROYECTOS REGIONALES </a></li>
   		<?php foreach($provincias as $p):?>
        <?php foreach($comunas[$p['id_provincia']] as $c):?>
        <li><a onclick="fotos(<? echo $c['id_comuna'];?>,'<? echo $c['nom_comuna'];?>')" href="javascript:void(0)"><? echo $c['nom_comuna'];?></a></li>
        <?php endforeach;?>
      <?php endforeach;?>
      </ul>
    </div>


