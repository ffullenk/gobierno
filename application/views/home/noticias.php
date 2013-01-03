<div class="contenido-izquierda">

  <script>
  $(function() {
    applyPagination();

    function applyPagination() {

      $("#ajax_paging a").live('click',function() {

        var url = $(this).attr("href");
        $.ajax({
          type: "POST",
          data: "ajax=1&tabla="+$('#tabla').val(),
          url: url,
          beforeSend: function() {
            $("#resultadoBusqueda").html("");
            $("#resultadoBusqueda").html("Cargando");
          },
          success: function(msg) {
            $("#resultadoBusqueda").html(msg);
            applyPagination();
          }
        });
        return false;
      });
    }


  });



$(document).ready(function(){


	$("#btnBuscar").click(function() {

		var base='<?php echo BASE_PATH ?>';

	    var url = base+"/buscadorNoticias"; // the script where you handle the form input.
		//alert($("#mes").val());
		var mes=$("#mes").val();
		var fecha=$("#fecha").val();
		var year=$("#year").val();
		var fuente=$("#fuente").val();
		var cadena=$("#cadena").val();
    var tabla=$("#tabla").val();

	    $.ajax({
	           type: "POST",
	           url: url,
	           data: "mes="+mes+"&fecha="+fecha+"&year="+year+"&fuente="+fuente+"&cadena="+cadena+"&tabla="+tabla, // serializes the form's elements.
	           success: function(data)
	           {
	               //alert(data); 
	               $("#resultadoBusqueda").html(data);
	           }
	         });
	    
	    return false; // avoid to execute the actual submit of the form.
	});

})

 </script>

<div class="categoria"> <a href="<?php echo BASE_URI?>">P&aacute;gina Principal</a>&nbsp;&gt;&nbsp;Noticias </div>
<h1>BUSCADOR DE NOTICIAS</h1>		
<hr />
<form method="post" action="#" id="form-busqueda-noticias">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="33%">SELECCIONE MES DE LA NOTICIA :</td>
      <td width="67%">
        <select name="mes" id="mes">
			<option value="0">Todos</option>
				<?php foreach($user['meses'] as $mes):?>
				<option value="<?php echo $mes['Id'];?>"><?php  echo $mes['nombre'];?></option>
			<?php endforeach;?>
		</select>
     </td>
    </tr>
    <tr>
      <td>SELECCIONE A&Ntilde;O DE LA NOTICIA :</td>
      <td><select name="year" id="year">
		<option value="0">Todos</option>
		<?php
		for ($i=2003;$i<=date("Y");$i++){
								
			echo "<option value='$i'>$i</option>";
													
			}
		?>
		</select></td>
    </tr>
    <tr>
      <td>FUENTE</td>
      <td><select name="fuente" id="fuente">
		<option value="0">Seleccione Fuente</option>
		<?php foreach($user['fuentes'] as $fuente):?>
        <option value="<?php echo $fuente['idfuente'];?>"><?php  echo substr( trim( $fuente["fuente"]), 0, 20 );?></option>
      <?php endforeach;?>
	
		</select></td>
    </tr>

      <tr>
        <td>TIPO DE NOTA::</td>
          <td>
               <select name="tabla" id="tabla">
                    <option value="0" selected="selected">Todos</option>
                    <option value="1">Noticias</option>
                    <option value="2">Breves</option>
                </select>
          </td>
      </tr>


    <tr>
      <td>FECHA</td>
      <td>
      	<input name="fecha" type="text"  class="textoselectnav" id="fecha" title=" Introduza una fecha a buscar entre las Noticias. "  size="14" maxlength="10" />

      </td>
    </tr>
    <tr>
      <td>PALABRA CLAVE</td>
      <td><input name="cadena" type="text"  class="textoselectnav" id="cadena" size="25" maxlength="255" title=" Introduzca Cadena de Texto a Buscar de entre los T&iacute;tulos de Noticias Existentes. " />
</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" id="btnBuscar" class="btn-vermas" value="Buscar" /></td>
    </tr>
  </table>

 </form>
<div id="fix" style="clear:both"></div>
 
<div id="resultadoBusqueda">

<br />
<?php if(empty($user['name'])): ?>

  <h3>No hay resultados</h3>

<?php else: ?>
  
<?php foreach($user['name'] as $f): ?>      
    <div id="noticia-buscador">
    <div class="foto-noticia">

      <img  alt="Foto noticia" src="<?php echo base_url(); ?>imagenes/noticia1.jpg"  width="122" height="122"/>
    </div>

    <div class="categoria"><?php echo $f['fuente']?></div>
    <div class="titulo-noticias-secundarias"><h2><?php echo anchor('noticias-vista/'.$f['id'].'/1', $f['titulo'], array('class' => '')); ?></h2></div>
    <div class="fecha-noticia"><?php echo fecha_formato_espanol_gore($f['fecha'])?> | Santiago</div>
    <p class="texto-noticias"> <?php echo ajustatexto_noticias_breves(strip_tags($f['encabezado']));?>.</p>
<?php /*?><?php echo anchor('noticias-vista/'.$f['id'].'/1', 'ver mas (+)', array('class' => 'btn-vermas')); ?>
<?php */?>
    </div>
<br />       
    <?php endforeach; ?>
<?php endif?>

		<div id="fix" style="clear:both"></div>
	
     <div id="ajax_paging" >
          <?php echo $pagination; ?>
      </div>  

 </div>
  <div id="fix" style="clear:both"></div>      
       
</div>
    

